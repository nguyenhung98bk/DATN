<?php

namespace App\Http\Controllers\Admin;

use App\Baithi;
use App\Dethi;
use App\Lopthi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Danhsachthi;
use App\Hocsinh;

class DanhsachthiController extends Controller
{
    public function taodanhsachthi($id)
    {
        $ten = Lopthi::where('id', $id)->value('tenlop');
        $dst = Danhsachthi::where('id_lopthi', $id)->leftjoin('hocsinh', 'hocsinh.id', '=', 'danhsachthi.id_hocsinh')->get();
        return view('admin/lopthi/taodanhsachthi', [
            'id' => $id,
            'tenlop' => $ten,
            'dst' => $dst,
        ]);
    }

    public function get_themhocsinh($id)
    {
        $ten = Lopthi::where('id', $id)->value('tenlop');
        $hs = Hocsinh::paginate(20);
        foreach ($hs as $key => $value){
            $count = Danhsachthi::where([
                ['id_lopthi',$id],
                ['id_hocsinh',$value->id],
            ])->count();
            if($count != 0){
                unset($hs[$key]);
            }
        }
        return view('admin/lopthi/themhocsinh',[
            'id' => $id,
            'tenlop' => $ten,
            'hs' => $hs,
        ]);
    }

    public function themhocsinh(Request $request)
    {
        for ($i = 0; $i < count($request->hs); $i++) {
            $student = Hocsinh::where('id', $request->hs[$i])->first();
            Danhsachthi::Insert([
                'id_hocsinh' => $student->id,
                'id_lopthi' => $request->id,
            ]);
        }
        return redirect()->route('taodanhsachthi', ['id' => $request->id])
            ->with('thongbao','Đã thêm học sinh vào danh sách thi');
    }
    public function deletedst($id_hocsinh,$id_lopthi){
        $id_dethi = Dethi::where('id_lopthi',$id_lopthi)->value('id');
        if(Baithi::where([['id_hocsinh',$id_hocsinh],['id_dethi',$id_dethi]])->count()==1){
            return redirect()->route('taodanhsachthi', ['id' => $id_lopthi])
                ->with('error','Học sinh đã làm bài thi, không thể xóa khỏi danh sách thi');
        }
        else{
            Danhsachthi::where([['id_hocsinh',$id_hocsinh],['id_lopthi',$id_lopthi]])->delete();
            return redirect()->route('taodanhsachthi', ['id' => $id_lopthi])
                ->with('thongbao','Xóa học sinh khỏi danh sách thi thành công');
        }
    }
}
