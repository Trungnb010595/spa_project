@extends('home.layouts.base')
@section('title')
    <title>Spa CLub - Edit Product</title>
@endsection
@section('css')
    {{--<link rel="stylesheet" href="{{ asset('web/css/home.css') }}">--}}
@endsection
@section('content')
    <h2>Sửa Thông Tin Sản Phẩm - {{ $product->name }}</h2>
    <hr>
    <div class="col-lg-8 col-lg-offset-2">
        <div class="panel panel-primary ">
            <div class="panel-heading">Sản Phẩm <a  class="pull-right btn btn-primary btn-xs" href="{{ route('product.add') }}">Thêm Mới Sản Phẩm</a></div>
            <div class="panel-body">
                <form action="{{route('product.edit',['id' => $product->id])}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <lable for="name">Tên Sản Phẩm<span class="text-danger">*</span></lable>
                        <input placeholder="Enter name"
                               required
                               name="name"
                               spellcheck="false"
                               class="form-control"
                               value="{{ $product['name'] }}"
                        >
                    </div>
                    <div class="form-group">
                        <lable for="salary">Giá Nhập Vào<span class="text-danger">*</span></lable>
                        <input placeholder="Enter salary"
                               required
                               type="number"
                               name="price_import"
                               spellcheck="false"
                               class="form-control"
                               value="{{ $product['price_import'] }}"
                        >
                    </div>
                    <div class="form-group">
                        <lable for="salary">Giá Bán Ra<span class="text-danger">*</span></lable>
                        <input placeholder="Enter salary"
                               required
                               type="number"
                               name="price_export"
                               spellcheck="false"
                               class="form-control"
                               value="{{ $product['price_export'] }}"
                        >
                    </div>
                    <div class="form-group">
                        <lable for="salary">Số lượng sản phẩm<span class="text-danger">*</span></lable>
                        <input placeholder="Enter salary"
                               required
                               type="number" min="0"
                               name="quantity"
                               spellcheck="false"
                               class="form-control"
                               value="{{ $product['quantity'] }}"
                        >
                    </div>
                    <div class="form-group">
                        <lable for="salary">Hoa hồng cho nhân viên (%)<span class="text-danger">*</span></lable>
                        <input placeholder="Enter hoa hồng cho nhân viên "
                               required
                               type="number"
                               name="bonus_for_emp"
                               spellcheck="false"
                               class="form-control"
                               value="{{ $product['bonus_for_emp'] }}"
                        >
                    </div>
                    <div class="form-group">
                        <lable for="note">Ghi Chú</lable>
                        <input placeholder="Enter note"
                               name="note"
                               spellcheck="false"
                               class="form-control"
                               value="{{ $product['note'] }}"
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