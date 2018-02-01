@extends('home.layouts.base')
@section('title')
    <title>Spa CLub - Add Time Off</title>
@endsection
@section('css')
    {{--<link rel="stylesheet" href="{{ asset('web/css/home.css') }}">--}}
@endsection
@section('content')
    <h1>Wellcome to Spa Club - Add Time Off!!!</h1>
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-primary ">
            <div class="panel-heading">NV Nghỉ <a  class="pull-right btn btn-primary btn-xs" href="{{ route('time_off.add') }}">Thêm nhân viên nghỉ</a></div>
            <div class="panel-body">
                <form action="{{route('time_off.add')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <select name="emp_id" class="form-control">
                            @foreach($employees as $employee)
                                <option value="{{$employee->id}}">{{$employee->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" name="hours" min="1" placeholder="Nhập số giờ nghỉ" value="">
                    </div>
                    <div class="form-group">
                        <input type="date" name="date">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Thêm">
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection