@extends('home.layouts.base')
@section('title')
    <title>Spa CLub - Add Service</title>
@endsection
@section('content')
    <h2>Thêm Mới Dịch Vụ</h2>
    <hr>
    <div class="col-lg-8 col-lg-offset-2">
        <div class="panel panel-primary ">
            <div class="panel-heading">Thêm Mới Dịch Vụ <a  class="pull-right btn btn-primary btn-xs" href="{{ route('service.add') }}">Thêm Mới Dịch Vụ</a></div>
            <div class="panel-body">
                <form action="{{route('service.add')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <lable for="name">Tên Dịch Vụ<span class="text-danger">*</span></lable>
                        <input placeholder="Enter name"
                               required
                               name="name"
                               spellcheck="false"
                               class="form-control"
                        >
                    </div>
                    <div class="form-group">
                        <lable for="price">Giá Dịch Vụ<span class="text-danger">*</span></lable>
                        <input placeholder="Enter salary"
                               required
                               name="price"
                               spellcheck="false"
                               class="form-control"
                        >
                    </div>
                    <div class="form-group">
                        <lable for="bonus_for_emp">Phần Trăm Hoa Hồng(%)<span class="text-danger">*</span></lable>
                        <input placeholder="Enter note"
                               required
                               name="bonus_for_emp"
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