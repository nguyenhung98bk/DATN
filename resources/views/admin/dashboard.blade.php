@extends('layouts.admin')
@section('title','Quản lý hệ thống')
@section('main')

    <ul class="info-blocks">


        <li class="bg-primary ">
            <div class="top-info">
                <a href="#">Dashbroad</a>

            </div>
            <a href="{{url('dashboard')}}"><i class="icon-pencil"></i></a>
            <span class="bottom-info bg-danger">Dashbroad</span>

        </li>

        <a href="{{url('admin/teacher')}}">
            <li class="bg-danger">
                <div class="top-info">
                    <a href="{{url('admin/teacher')}}">Giáo viên</a>

                </div>
                <a href="{{url('admin/teacher')}}"><i class="fas fa-chalkboard-teacher"></i></a>
                <span class="bottom-info bg-primary">{{$gv}}</span>

            </li>
        </a>

        <a href="{{url('admin/student')}}">
            <li class="bg-success">
                <div class="top-info">
                    <a href="{{url('admin/student')}}">Học sinh</a>

                </div>
                <a href="{{url('admin/student')}}"><i class="fas fa-user-graduate"></i> </a>
                <span class="bottom-info bg-primary">{{$hs}}</span>

            </li>
        </a>
        <a href="{{url('admin/monhoc')}}">
            <li class="bg-info monhoc">
                <div class="top-info">
                    <a href="{{url('admin/monhoc')}}">Môn học</a>

                </div>
                <a href="{{url('admin/monhoc')}}"><i class="fas fa-book"></i></a>
                <span class="bottom-info bg-primary">{{$mh}}</span>

            </li>
        </a>
        <a href="#">
            <li class="bg-warning">
                <div class="top-info">
                    <a href="#">Tài khoản</a>

                </div>
                <a href="{{url('admin/user/dsuser')}}"><i class="fas fa-user"></i></a>
                <span class="bottom-info bg-primary">{{$us}}</span>
            </li>
        </a><br><br>
        <a href="#">
            <li class="bg-success exam">
                <div class="top-info">
                    <a href="#">Bài thi</a>

                </div>
                <a><i class="fas fa-file-signature"></i></a>
                <span class="bottom-info bg-primary">{{$bt}}</span>
            </li>
        </a>
        <a href="{{url('admin/lopthi')}}">
            <li class="bg-primary grade">
                <div class="top-info">
                    <a href="{{url('admin/lopthi')}}">Lớp thi</a>

                </div>

                <a href="{{url('admin/lopthi')}}"><i class="icon-stats2"></i></a>
                <span class="bottom-info bg-danger">{{$lt}}</span>
            </li>
        </a>

        <a href="">
            <li class="bg-info export">
                <div class="top-info">
                    <a href="#">Export</a>

                </div>
                <a href="#"><i class="fas fa-arrow-up"></i></a>
                <span class="bottom-info bg-primary">Excel/PDF</span>
            </li>
        </a>
        <a href="">
            <li class="bg-warning import">
                <div class="top-info">
                    <a href="#">Import</a>

                </div>
                <a href="#"><i class="fas fa-arrow-down"></i></a>
                <span class="bottom-info bg-primary">Excel</span>
            </li>
        </a>
        <a href="">
            <li class="bg-primary setting">
                <div class="top-info">
                    <a href="#">Setting</a>

                </div>
                <a href="#"><i class="icon-cogs"></i></a>
                <span class="bottom-info bg-danger">4</span>
                <div class="anhmomo9"></div>
            </li>
        </a>
    </ul>
@stop
