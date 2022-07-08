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
        <form action="{{url('admin/insertstudent')}}" method="POST">
            @csrf
            <table class="table">
                <tr class="tbl">
                    <td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Tên Giáo Viên</td>
                    <td>
                        <input type="text" class="from-control nhaploai" placeholder="  Nhập tên học sinh" name="name"
                               required/>
                    </td>
                </tr>
                <tr class="tbl">
                    <td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Email</td>
                    <td>
                        <input type="text" class="from-control nhaploai" name="email" placeholder="Nhập email" required
                               autocomplete="email"/>
                    </td>
                </tr>
                <tr class="tbl">
                    <td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Mật khẩu</td>
                    <td>
                        <input id="password" type="password" class="form-control nhaploai" name="password"
                               placeholder="Nhập mật khẩu" required autocomplete="current-password">
                    </td>
                </tr>
                <tr class="tbl">
                    <td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Ngày sinh</td>
                    <td><input type="date" name="ngaysinh" class="form-control nhaploai" required></td>
                </tr>
                <tr class="tbl">
                    <td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Lớp</td>
                    <td>
                        <input type="text"  name="lop" class="form-control" placeholder="Nhập lớp học sinh" required>
                    </td>
                </tr>
                <tr>
                    <td class="style_row tbl-row" colspan="2">
                        <button type="submit" class="btn  btnsuach">Thêm</button>
                        <button type="reset" class="btn  btnxoach">Thoát</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
@stop
