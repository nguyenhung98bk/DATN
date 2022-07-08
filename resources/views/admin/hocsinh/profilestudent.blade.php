@extends('admin.student');
@section('footer')
    <div class="panel panel-default khungbang">
        <div class="panel-heading"><h6 class="panel-title"><i class="fas fa-chalkboard-teacher"></i><b class="tbl">NHẬP
                    THÔNG TIN HỌC SINH</b></h6></div>
        @if(session('error'))
            <div class="alert alert-danger">
                <span class="glyphicon glyphicon-remove-circle"></span> {{session('error')}}
            </div>
        @endif
        @if(session('thongbao'))
            <div class="alert alert-success">
                <span class="glyphicon glyphicon-ok icon-oke"></span> {{session('thongbao')}}
            </div>
        @endif
        <form method="POST" action="{{url('admin/profilestudent')}}">
            @csrf
            <input type="hidden" name="id" value="{{$student->id}}">
            <table class="table">
                <tr class="tbl">
                    <td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Tên Giáo Viên</td>
                    <td>
                        <input type="text" class="from-control nhaploai" value="{{$student->name}}"
                               placeholder="  Nhập tên học sinh" name="name" required/>
                    </td>
                </tr>
                <tr class="tbl">
                    <td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Email</td>
                    <td><input type="text" class="from-control nhaploai" name="email" value="{{$student->email}}"
                               placeholder="Nhập email" required autocomplete="email"/></td>
                </tr>
                <tr class="tbl">
                    <td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Ngày sinh</td>
                    <td><input type="date" name="ngaysinh" value="{{$student->ngaysinh}}" class="form-control nhaploai"
                               required></td>
                </tr>
                <tr class="tbl">
                    <td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Lớp</td>
                    <td>
                        <input type="text"  name="lop" class="form-control" value="{{$student->lop}}" placeholder="Nhập lớp hóc sinh" required>
                    </td>
                </tr>
                <tr class="tbl">
                    <td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Trạng thái</td>
                    <td>
                        <select class="form-control nhaploai" name="trangthai">
                            @if($student->trangthai==0)
                                <option value="0">Đang học</option>
                                <option value="1">Dừng học</option>
                            @else
                                <option value="1">Dừng học</option>
                                <option value="0">Đang học</option>
                            @endif
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="style_row tbl-row" colspan="2">
                        <button type="submit" class="btn  btnsuach">Sửa</button>
                        <a href="{{url('admin/student')}}">
                            <button type="button" class="btn  btnxoach">Thoát</button>
                        </a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
@stop
