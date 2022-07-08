@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Đề thi môn {{$tenlop}}</h2>
        <form method="POST" action="{{url('admin/insertdethi')}}" class="form-group">
            @csrf
            <input type="hidden" name="id_lopthi" value="{{$id_lopthi}}">
            <table class="table table-bordered">
                @if(isset($dethi))
                    <tr>
                        <th>Số câu dễ</th>
                        <td><input type="number" name="scd" class="form-control" value="{{$dethi->socaude}}" required></td>
                    </tr>
                    <tr>
                        <th>Số câu trung bình</th>
                        <td><input type="number" name="sctb" class="form-control" value="{{$dethi->socautb}}" required>
                        </td>
                    </tr>
                    <tr>
                        <th>Số câu khó</th>
                        <td><input type="number" class="form-control" name="sck" value="{{$dethi->socaukho}}" required></td>
                    </tr>
                    <tr>
                        <th>Thời gian làm bài (Phút)</th>
                        <td><input type="number" class="form-control" name="thoigian" value="{{$dethi->thoigian}}" required></td>
                    </tr>
                @else
                    <tr>
                        <th>Số câu dễ</th>
                        <td><input type="number" name="scd" class="form-control" required></td>
                    </tr>
                    <tr>
                        <th>Số câu trung bình</th>
                        <td><input type="number" name="sctb" class="form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <th>Số câu khó</th>
                        <td><input type="number" class="form-control" name="sck" required></td>
                    </tr>
                    <tr>
                        <th>Thời gian làm bài (Phút)</th>
                        <td><input type="number" class="form-control" name="thoigian" required></td>
                    </tr>
                @endif
            </table>
            <button type="submit" class="btn btn-primary">
                {{ __('Thay đổi thông tin') }}
            </button>
        </form>
    </div>
@endsection
