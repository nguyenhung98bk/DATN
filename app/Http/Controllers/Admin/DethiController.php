<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dethi;
use App\Lopthi;

class DethiController extends Controller
{
    public function dethi($id)
    {
        $ten = Lopthi::where('id', $id)->value('tenlop');
        $dethi = Dethi::Where('id_lopthi', '=', $id)->first();
        return view('admin/lopthi/dethi', ['dethi' => $dethi, 'tenlop' => $ten, 'id_lopthi' => $id]);
    }

    public function insertdethi(Request $request)
    {
        if (Dethi::where('id_lopthi', $request->id_lopthi)->count() == 0) {
            Dethi::insert([
                'id_lopthi' => $request->id_lopthi,
                'socaude' => $request->scd,
                'socautb' => $request->sctb,
                'socaukho' => $request->sck,
                'thoigian' => $request->thoigian,
            ]);
        } else {
            Dethi::where('id_lopthi', $request->id_lopthi)->update([
                'socaude' => $request->scd,
                'socautb' => $request->sctb,
                'socaukho' => $request->sck,
                'thoigian' => $request->thoigian,
            ]);
        }
        $ten = Lopthi::where('id', $request->id_lopthi)->value('tenlop');
        $dethi = Dethi::Where('id_lopthi', '=', $request->id_lopthi)->first();
        return redirect()->route('dethi', ['dethi' => $dethi, 'tenlop' => $ten, 'id_lopthi' => $request->id_lopthi])
            ->with('thongbao','Cập nhật đề thi thành công');
    }
}
