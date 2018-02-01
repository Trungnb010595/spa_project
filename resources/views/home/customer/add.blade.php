@extends('home.layouts.base')
@section('title')
    <title>Spa CLub - Add Customer</title>
@endsection
@section('css')
    {{--<link rel="stylesheet" href="{{ asset('web/css/home.css') }}">--}}
@endsection
@section('content')
    <h2>Thêm Mới Khách Hàng</h2>
    <hr>
    <div class="col-md-8 col-lg-8 col-md-offset-3 col-lg-offset-2">
        <div class="panel panel-primary ">
            <div class="panel-heading">Khách Hàng <a  class="pull-right btn btn-primary btn-xs" href="{{ route('customer.add') }}">Thêm Mới Khách Hàng</a></div>
            <div class="panel-body">
                <form action="{{route('customer.add')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <lable for="name">Tên Khách Hàng<span class="text-danger">*</span></lable>
                        <input placeholder="Enter name"
                               required
                               name="name"
                               spellcheck="false"
                               class="form-control"
                        >
                    </div>
                    <div class="form-group">
                        <lable for="price">Số Điện Thoại<span class="text-danger">*</span></lable>
                        <input placeholder="Enter phone number"
                               required
                               name="sdt"
                               spellcheck="false"
                               class="form-control"
                        >
                    </div>
                    <div class="form-group">
                        <lable for="bonus_for_emp">Ngày Sinh Nhật<span class="text-danger">*</span></lable>
                        <input type="date" name="birthday" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Thêm">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection