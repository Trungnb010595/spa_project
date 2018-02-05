@extends('home.layouts.base')
@section('title')
    <title>Spa CLub - Add Consumption</title>
@endsection
@section('content')
    <h2>Thêm Mới Chi Tiêu</h2>
    <hr>
    <div class="col-lg-8 col-lg-offset-2">
        <div class="panel panel-primary ">
            <div class="panel-heading">Thêm Mới Chi Tiêu <a  class="pull-right btn btn-primary btn-xs" href="{{ route('consumption.add') }}">Thêm Mới Chi Tiêu</a></div>
            <div class="panel-body">
                <form action="{{route('consumption.add')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <lable for="name">Tên Khoản Chi<span class="text-danger">*</span></lable>
                        <input placeholder="Enter name"
                               required
                               name="name"
                               spellcheck="false"
                               class="form-control"
                        >
                    </div>
                    <div class="form-group">
                        <lable for="price">Số Tiền Bỏ Ra<span class="text-danger">*</span></lable>
                        <input placeholder="Enter salary"
                               required
                               name="price"
                               spellcheck="false"
                               class="form-control"
                        >
                    </div>
                    <div class="form-group">
                        <lable for="price">Ghi Chú<span class="text-danger">*</span></lable>
                        <input placeholder="Enter salary"
                               name="note"
                               spellcheck="false"
                               class="form-control"
                        >
                    </div>
                    <div class="form-group">
                        <lable for="date">Ngày Tháng<span class="text-danger">*</span></lable>
                        <input type="date" name="date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Thêm">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection