@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Bài thi sắp tới</h2>
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th>STT</th>
                <th>Bài thi</th>
                <th>Thời gian bắt đầu</th>
                <th>Thời gian kết thúc</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($baithi as $key => $value)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->tenlop}}</td>
                    <td>{{$value->thoigianbd}}</td>
                    <td>{{$value->thoigiankt}}</td>
                    <td>
                        <button class="btn btn-block"><a href="">Làm bài</a></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
