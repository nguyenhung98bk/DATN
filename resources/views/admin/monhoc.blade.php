@extends('layouts.admin');
@section('title','Quản Lý môn học');
@section('main')
    <div class="design_cauhoi">
        <a>
            <button data-toggle="modal" data-target="#Modal" type="button" style="background: #213351"
                    class="btn btn-primary">
                Thêm
            </button>
        </a>
        <a href="importgiaovien">
            <button type="button" style="background: #213351" class="btn btn-primary">Import</button>
        </a>
        <a href="export">
            <button type="button" style="background: #213351" class="btn btn-primary">Export</button>
        </a>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h6 class="panel-title"><i class="fas fa-chalkboard-teacher"></i>QUẢN LÝ MÔN HỌC</h6></div>
        <div id="DataTables_Table_0_filter" class="dataTables_filter">
            <label>
                <span>Tìm kiếm theo môn học:</span>
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
                    <th>Tên môn học</th>
                    <th>Ngân hàng câu hỏi</th>
                    <th>Đổi tên môn học</th>
                </tr>
                </thead>
                <tbody>
                @foreach($mh as $key => $value)
                    <td>{{$key+1}}</td>
                    <td>{{$value->tenmonhoc}}</td>
                    <td><a href="{{url('admin/cauhoi/'.$value->id)}}">
                            <button class="btn btnsuach">Xem</button>
                        </a>
                    </td>
                    <td>
                        <button class="btn btnsuach" data-toggle="modal" data-target="#Modal2"
                                onclick="myFunction('{{$value->id}}','{{$value->tenmonhoc}}')">Đổi tên
                        </button>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="dataTables_paginate">
                {!! $mh->links() !!}
            </div>
        </div>
    </div>
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm môn học</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" class="form-group" action="{{url('admin/insertmonhoc')}}">
                    @csrf
                    <div class="modal-body">
                        <label>Tên môn học</label>
                        <input class="form-control" name="tenmonhoc">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Tạo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Đổi tên môn học</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" class="form-group" action="{{url('admin/renamemonhoc')}}">
                        @csrf
                        <input type="hidden" id="id" name="id">
                        <div class="modal-body">
                            <label>Tên môn học</label>
                            <input class="form-control" id="tenmonhoc" name="tenmonhoc" value="{{$value->tenmonhoc}}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary">Thay đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            var id;
            var tenmonhoc;

            function myFunction(id, tenmonhoc) {
                document.getElementById("id").value = id;
                document.getElementById("tenmonhoc").value = tenmonhoc;
            }
        </script>
@endsection
