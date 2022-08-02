<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Monhoc;

class MonhocController extends Controller
{
    public function getlistmonhoc(){
        $mh = Monhoc::paginate(10);
        return view('admin/monhoc',['mh' => $mh]);
    }
    public function insertmonhoc(Request $request){
        $name = $request->tenmonhoc;
        Monhoc::insert(['tenmonhoc'=>$name]);
        return redirect()->back()->with('thongbao','Thêm môn học thành công');
    }
    public function renamemonhoc(Request $request){
        Monhoc::where('id','=',$request->id)->update(['tenmonhoc'=>$request->tenmonhoc]);
        return redirect()->back()->with('thongbao','Đổi tên thành công');
    }
}
