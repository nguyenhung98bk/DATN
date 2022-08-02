@extends('admin.lopthi');
@section('footer')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h6 class="panel-title"><i class="fas fa-chalkboard-teacher"></i>TẠO DANH SÁCH THI
                MÔN {{mb_strtoupper($tenlop)}}</h6></div>
        <div id="DataTables_Table_0_filter" class="dataTables_filter">
            <label>
                <span>Tìm kiếm theo tên học sinh:</span>
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
                    <th>Học tên</th>
                    <th>Ngày sinh</th>
                    <th>Lớp</th>
                    <th>Chọn</th>
                </tr>
                </thead>
                <form method="POST" class="form-group" action="{{url('admin/themhocsinh')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$id}}">
                    <tbody>
                    @foreach($hs as $key => $value)
                        <tr>
                            <td>{{$value->id}}</td>
                            <td>{{$value->ten}}</td>
                            <td>{{$value->ngaysinh}}</td>
                            <td>{{$value->lop}}</td>
                            <td><input class="form-control" type="checkbox" name="hs[]"
                                       value="{{$value->id}}">
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="style_row tbl-row" colspan="2">
                            <button type="submit" class="btn  btnsuach">Thêm</button>
                            <a href="{{url('admin/taodanhsachthi/'.$id)}}"><button type="button" class="btn  btnxoach">Thoát</button></a>
                        </td>
                    </tr>
                    </tbody>
                </form>
            </table>
            <div class="dataTables_paginate">
                {!! $hs->links() !!}
            </div>
        </div>
    </div>
@stop
