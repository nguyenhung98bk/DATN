@extends('admin.teacher');
@section('footer')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h6 class="panel-title"><i class="fas fa-chalkboard-teacher"></i>QUẢN LÝ GIÁO VIÊN</h6></div>
        <div id="DataTables_Table_0_filter" class="dataTables_filter">
            <label>
                <span>Tìm kiếm theo tên:</span>
                <input type="search" class="" aria-controls="DataTables_Table_0" placeholder="Tìm kiếm theo tên">
            </label>
        </div>
        <div class="datatable-scroll">
            @if(session('thongbao'))
                <div class="alert alert-success">
                    <span class="glyphicon glyphicon-ok icon-oke"></span> {{session('thongbao')}}
                </div>
            @endif
            <table class="table tbl">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Ngày sinh</th>
                    <th>Trạng thái</th>
                    <th>Sửa</th>
                </tr>
                </thead>
                <tbody>
                @foreach($teacher as $key => $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->ngaysinh}}</td>
                        <td>
                            @if($value->trangthai==0)
                                Làm việc
                            @else
                                Đã nghỉ
                            @endif
                        </td>
                        <td><a href="{{url('admin/profileteacher/'.$value->id_user)}}">
                                <button data-toggle="modal" class="btn btnsuach">Sửa</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="dataTables_paginate">
                {!! $teacher->links() !!}
            </div>
        </div>
    </div>
@stop
