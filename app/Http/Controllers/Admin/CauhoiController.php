<?php

namespace App\Http\Controllers\admin;

use App\Dapan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cauhoi;
use App\Monhoc;

class CauhoiController extends Controller
{
    public function cauhoi($id)
    {
        $monhoc = Monhoc::where('id', $id)->first();
        $cauhoi = Cauhoi::where('id_monhoc', $id)->paginate(10);
        return view('admin/cauhoi', ['cauhoi' => $cauhoi, 'monhoc' => $monhoc]);
    }

    public function themcauhoi($id)
    {
        $monhoc = Monhoc::where('id', $id)->first();
        return view('admin/themcauhoi', ['monhoc' => $monhoc]);
    }

    public function postcauhoi(Request $request)
    {
        Cauhoi::insert([
            'id_monhoc' => $request->id_monhoc,
            'noidung' => $request->cauhoi,
            'mucdo' => $request->mucdo,
            'trangthai' => $request->trangthai,
        ]);
        $id = Cauhoi::whereRaw('id = (select max(`id`) from cauhoi)')->value('id');
        for($i=1;$i<10;$i++){
            if($request->input('dapan'.+$i)!=null){
                Dapan::insert([
                   'id_cauhoi'=>$id,
                    'noidung'=>$request->input('dapan'.+$i),
                    'dungsai'=>$request->input('check'.+$i),
                ]);
            }
        }
        return redirect()->route('cauhoi',['id'=>$request->id_monhoc]);
    }
}
