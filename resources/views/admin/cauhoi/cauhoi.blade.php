@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Danh sách câu hỏi môn {{$monhoc->tenmonhoc}}</h2>
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th>STT</th>
                <th>Câu hỏi</th>
                <th>Mức độ</th>
                <th>Trạng thái</th>
                <th>Đáp án</th>
                <th>
                    <button class="btn btn-block"><a href="{{url('admin/themcauhoi/'.$monhoc->id)}}">Thêm câu hỏi</a></button>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($cauhoi as $key => $value)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->noidung}}</td>
                    <td>{{$value->mucdo}}</td>
                    <td>{{$value->trangthai}}</td>
                    <td>
                        <button class="btn btn-block"><a>Xem</a></button>
                    </td>
                    <td>
                        <button class="btn btn-block"><a>Sửa câu hỏi</a></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination justify-content-end">
            {!! $cauhoi->links() !!}
        </div>
    </div>
@endsection
