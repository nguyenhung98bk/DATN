@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Danh sách môn học</h2>
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th>STT</th>
                <th>Tên môn học</th>
                <th>Ngân hàng câu hỏi</th>
                <th>
                    <button class="btn btn-block" data-toggle="modal" data-target="#Modal"><a href="#">Thêm môn học</a>
                    </button>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($mh as $key => $value)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->tenmonhoc}}</td>
                    <td>
                        <button class="btn btn-block"><a href="{{url('admin/cauhoi/'.$value->id)}}">Xem danh sách</a></button>
                    </td>
                    <td>
                        <button class="btn btn-block" data-toggle="modal" data-target="#Modal2" onclick="myFunction('{{$value->id}}','{{$value->tenmonhoc}}')"><a>Đổi tên</a></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination justify-content-end">
            {!! $mh->links() !!}
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
    </div>
    <script>
        var id;
        var tenmonhoc;
        function myFunction(id,tenmonhoc) {
            document.getElementById("id").value = id;
            document.getElementById("tenmonhoc").value = tenmonhoc;
        }
    </script>
@endsection
