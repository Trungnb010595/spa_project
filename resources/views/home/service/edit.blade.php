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
            <div class="panel-heading">Dịch Vụ <a  class="pull-right btn btn-primary btn-xs" href="{{ route('service.add') }}">Thêm Mới Dịch Vụ</a></div>
            <div class="panel-body">
                <form action="{{route('service.edit',['id' => $service->id])}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <lable for="name">Tên Dịch Vụ<span class="text-danger">*</span></lable>
                        <input placeholder="Enter name"
                               required
                               name="name"
                               spellcheck="false"
                               class="form-control"
                               value="{{ $service['name'] }}"
                        >
                    </div>
                    <div class="form-group">
                        <lable for="price">Giá Dịch Vụ<span class="text-danger">*</span></lable>
                        <input placeholder="Enter price"
                               required
                               name="price"
                               spellcheck="false"
                               class="form-control"
                               value="{{ $service['price'] }}"
                        >
                    </div>
                    <div class="form-group">
                        <lable for="note">Phần Trăm Hoa Hồng(%)<span class="text-danger">*</span></lable>
                        <input placeholder="Enter bonus"
                               name="bonus_for_emp"
                               required
                               spellcheck="false"
                               class="form-control"
                               value="{{ $service['bonus_for_emp'] }}"
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