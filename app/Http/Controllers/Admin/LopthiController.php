<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lopthi;
use App\Monhoc;
use App\Giaovien;
use Illuminate\Support\Facades\DB;

class LopthiController extends Controller
{
    public function getlistlopthi()
    {
        $lopthi = DB::table('lopthi')
            ->select('lopthi.id','tenlop','ten','tenmonhoc','thoigianbd','thoigiankt')
            ->leftjoin('monhoc', 'lopthi.id_monhoc', '=', 'monhoc.id')
            ->leftjoin('giaovien', 'giaovien.id', '=', 'lopthi.id_giaovien')
            ->paginate(10);
        return view('admin/lopthi/listlopthi', ['lopthi' => $lopthi]);
    }

    public function get_taolopthi()
    {
        $monhoc = Monhoc::get();
        $giaovien = Giaovien::get();
        return view('admin/lopthi/taolopthi', [
            'monhoc' => $monhoc,
            'giaovien' => $giaovien,
        ]);
    }

    public function post_taolopthi(Request $request)
    {
        if ($request->thoigianbd >= $request->thoigiankt) {
            return redirect()->route('taolopthi')->with('error', 'Thời gian kết thúc phải sau thời gian bắt đầu');
        }
        Lopthi::insert([
            'tenlop' => $request->tenlopthi,
            'id_giaovien' => $request->id_giaovien,
            'id_monhoc' => $request->id_monhoc,
            'thoigianbd' => $request->thoigianbd,
            'thoigiankt' => $request->thoigiankt
        ]);
        return redirect()->route('admin/lopthi')->with('thongbao', 'Thêm lớp thi thành công');
    }

    public function get_sualopthi($id)
    {
        $monhoc = Monhoc::get();
        $giaovien = Giaovien::get();
        return view('admin/lopthi/sualopthi', [
            'lopthi' => Lopthi::where('id', $id)->first(),
            'monhoc' => $monhoc,
            'giaovien' => $giaovien,
        ]);
    }
    public function post_sualopthi(Request $request){
        if ($request->thoigianbd >= $request->thoigiankt) {
            return redirect()->route('sualopthi',['id'=>$request->id])->with('error', 'Thời gian kết thúc phải sau thời gian bắt đầu');
        }
        Lopthi::where('id',$request->id)->update([
            'tenlop' => $request->tenlopthi,
            'id_giaovien' => $request->id_giaovien,
            'id_monhoc' => $request->id_monhoc,
            'thoigianbd' => $request->thoigianbd,
            'thoigiankt' => $request->thoigiankt
        ]);
        return redirect()->route('sualopthi',['id'=>$request->id])->with('thongbao', 'Sửa lớp thi thành công');
    }
}
