@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Danh sách thi môn {{$tenlop}}</h3>
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Ngày sinh</th>
                <th>Lớp</th>
                <th>
                    <button class="btn btn-block" data-toggle="modal" data-target="#Modal1"
                            onclick="myFunction('{{$id}}')"><a href="#">Thêm học sinh</a></button>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($dst as $key => $value)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->tenhs}}</td>
                    <td>{{$value->ngaysinh}}</td>
                    <td>{{$value->lop}}</td>
                    <td>
                        <button class="btn btn-block"><a href="{{url('admin/get_taolopthi')}}">Xóa</a></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm sinh viên vào lớp thi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" class="form-group" action="{{url('admin/themhocsinh')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$id}}">
                        <div class="modal-body">
                                <table class="table-bordered">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>STT</th>
                                        <th>Họ tên</th>
                                        <th>Ngày sinh</th>
                                        <th>Lớp</th>
                                        <th>Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($hs as $key => $value)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$value->ten}}</td>
                                            <td>{{$value->ngaysinh}}</td>
                                            <td>{{$value->lop}}</td>
                                            <td><input class="form-control" type="checkbox" name="hs[]"
                                                       value="{{$value->id}}"></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination justify-content-end">
                                    {!! $hs->links() !!}
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
