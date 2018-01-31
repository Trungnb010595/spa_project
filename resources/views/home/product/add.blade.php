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
            <div class="panel-heading">Sản Phẩm <a  class="pull-right btn btn-primary btn-xs" href="{{ route('product.add') }}">Thêm Mới Sản Phẩm</a></div>
            <div class="panel-body">
                <form action="{{route('product.add')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <lable for="name">Tên Sản Phẩm<span class="text-danger">*</span></lable>
                        <input placeholder="Enter name"
                               required
                               name="name"
                               spellcheck="false"
                               class="form-control"
                        >
                    </div>
                    <div class="form-group">
                        <lable for="price_import">Giá Nhập Vào<span class="text-danger">*</span></lable>
                        <input placeholder="Enter salary"
                               required
                               name="price_import"
                               spellcheck="false"
                               class="form-control"
                        >
                    </div>
                    <div class="form-group">
                        <lable for="price_export">Giá Bán Ra<span class="text-danger">*</span></lable>
                        <input placeholder="Enter salary"
                               required
                               name="price_export"
                               spellcheck="false"
                               class="form-control"
                        >
                    </div>
                    <div class="form-group">
                        <lable for="note">Ghi Chú<span class="text-danger">*</span></lable>
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