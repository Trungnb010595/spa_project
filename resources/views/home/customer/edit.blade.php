@extends('home.layouts.base')
@section('title')
    <title>Spa CLub - Add Exchange</title>
@endsection
@section('css')
    {{--<link rel="stylesheet" href="{{ asset('web/css/home.css') }}">--}}
@endsection
@section('content')
    <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
        <div class="panel panel-primary ">
            <div class="panel-heading">Khách Hàng <a  class="pull-right btn btn-primary btn-xs" href="{{ route('customer.add') }}">Thêm Mới Khách Hàng</a></div>
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
                        <lable for="sdt">Số Điện Thoại<span class="text-danger">*</span></lable>
                        <input placeholder="Enter price"
                               required
                               name="sdt"
                               spellcheck="false"
                               class="form-control"
                               value="{{ $customer['sdt'] }}"
                        >
                    </div>
                    <div class="form-group">
                        <lable for="birthday">Ngày Sinh <span class="text-danger">*</span></lable>
                        <input placeholder="Enter bonus"
                               name="birthday"
                               required
                               spellcheck="false"
                               class="form-control"
                               value="{{ $customer['birthday'] }}"
                        >
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Sửa">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection