@extends('home.layouts.base')
@section('title')
    <title>Spa CLub - Add Employee</title>
@endsection
@section('css')
    {{--<link rel="stylesheet" href="{{ asset('web/css/home.css') }}">--}}
@endsection
@section('content')
    <h2>Thêm Mới Nhân Viên</h2>
    <hr>
    <div class="col-lg-8 col-lg-offset-2">
        <div class="panel panel-primary ">
            <div class="panel-heading">Thêm Mới Nhân Viên <a  class="pull-right btn btn-primary btn-xs" href="{{ route('employee.add') }}">Thêm Mới Nhân Viên</a></div>
            <div class="panel-body">
                <form action="{{route('employee.add')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <lable for="name">Tên Nhân Viên<span class="text-danger">*</span></lable>
                        <input placeholder="Enter name"
                               required
                               name="name"
                               spellcheck="false"
                               class="form-control"
                        >
                    </div>
                    <div class="form-group">
                        <lable for="salary">Lương Cơ Bản<span class="text-danger">*</span></lable>
                        <input placeholder="Enter salary"
                               required
                               name="salary"
                               spellcheck="false"
                               class="form-control"
                        >
                    </div>
                    <div class="form-group">
                        <lable for="note">Ghi Chú</lable>
                        <input placeholder="Enter note"
                               name="note"
                               spellcheck="false"
                               class="form-control"
                        >
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Thêm">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection