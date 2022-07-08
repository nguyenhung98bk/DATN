<?php

namespace App\Http\Controllers\Admin;

use App\Users;
use App\Giaovien;
use App\Hocsinh;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function getlistteacher()
    {
        $teacher = Users::where('phanloai', '1')->leftjoin('giaovien', 'users.id', '=', 'giaovien.id_user')->paginate(10);
        return view('admin/teacher/listteacher', ['teacher' => $teacher]);
    }

    public function get_profileteacher($id)
    {
        $teacher = Users::where('id', '=', $id)->first();
        $gv = Giaovien::where('id_user', '=', $id)->first();
        $teacher->ngaysinh = $gv->ngaysinh;
        return view('admin/teacher/profileteacher', ['teacher' => $teacher]);
    }

    public function post_profileteacher(Request $request)
    {
        if (Users::where([['email', $request->email], ['id', '!=', $request->id],])->count() != 0) {
            return redirect()->route('profileteacher', ['id' => $request->id])->with('error', 'Email đã được sử dụng cho tài khoản khác');
        }
        Users::where('id', '=', $request->id)
            ->update(['name' => $request->name, 'email' => $request->email, 'trangthai' => $request->trangthai]);
        Giaovien::where('id_user', '=', $request->id)->update(['ten' => $request->name, 'ngaysinh' => $request->ngaysinh]);
        return redirect()->route('profileteacher', ['id' => $request->id])->with('thongbao', 'Thay đổi thông tin thành công');
    }

    public function get_insertteacher()
    {
        return view('admin/teacher/insertteacher');
    }

    public function post_insertteacher(Request $request)
    {
        if (Users::where('email', $request->email)->count() != 0) {
            return redirect()->route('insertteacher')->with('error', 'Email đã được sử dụng cho tài khoản khác');;
        }
        Users::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phanloai' => '1',
            'trangthai' => '0'
        ]);
        $id = Users::where('email', $request->email)->value('id');
        Giaovien::insert([
            'ten' => $request->name,
            'ngaysinh' => $request->ngaysinh,
            'id_user' => $id,
        ]);
        return redirect()->route('teacher')->with('thongbao', 'Thêm giáo viên thành công');;
    }

    public function post_profilestudent(Request $request)
    {
        if (Users::where([['email', $request->email], ['id', '!=', $request->id],])->count() != 0) {
            return redirect()->route('profilestudent', ['id' => $request->id])->with('error', 'Email đã được sử dụng cho tài khoản khác');
        }
        Users::where('id', '=', $request->id)
            ->update(['name' => $request->name, 'email' => $request->email,'trangthai'=>$request->trangthai]);
        Hocsinh::where('id_user', '=', $request->id)
            ->update(['ten' => $request->name, 'ngaysinh' => $request->ngaysinh, 'lop' => $request->lop]);
        return redirect()->route('profilestudent', ['id' => $request->id])->with('thongbao', 'Thay đổi thông tin thành công');
    }

    public function get_profilestudent($id)
    {
        $student = Users::where('id', '=', $id)->first();
        $hs = Hocsinh::where('id_user', '=', $id)->first();
        $student->ngaysinh = $hs->ngaysinh;
        $student->lop = $hs->lop;
        return view('admin/hocsinh/profilestudent', ['student' => $student]);
    }

    public function getliststudent()
    {
        $student = Users::where('phanloai', '2')->leftjoin('hocsinh', 'users.id', '=', 'hocsinh.id_user')->paginate(10);
        return view('admin/hocsinh/liststudent', ['student' => $student]);
    }

    public function get_insertstudent()
    {
        return view('admin/hocsinh/insertstudent');
    }
    public function post_insertstudent(Request $request)
    {
        if (Users::where('email', $request->email)->count() != 0) {
            return redirect()->route('insertteacher')->with('error', 'Email đã được sử dụng cho tài khoản khác');;
        }
        Users::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phanloai' => '2',
            'trangthai' => '0',
        ]);
        $id = Users::where('email', $request->email)->value('id');
        Hocsinh::insert([
            'ten' => $request->name,
            'ngaysinh' => $request->ngaysinh,
            'id_user' => $id,
            'lop' => $request->lop,
        ]);
        return redirect()->route('student')->with('thongbao', 'Thêm học sinh thành công');;
    }
}
