<?php

namespace App\Http\Controllers\Hocsinh;

use App\Danhsachthi;
use App\Hocsinh;
use App\Lopthi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BaithiController extends Controller
{
    public function baithi(){
        $id = Hocsinh::where('id_user',Auth::user()->id)->value('id');
        $lopthi = Danhsachthi::where('id_hocsinh',$id)->rightjoin('lopthi','danhsachthi.id_lopthi','=','lopthi.id')->get();
        return view('hocsinh/baithi',['baithi'=>$lopthi]);
    }
}
