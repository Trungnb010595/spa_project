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
                    <div class="form-group clearfix">
                        <div class="col-md-6" style="padding-left: 0px">
                            <label for="product_id">Mua Sản Phẩm </label>
                            <select name="product_id" class="form-control" onchange="onchangeInputProduct(this)">
                                <option value=""></option>
                                @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 max_width_100">
                            <label for="quantity">Số lượng </label>
                            <input type="number" name="product_quantity" min="0" class="form-control" value="0">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <div class="col-md-6" style="padding-left: 0px">
                            <label for="service_id">Dịch Vụ </label>
                            <select name="service_id" class="form-control">
                                <option value=""></option>
                                @foreach($services as $service)
                                    <option value="{{$service->id}}" {{($service->service_id == $service->id)?'selected':''}}>{{$service->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 max_width_100">
                            <label for="quantity">Số lượng </label>
                            <input type="number" name="service_quantity" min="0" class="form-control" value="0">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Thêm">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function onchangeInputProduct(ele) {
            $.ajax({
                url: "{{route('home.ajax.get_quantity_product')}}",
                type: "get",
                dateType: "json",
                data: {
                    product_id: ele.value
                },
                success: function (result) {
                    var data = JSON.parse(result);
                    console.log(data.quantity);
                    $("input[name='product_quantity']").attr('value',1);
                    $("input[name='product_quantity']").attr('max',data.quantity);
                }
            });
        }
    </script>
@endsection