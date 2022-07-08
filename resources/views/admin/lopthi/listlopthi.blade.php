@extends('admin.lopthi');
@section('footer')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h6 class="panel-title"><i class="fas fa-chalkboard-teacher"></i>QUẢN LÝ LỚP THI</h6></div>
        <div id="DataTables_Table_0_filter" class="dataTables_filter">
            <label>
                <span>Tìm kiếm theo tên lớp:</span>
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
                    <th>Tên lớp thi</th>
                    <th>Giáo viên</th>
                    <th>Môn học</th>
                    <th>Thời gian bắt đầu</th>
                    <th>Thời gian kết thúc</th>
                    <th>Sửa</th>
                    <th>Đề thi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lopthi as $key => $value)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value->tenlop}}</td>
                        <td>{{$value->ten}}</td>
                        <td>{{$value->tenmonhoc}}</td>
                        <td>{{$value->thoigianbd}}</td>
                        <td>{{$value->thoigiankt}}</td>
                        <td><a href="{{url('admin/sualopthi/'.$value->id)}}">
                                <button data-toggle="modal" class="btn btnsuach">Sửa</button>
                            </a>
                        </td>
                        <td><a href="{{url('admin/dethi/'.$value->id)}}">
                                <button data-toggle="modal" class="btn btnsuach">Xem</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="dataTables_paginate">
                {!! $lopthi->links() !!}
            </div>
        </div>
    </div>
@stop
