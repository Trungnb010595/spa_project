@extends('home.layouts.base')
@section('title')
    <title>Spa CLub - Exchange</title>
@endsection
@section('css')
    {{--<link rel="stylesheet" href="{{ asset('web/css/home.css') }}">--}}
@endsection
@section('content')
    <h1>Wellcome to Spa Club - Exchange!!!</h1>
    <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
        <div class="panel panel-primary ">
            <div class="panel-heading">Giao dịch <a  class="pull-right btn btn-primary btn-xs" href="{{ route('exchange.add') }}">Thêm giao dịch</a></div>
            <div class="panel-body">
                <table class="table table-bordered table-striped table-auto table-condensed">
                    <thead class="panel-title">
                    <th class="text-center">STT</th>
                    <th class="text-center">Custommer name</th>
                    <th class="text-center">Employee name</th>
                    <th class="text-center">Product name</th>
                    <th class="text-center"></th>
                    </thead>
                    <tbody>

                    @foreach($exchanges as $index => $exchange)

                        <tr>
                            <td class="text-center">{{ $index+1 }}</td>
                            <td class="text-center">{{ $exchange->cus_id }}</td>
                            <td class="text-center">{{ $exchange->emp_id }}</td>
                            <td class="text-center">{{ $exchange->product_id }}</td>
                            <td class="text-center">
                                <a href="{{route('exchange.edit',['id' => $exchange->id])}}" class="btn btn-xs btn-success">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('exchange.delete',['id' => $exchange->id])}}" class="btn btn-xs btn-success">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection