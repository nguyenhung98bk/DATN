@extends('admin.lopthi');
@section('footer')
    <div class="panel panel-default khungbang">
        <div class="panel-heading"><h6 class="panel-title"><i class="fas fa-chalkboard-teacher"></i><b class="tbl">
                    THÔNG TIN ĐỀ THI MÔN: {{mb_strtoupper($tenlop)}}</b></h6></div>
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
        <form action="{{url('admin/insertdethi')}}" method="POST">
            @csrf
            <input type="hidden" name="id_lopthi" value="{{$id_lopthi}}">
            <table class="table">
                @if(isset($dethi))
                    <tr class="tbl">
                        <td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Số câu dễ</td>
                        <td><input type="number" name="scd" class="form-control nhaploai" value="{{$dethi->socaude}}"
                                   required></td>
                    </tr>
                    <tr class="tbl">
                        <td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Số câu trung bình</td>
                        <td><input type="number" name="sctb" class="form-control nhaploai" value="{{$dethi->socautb}}"
                                   required>
                        </td>
                    </tr>
                    <tr class="tbl">
                        <td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Số câu khó</td>
                        <td><input type="number" class="form-control nhaploai" name="sck" value="{{$dethi->socaukho}}" required>
                        </td>
                    </tr>
                    <tr class="tbl">
                        <td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Thời gian làm bài (Phút)</td>
                        <td><input type="number" class="form-control nhaploai" name="thoigian" value="{{$dethi->thoigian}}"
                                   required></td>
                    </tr>
                @else
                    <tr class="tbl">
                        <td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Số câu dễ</td>
                        <td><input type="number" name="scd" class="form-control nhaploai" required></td>
                    </tr>
                    <tr class="tbl">
                        <td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Số câu trung bình</td>
                        <td><input type="number" name="sctb" class="form-control nhaploai" required>
                        </td>
                    </tr>
                    <tr class="tbl">
                        <td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Số câu khó</td>
                        <td><input type="number" class="form-control nhaploai" name="sck" required></td>
                    </tr>
                    <tr class="tbl">
                        <td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Thời gian làm bài (Phút)</td>
                        <td><input type="number" class="form-control nhaploai" name="thoigian" required></td>
                    </tr>
                @endif
                <tr>
                    <td class="style_row tbl-row" colspan="2">
                        <button type="submit" class="btn  btnsuach">Cập nhật</button>
                        <a href="{{url('admin/lopthi')}}"><button type="button" class="btn  btnxoach">Thoát</button></a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
@stop
