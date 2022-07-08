<?php

namespace App\Http\Controllers\Admin;

use App\Lopthi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Danhsachthi;
use App\Hocsinh;

class DanhsachthiController extends Controller
{
    public function taodanhsachthi($id){
        $ten = Lopthi::where('id',$id)->value('tenlop');
        $dst = Danhsachthi::where('id_lopthi',$id)->get();
        $hs = Hocsinh::paginate(10);
        return view('admin/taodanhsachthi',[
            'id'=>$id,
            'tenlop'=>$ten,
            'dst'=>$dst,
            'hs'=>$hs,
            ]);
    }
    public function themhocsinh(Request $request)
    {
        for ($i = 0; $i < count($request->hs); $i++) {
            $student = Hocsinh::where('id', $request->hs[$i])->first();
            Danhsachthi::Insert([
                'id_hocsinh' => $student->id,
                'id_lopthi' => $request->id,
                'tenhs' => $student->ten,
                'ngaysinh' => $student->ngaysinh,
                'lop' => $student->lop,
            ]);
        }
        return redirect()->route('taodanhsachthi',['id'=>$request->id]);
    }
}
