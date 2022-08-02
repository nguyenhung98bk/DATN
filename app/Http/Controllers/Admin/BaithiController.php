<?php

namespace App\Http\Controllers\Admin;

use App\Baithi;
use App\Dethi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BaithiController extends Controller
{
    public function xembaithi($id_hocsinh,$id_lopthi){
        $id_dethi = Dethi::where('id_lopthi',$id_lopthi)->value('id');
        $baithi = Baithi::select('baithi.*','hocsinh.ten')->where([['id_hocsinh',$id_hocsinh],['id_dethi',$id_dethi]])
            ->leftjoin('hocsinh','hocsinh.id','=','baithi.id_hocsinh')->first();
        $socau = Dethi::where('id',$id_dethi)->value('socaude')+
            Dethi::where('id',$id_dethi)->value('socautb')+
            Dethi::where('id',$id_dethi)->value('socaukho');
        return view('admin/baithi',['baithi'=>$baithi,'socau'=>$socau,'id_lopthi'=>$id_lopthi]);
    }
    public function xemchitiet($id_baithi){
        $ctbt = DB::table('chitietbaithi')
            ->select('chitietbaithi.id as id_ctbt', 'dapanhs', 'cauhoi.id as id_cauhoi', 'cauhoi.noidung as ndch', 'dapan.id as id_dapan', 'dapan.noidung as ndda', 'chitietbaithi.dapanhs as dapanhs','dapan.dungsai as dads')
            ->where('id_baithi', $id_baithi)
            ->leftJoin('cauhoi', 'cauhoi.id', '=', 'chitietbaithi.id_cauhoi')
            ->leftJoin('dapan', 'dapan.id_cauhoi', '=', 'cauhoi.id')
            ->get();
        return view('admin/xemchitiet',['ctbt'=>$ctbt]);
    }
}
