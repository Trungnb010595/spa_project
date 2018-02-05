@extends('home.layouts.base')
@section('title')
    <title>Spa CLub - Edit Time Off</title>
@endsection
@section('css')
    {{--<link rel="stylesheet" href="{{ asset('web/css/home.css') }}">--}}
@endsection
@section('content')
    <h2>Sửa Thông Tin Chấm Công Nhân Viên</h2>
    <hr>
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-primary ">
            <div class="panel-heading">NV Nghỉ <a  class="pull-right btn btn-primary btn-xs" href="{{ route('time_off.add') }}">Thêm nhân viên nghỉ</a></div>
            <div class="panel-body">
                <form action="{{route('time_off.edit',['id' => $time_off->id])}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="emp_id">Tên Nhân Viên <span class="text-danger">*</span></label>
                        <select name="emp_id" class="form-control">
                            @foreach($employees as $employee)
                                <option value="{{$employee->id}}" {{($time_off->emp_id == $employee->id)?'selected':''}}>{{$employee->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="hours">Số Giờ Nghỉ <span class="text-danger">*</span></label>
                        <input type="number" name="hours" min="1" placeholder="Nhập số giờ nghỉ" value="{{$time_off->hours}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Ngày Nghỉ <span class="text-danger">*</span>(tháng/ngày/năm)</label>
                        <input type="date" name="date" value="{{ $time_off->date }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Thêm">
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection