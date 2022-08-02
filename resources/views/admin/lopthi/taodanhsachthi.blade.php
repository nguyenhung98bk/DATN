@extends('admin.lopthi');
@section('footer')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h6 class="panel-title"><i class="fas fa-chalkboard-teacher"></i>DANH SÁCH THI
                MÔN {{mb_strtoupper($tenlop)}}</h6></div>
        <div id="DataTables_Table_0_filter" class="dataTables_filter">
            <label>
                <span>Tìm kiếm theo tên học sinh:</span>
                <input type="search" class="" aria-controls="DataTables_Table_0" placeholder="Tìm kiếm theo tên">
                <br/>
                <a href="{{url('admin/themhocsinh/'.$id)}}"><button type="submit" class="btn  btnsuach" >Thêm học sinh</button></a>
            </label>
        </div>
        <div class="datatable-scroll">
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
            <table class="table tbl">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Ngày sinh</th>
                    <th>Lớp</th>
                    <th>Bài thi</th>
                    <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dst as $key => $value)
                    <tr>
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value->ten}}</td>
                        <td>{{$value->ngaysinh}}</td>
                        <td>{{$value->lop}}</td>
                        <td>
                            <a href="{{url('/admin/xembaithi/'.$value->id_hocsinh.$id)}}"><button class="btn btnsuach">Xem</button></a>
                        </td>
                        <td>
                            <a href="{{url('/admin/deletedst/'.$value->id_hocsinh.$id)}}"><button class="btn btnsuach">Xóa</button></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
