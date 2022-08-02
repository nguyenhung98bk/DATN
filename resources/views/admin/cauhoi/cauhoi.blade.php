@extends('admin.cauhoi');
@section('footer')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h6 class="panel-title"><i class="fas fa-chalkboard-teacher"></i>QUẢN LÝ CÂU HỎI MÔN {{mb_strtoupper($monhoc->tenmonhoc)}}</h6></div>
        <div id="DataTables_Table_0_filter" class="dataTables_filter">
            <label>
                <span>Tìm kiếm theo câu hỏi:</span>
                <input type="search" class="" aria-controls="DataTables_Table_0" placeholder="Tìm kiếm theo tên"><br>
                <a href="{{url('admin/themcauhoi/'.$monhoc->id)}}"><button type="submit" class="btn  btnsuach" >Thêm câu hỏi</button></a>
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
                    <th>Câu hỏi</th>
                    <th>Mức độ</th>
                    <th>Trạng thái</th>
                    <th>Đáp án</th>
                    <th>Sửa</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cauhoi as $key => $value)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value->noidung}}</td>
                        <td>
                            @if($value->mucdo==1)
                                Dễ
                            @elseif($value->mucdo==2)
                                Trung Bình
                            @else
                                Khó
                            @endif
                        </td>
                        <td>
                            @if($value->trangthai==1)
                                Áp dụng
                            @else
                                Không áp dụng
                            @endif
                        </td>
                        <td>
                            <button class="btn btnsuach">Xem</button>
                        </td>
                        <td>
                            <button class="btn btnsuach">Sửa câu hỏi</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="dataTables_paginate">
                {!! $cauhoi->links() !!}
            </div>
        </div>
    </div>
@stop
