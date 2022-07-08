@extends('admin.lopthi');
@section('footer')
    <div class="panel panel-default khungbang">
        <div class="panel-heading"><h6 class="panel-title"><i class="fas fa-chalkboard-teacher"></i><b class="tbl">NHẬP
                    THÔNG TIN LỚP THI</b></h6></div>
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
        <form action="{{url('admin/post_taolopthi')}}" method="POST">
            @csrf
            <table class="table">
                <tr class="tbl">
                    <td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Tên Lớp Thi</td>
                    <td>
                        <input type="text" class="from-control nhaploai" placeholder="  Nhập tên lớp thi" name="tenlopthi"
                               required/>
                    </td>
                </tr>
                <tr class="tbl">
                    <td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Giáo viên quản lí lớp thi</td>
                    <td>
                        <select class="form-control nhaploai" name="id_giaovien" required>
                            <option>Chọn giáo viên</option>
                            @foreach($giaovien as $value)
                                <option value="{{$value->id}}">{{$value->ten}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr class="tbl">
                    <td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Môn học</td>
                    <td><select class="form-control nhaploai" name="id_monhoc" required>
                            <option>Chọn môn học</option>
                            @foreach($monhoc as $value)
                                <option value="{{$value->id}}">{{$value->tenmonhoc}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr class="tbl">
                    <td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Thời gian có thể bắt đầu làm bài</td>
                    <td><input type="datetime-local" name="thoigianbd" class="form-control nhaploai" required></td>
                </tr>
                <tr class="tbl">
                    <td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Thời gian kết thúc</td>
                    <td><input type="datetime-local" name="thoigiankt" class="form-control nhaploai" required></td>
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
