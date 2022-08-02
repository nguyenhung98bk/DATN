@extends('admin.cauhoi');
@section('footer')
    <div class="panel panel-default khungbang">
        <div class="panel-heading"><h6 class="panel-title"><i class="fas fa-chalkboard-teacher"></i><b class="tbl">NHẬP
                    Thêm câu hỏi môn {{$monhoc->tenmonhoc}}</b></h6></div>
        @if(session('error'))
            <div class="alert alert-danger">
                <span class="glyphicon glyphicon-remove-circle"></span> {{session('error')}}
            </div>
        @endif
        @if(session('thongbao'))
            <div class="alert alert-success">
                <span class="glyphicon glyphicon-ok icon-oke"></span> {{session('thongbao')}}
            </div>
        @endif
        <form method="POST" action="{{url('admin/postcauhoi')}}" class="form-group">
            @csrf
            <input type="hidden" name="id_monhoc" value="{{$monhoc->id}}">
            <table class="table">
                <tr class="tbl">
                    <td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Nội dung câu hỏi</td>
                    <td><input type="text" name="cauhoi" class="form-control nhaploai" required></td>
                </tr>
                <tr class="tbl">
                    <td class="style_row"><i class="fa fa-edit"></i>Mức độ</td>
                    <td>
                        <select name="mucdo" class="form-control nhaploai">
                            <option value="1">Dễ</option>
                            <option value="2">Trung bình</option>
                            <option value="3">Khó</option>
                        </select>
                    </td>
                </tr>
                <tr class="tbl">
                    <td class="style_row"><i class="fa fa-edit"></i>Trạng thái</td>
                    <td>
                        <select name="trangthai" class="form-control nhaploai">
                            <option value="1">Áp dụng</option>
                            <option value="0">Không áp dụng</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <table class="table table-bordered" id="dapankhac"></table>
                    <button class="btn btn-dark" onclick="themdapan();">Thêm đáp án</button>
                </tr>
                <br>
                <tr>
                    <td class="style_row tbl-row" colspan="2">
                        <button type="submit" class="btn  btnsuach">Cập nhật câu hỏi</button>
                        <a href="{{url('admin/cauhoi/'.$monhoc->id)}}"><button type="button" class="btn  btnxoach">Thoát</button></a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <script>
        var dapan="";
        var i = 1;
        function themdapan(){
            dapan = dapan + "<tr class='tbl'>\n" +
                "<td><i class=\"fa fa-edit\"></i>Đáp án "+i +"</td>\n" +
                "<td><input type=\"text\" class=\"form-control nhaploai\" name=\"dapan"+i+"\" required></td>\n" +
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
