@extends('home.layouts.base')
@section('title')
    <title>Spa CLub - Add Exchange</title>
@endsection
@section('css')
    {{--<link rel="stylesheet" href="{{ asset('web/css/home.css') }}">--}}
@endsection
@section('content')
    <h1>Wellcome to Spa Club - Add Exchange!!!</h1>
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-primary ">
            <div class="panel-heading">Giao dịch <a  class="pull-right btn btn-primary btn-xs" href="{{ route('exchange.add') }}">Thêm giao dịch</a></div>
            <div class="panel-body">
                <form action="{{route('exchange.edit',['id' => $exchange->id])}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <select name="cus_id" class="form-control">
                            @foreach($customers as $customer)
                                <option value="{{$customer->id}}" {{($exchange->cus_id == $customer->id)?'selected':''}}>{{$customer->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="emp_id" class="form-control">
                            @foreach($employees as $employee)
                                <option value="{{$employee->id}}" {{($exchange->emp_id == $employee->id)?'selected':''}}>{{$employee->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="product_id" class="form-control">
                            <option value=""></option>
                            @foreach($products as $product)
                                <option value="{{$product->id}}" {{($exchange->product_id == $product->id)?'selected':''}}>{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
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