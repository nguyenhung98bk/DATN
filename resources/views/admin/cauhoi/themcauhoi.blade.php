@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Thêm câu hỏi môn {{$monhoc->tenmonhoc}}</h2>
        <form method="POST" action="{{url('admin/postcauhoi')}}" class="form-group">
            @csrf
            <input type="hidden" name="id_monhoc" value="{{$monhoc->id}}">
            <table class="table table-bordered">
                <tr>
                    <th>Câu hỏi</th>
                    <td><input type="text" name="cauhoi" class="form-control" required></td>
                </tr>
                <tr>
                    <th>Mức độ</th>
                    <td>
                        <select name="mucdo" class="form-control">
                            <option value="1">Dễ</option>
                            <option value="2">Trung bình</option>
                            <option value="3">Khó</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Trạng thái</th>
                    <td>
                        <select name="trangthai" class="form-control">
                            <option value="1">Áp dụng</option>
                            <option value="0">Không áp dụng</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <table class="table table-bordered" id="dapankhac"></table>
                    <button class="btn btn-dark" onclick="themdapan();">Thêm đáp án</button>
                </tr>
            </table>
            <button type="submit" class="btn btn-primary">
                {{ __('Cập nhật câu hỏi') }}
            </button>
        </form>
    </div>
    <script>
        var dapan="";
        var i = 1;
        function themdapan(){
            dapan = dapan + "<tr>\n" +
                "<th>Đáp án "+i +"</th>\n" +
                "<td><input type=\"text\" class=\"form-control\" name=\"dapan"+i+"\" required></td>\n" +
                "<td>\n" +
                "<select name=\"check"+i+"\" class=\"form-control\">\n" +
                "<option value=\"1\">Đúng</option>\n" +
                "<option value=\"0\">Sai</option>\n" +
                "</select>\n" +
                "</td>\n" +
                "</tr>"
            i++;
            document.getElementById("dapankhac").innerHTML = dapan;
        }
    </script>
@endsection
