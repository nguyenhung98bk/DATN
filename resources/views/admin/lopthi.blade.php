@extends('layouts.admin');
@section('title','Quản Lý Lớp Thi');
@section('main')
    <div class="design_cauhoi">
        <a href="{{url('admin/get_taolopthi')}}">
            <button data-toggle="modal" data-target="#modal_form_horizontal2" type="button" style="background: #213351"
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
    @yield('footer')
@stop
