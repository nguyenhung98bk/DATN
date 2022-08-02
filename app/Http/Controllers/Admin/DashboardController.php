<?php

namespace App\Http\Controllers\Admin;

use App\Baithi;
use App\Giaovien;
use App\Lopthi;
use App\Monhoc;
use App\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $gv = Users::where([['phanloai', 1], ['trangthai', '0']])->count();
        $hs = Users::where([['phanloai', 2], ['trangthai', '0']])->count();
        $us = Users::count();
        $bt = Baithi::count();
        $mh = Monhoc::count();
        $lt = Lopthi::count();
        return view('admin/dashboard', ['gv' => $gv, 'hs' => $hs, 'us' => $us, 'bt' => $bt, 'mh' => $mh, 'lt' => $lt]);
    }

    public function tkds()
    {
        $mh = Monhoc::get();
        foreach ($mh as $key => $value) {
            $diem["liet"][$key] = DB::table('baithi')
                ->select('baithi.diem')
                ->leftjoin('dethi', 'dethi.id', '=', 'baithi.id_dethi')
                ->leftjoin('lopthi', 'lopthi.id', '=', 'dethi.id_lopthi')
                ->leftjoin('monhoc', 'monhoc.id', '=', 'lopthi.id_monhoc')
                ->groupby('monhoc.id')
                ->where([
                    ['diem', '<', 5],
                    ['monhoc.id', $value->id],
                ])->count();
        }
        foreach ($mh as $key => $value) {
            $diem["tb"][$key] = DB::table('baithi')
                ->select('baithi.diem')
                ->leftjoin('dethi', 'dethi.id', '=', 'baithi.id_dethi')
                ->leftjoin('lopthi', 'lopthi.id', '=', 'dethi.id_lopthi')
                ->leftjoin('monhoc', 'monhoc.id', '=', 'lopthi.id_monhoc')
                ->groupby('monhoc.id')
                ->where([
                    ['diem', '>=', 5],
                    ['diem', '<', 6.5],
                    ['monhoc.id', $value->id],
                ])->count();
        }
        foreach ($mh as $key => $value) {
            $diem["kha"][$key] = DB::table('baithi')
                ->select('baithi.diem')
                ->leftjoin('dethi', 'dethi.id', '=', 'baithi.id_dethi')
                ->leftjoin('lopthi', 'lopthi.id', '=', 'dethi.id_lopthi')
                ->leftjoin('monhoc', 'monhoc.id', '=', 'lopthi.id_monhoc')
                ->groupby('monhoc.id')
                ->where([
                    ['diem', '>=', 6.5],
                    ['diem', '<', 8],
                    ['monhoc.id', $value->id],
                ])->count();
        }
        foreach ($mh as $key => $value) {
            $diem["gioi"][$key] = DB::table('baithi')
                ->select('baithi.diem')
                ->leftjoin('dethi', 'dethi.id', '=', 'baithi.id_dethi')
                ->leftjoin('lopthi', 'lopthi.id', '=', 'dethi.id_lopthi')
                ->leftjoin('monhoc', 'monhoc.id', '=', 'lopthi.id_monhoc')
                ->groupby('monhoc.id')
                ->where([
                    ['diem', '>=', 8],
                    ['monhoc.id', $value->id],
                ])->count();
        }
        return view('admin/tkds',['diem' => $diem, 'mh' => $mh]);
    }
    public function ptch(){

    }
}
