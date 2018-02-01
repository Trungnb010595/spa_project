@extends('home.layouts.base')
@section('title')
    <title>Spa CLub - Edit Customer</title>
@endsection
@section('css')
    {{--<link rel="stylesheet" href="{{ asset('web/css/home.css') }}">--}}
@endsection
@section('content')
    <h2>Sửa Thông Tin Khách Hàng: {{ $customer->name }}</h2>
    <hr>
    <div class="col-md-8 col-lg-8 col-md-offset-3 col-lg-offset-2">
        <div class="panel panel-primary ">
            <div class="panel-heading">Sửa Thông Tin Khách Hàng<a  class="pull-right btn btn-primary btn-xs" href="{{ route('customer.add') }}">Thêm Mới Khách Hàng</a></div>
            <div class="panel-body">
                <form action="{{route('customer.edit',['id' => $customer->id])}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <lable for="name">Tên Khách Hàng<span class="text-danger">*</span></lable>
                        <input placeholder="Enter name"
                               required
                               name="name"
                               spellcheck="false"
                               class="form-control"
                               value="{{ $customer['name'] }}"
                        >
                    </div>
                    <div class="form-group">
                        <lable for="price">Số Điện Thoại<span class="text-danger">*</span></lable>
                        <input placeholder="Enter price"
                               required
                               name="sdt"
                               spellcheck="false"
                               class="form-control"
                               value="{{ $customer['sdt'] }}"
                        >
                    </div>
                    <div class="form-group">
                        <lable for="note">Ngày Sinh Nhật<span class="text-danger">*</span></lable>
                        <input type="date" class="form-control" required name="birthday" value="{{ $customer['birthday'] }}">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Sửa">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection