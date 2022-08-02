<?php

namespace App\Http\Controllers\Hocsinh;

use App\Baithi;
use App\Cauhoi;
use App\Chitietbaithi;
use App\Danhsachthi;
use App\Dapan;
use App\Dethi;
use App\Hocsinh;
use App\Lopthi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BaithiController extends Controller
{
    public function baithi()
    {
        $id = Hocsinh::where('id_user', Auth::user()->id)->value('id');
        $date = date('Y-m-d h:i:s');
        $lopthi = Danhsachthi::where([
            ['id_hocsinh', $id],
            ['lopthi.thoigiankt','>',$date]
        ])->rightjoin('lopthi', 'danhsachthi.id_lopthi', '=', 'lopthi.id')->get();
        return view('hocsinh/baithi', ['baithi' => $lopthi]);
    }

    public function chuanbi($id)
    {
        $baithi = DB::table('dethi')
            ->select('dethi.id', 'tenlop', 'socaude', 'socautb', 'socaukho', 'thoigian', 'thoigianbd', 'thoigiankt')
            ->where('id_lopthi', $id)
            ->leftjoin('lopthi', 'lopthi.id', '=', 'dethi.id_lopthi')->first();
        return view('hocsinh/chuanbi', ['baithi' => $baithi]);
    }

    public function batdauthi($id)
    {
        $dethi = Dethi::where('id', $id)->first();
        $id_hocsinh = Hocsinh::where('id_user',Auth::user()->id)->value('id');
        $lopthi = Lopthi::where('id', $dethi->id_lopthi)->first();
        $date = date('Y-m-d H:i:s');
        if (strtotime($date) < strtotime($lopthi->thoigianbd)) {
            echo "Chưa đến thời gian làm bài";
        } elseif (strtotime($date) > strtotime($lopthi->thoigiankt)) {
            echo "Đã hết thời gian làm bài";
        } else {
            if (Baithi::where([
                    ['id_hocsinh', $id_hocsinh],
                    ['id_dethi', $id],
                ])->count() > 0) {
                $baithi = Baithi::where([
                    ['id_hocsinh', $id_hocsinh],
                    ['id_dethi', $id],
                ])->first();
                if ($baithi->thoigiankt == Null) {
                    $time_start = $baithi->thoigianbd;
                    $time = $dethi->thoigian;
                    $time = $time * 60;
                    $time_end = strtotime($time_start) + $time;
                    $time_end = date("Y-m-d H:i:s", $time_end);
                    $ctbt = DB::table('chitietbaithi')
                        ->select('chitietbaithi.id as id_ctbt', 'dapanhs', 'cauhoi.id as id_cauhoi', 'cauhoi.noidung as ndch', 'dapan.id as id_dapan', 'dapan.noidung as ndda', 'chitietbaithi.dapanhs as dapanhs')
                        ->where('id_baithi', $baithi->id)
                        ->leftJoin('cauhoi', 'cauhoi.id', '=', 'chitietbaithi.id_cauhoi')
                        ->leftJoin('dapan', 'dapan.id_cauhoi', '=', 'cauhoi.id')
                        ->get();
                    return view('hocsinh/lambaithi', ['ctbt' => $ctbt, 'check' => '1', 'time_end' => $time_end, 'id' => $baithi->id]);
                } else {
                    return redirect()->back()->with('errors','Bạn đã làm bài thi này rồi');
                }
            } else {
                Baithi::insert([
                    'id_hocsinh' => $id_hocsinh,
                    'id_dethi' => $dethi->id,
                    'thoigianbd' => $date,
                ]);
                $id_baithi = Baithi::where([
                    'id_hocsinh' => $id_hocsinh,
                    'id_dethi' => $dethi->id,
                ])->value('id');
                $caukho = Cauhoi::where([
                    ['mucdo', '3'],
                    ['id_monhoc', $lopthi->id_monhoc]
                ])->get();
                $cautb = Cauhoi::where([
                    ['mucdo', '2'],
                    ['id_monhoc', $lopthi->id_monhoc]
                ])->get();
                $caude = Cauhoi::where([
                    ['mucdo', '1'],
                    ['id_monhoc', $lopthi->id_monhoc]
                ])->get();
                $ms[] = [];
                $i = 0;
                while ($i != $dethi->socaude) {
                    $a = random_int(0, sizeof($caude) - 1);
                    if (!in_array($a, $ms)) {
                        $ms[$i] = $a;
                        $i++;
                    }
                }
                foreach ($caude as $key => $value) {
                    for ($i = 0; $i < $dethi->socaude; $i++) {
                        if ($ms[$i] == $key) {
                            Chitietbaithi::insert([
                                'id_baithi' => $id_baithi,
                                'id_cauhoi' => $value->id,
                            ]);
                        }
                    }
                }
                $ms1[] = [];
                $i = 0;
                while ($i != $dethi->socautb) {
                    $a = random_int(0, sizeof($cautb) - 1);
                    if (!in_array($a, $ms1)) {
                        $ms1[$i] = $a;
                        $i++;
                    }

                }
                foreach ($cautb as $key => $value) {
                    for ($i = 0; $i < $dethi->socautb; $i++) {
                        if ($ms1[$i] == $key) {
                            Chitietbaithi::insert([
                                'id_baithi' => $id_baithi,
                                'id_cauhoi' => $value->id,
                            ]);
                        }
                    }
                }
                $ms2[] = [];
                $i = 0;
                while ($i != $dethi->socaukho) {
                    $a = random_int(0, sizeof($caukho) - 1);
                    if (!in_array($a, $ms2)) {
                        $ms2[$i] = $a;
                        $i++;
                    }
                }
                foreach ($caukho as $key => $value) {
                    for ($i = 0; $i < $dethi->socaukho; $i++) {
                        if ($ms2[$i] == $key) {
                            Chitietbaithi::insert([
                                'id_baithi' => $id_baithi,
                                'id_cauhoi' => $value->id,
                            ]);
                        }
                    }
                }
                $time_start = Baithi::where('id', $id_baithi)->value('thoigianbd');
                $time = $dethi->thoigian;
                $time = $time * 60;
                $time_end = strtotime($time_start) + $time;
                $time_end = date("Y-m-d H:i:s", $time_end);
                $ctbt = DB::table('chitietbaithi')
                    ->select('chitietbaithi.id as id_ctbt', 'dapanhs', 'cauhoi.id as id_cauhoi', 'cauhoi.noidung as ndch', 'dapan.id as id_dapan', 'dapan.noidung as ndda', 'chitietbaithi.dapanhs as dapanhs')
                    ->where('id_baithi', $id_baithi)
                    ->leftJoin('cauhoi', 'cauhoi.id', '=', 'chitietbaithi.id_cauhoi')
                    ->leftJoin('dapan', 'dapan.id_cauhoi', '=', 'cauhoi.id')
                    ->get();
                return view('hocsinh/lambaithi', ['ctbt' => $ctbt, 'check' => '0', 'time_end' => $time_end, 'id' => $id_baithi]);
            }
        }
    }

    public function updatedapan(Request $request)
    {
        $check = Dapan::where('id', $request->id_dapan)->value('dungsai');
        Chitietbaithi::where('id', $request->id_ctbt)
            ->update([
                'dapanhs' => $request->id_dapan,
                'dungsai' => $check,
            ]);
        return "Oke";
    }

    public function nopbai($id)
    {
        $baithi = Baithi::where('id',$id)->first();
        $dethi = Dethi::where('id',$baithi->id_dethi)->first();
        $time_start = $baithi->thoigianbd;
        $time = $dethi->thoigian;
        $time = $time * 60;
        $time_end = strtotime($time_start) + $time;
        $time_end = date("Y-m-d H:i:s", $time_end);
        $time_current = date("Y-m-d H:i:s");
        if($time_end<$time_current){
            $thoigiankt = $time_end;
        }
        else{
            $thoigiankt = $time_current;
        }
        echo $time_current;

        $socaudung = Chitietbaithi::where([
            ['id_baithi', $id],
            ['dungsai', '1'],
        ])->count();
        $tongsocau = Chitietbaithi::where([
            ['id_baithi', $id],
        ])->count();
        $diem = round($socaudung * 10 / $tongsocau, 2);
        Baithi::where('id', $id)->update([
            'socaudung' => $socaudung,
            'diem' => $diem,
            'thoigiankt' =>$thoigiankt,
        ]);
        return redirect()->route('ketqua', ['id' => $id])->with('thongbao', 'Nộp bài thành công');
    }

    public function ketqua($id)
    {
        $ctbt = DB::table('chitietbaithi')
            ->select('chitietbaithi.id as id_ctbt', 'dapanhs', 'cauhoi.id as id_cauhoi', 'cauhoi.noidung as ndch', 'dapan.id as id_dapan', 'dapan.noidung as ndda', 'chitietbaithi.dapanhs as dapanhs','dapan.dungsai as dads')
            ->where('id_baithi', $id)
            ->leftJoin('cauhoi', 'cauhoi.id', '=', 'chitietbaithi.id_cauhoi')
            ->leftJoin('dapan', 'dapan.id_cauhoi', '=', 'cauhoi.id')
            ->get();
        return view('hocsinh/chitietbaithi', ['ctbt' => $ctbt, 'id' => $id]);
    }
    public function lsthi(){
        $id = Hocsinh::where('id_user',Auth::user()->id)->value('id');
        $baithi = DB::table('baithi')
            ->select('baithi.*','lopthi.tenlop','dethi.socaude','dethi.socautb','dethi.socaukho')
            ->where('id_hocsinh',$id)
            ->leftjoin('dethi','dethi.id','=','baithi.id_dethi')
            ->leftjoin('lopthi','lopthi.id','=','dethi.id_lopthi')
            ->get();
        return view('hocsinh/lsthi',['baithi'=>$baithi]);
    }
    public function trangchu(){
        return view('hocsinh/trangchu');
    }
}
