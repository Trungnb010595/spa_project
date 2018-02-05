@extends('home.layouts.base')
@section('title')
    <title>Spa CLub - Edit Consumption</title>
@endsection
@section('content')
    <h2>Sửa Thông Tin Chi Tiêu - {{ $consumption->name }}</h2>
    <hr>
    <div class="col-lg-8 col-lg-offset-2">
        <div class="panel panel-primary ">
            <div class="panel-heading">Sửa Thông Tin Chi Tiêu <a  class="pull-right btn btn-primary btn-xs" href="{{ route('service.add') }}">Thêm Mới Chi Tiêu</a></div>
            <div class="panel-body">
                <form action="{{route('consumption.edit',['id' => $consumption->id])}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <lable for="name">Tên Khoản Chi<span class="text-danger">*</span></lable>
                        <input placeholder="Enter name"
                               required
                               name="name"
                               spellcheck="false"
                               class="form-control"
                               value="{{ $consumption['name'] }}"
                        >
                    </div>
                    <div class="form-group">
                        <lable for="price">Tiền Bỏ Ra<span class="text-danger">*</span></lable>
                        <input placeholder="Enter price"
                               required
                               name="price"
                               spellcheck="false"
                               class="form-control"
                               value="{{ $consumption['price'] }}"
                        >
                    </div>
                    <div class="form-group">
                        <lable for="note">Ghi Chú<span class="text-danger">*</span></lable>
                        <input placeholder="Enter price"
                               name="note"
                               spellcheck="false"
                               class="form-control"
                               value="{{ $consumption['note'] }}"
                        >
                    </div>
                    <div class="form-group">
                        <lable for="date">Ngày Tháng<span class="text-danger">*</span></lable>
                        <input type="date" name="date" class="form-control" value="{{ $consumption['date'] }}" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Sửa">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection