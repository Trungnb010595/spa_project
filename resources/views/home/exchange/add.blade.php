@extends('home.layouts.base')
@section('title')
    <title>Spa CLub - Add Exchange</title>
@endsection
@section('css')
    {{--<link rel="stylesheet" href="{{ asset('web/css/home.css') }}">--}}
@endsection
@section('content')
    <h2>Thêm Mới Giao Dịch</h2>
    <hr>
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-primary ">
            <div class="panel-heading">Thêm Mới Giao Dịch <a  class="pull-right btn btn-primary btn-xs" href="{{ route('exchange.add') }}">Thêm Mới Giao Dịch</a></div>
            <div class="panel-body">
                <form action="{{route('exchange.add')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="cus_id">Tên Khách Hàng <span class="text-danger">*</span></label>
                        <select name="cus_id" class="form-control">
                            @foreach($customers as $customer)
                                <option value="{{$customer->id}}">{{$customer->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="emp_id">Tên Nhân Viên <span class="text-danger">*</span></label>
                        <select name="emp_id" class="form-control">
                            @foreach($employees as $employee)
                                <option value="{{$employee->id}}">{{$employee->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product_id">Mua Sản Phẩm </label>
                        <select name="product_id" class="form-control">
                            <option value=""></option>
                            @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="service_id">Dịch Vụ </label>
                        <select name="service_id" class="form-control">
                            <option value=""></option>
                            @foreach($services as $service)
                                <option value="{{$service->id}}" {{($service->service_id == $service->id)?'selected':''}}>{{$service->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Thêm">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection