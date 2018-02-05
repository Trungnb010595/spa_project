@extends('home.layouts.base')
@section('title')
    <title>Spa CLub - Exchange</title>
@endsection
@section('css')
    {{--<link rel="stylesheet" href="{{ asset('web/css/home.css') }}">--}}
@endsection
@section('content')
    <h1>Danh Sách Giao Dịch</h1>
    <hr>
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-primary ">
            <div class="panel-heading">Danh Sách Giao Dịch <a  class="pull-right btn btn-primary btn-xs" href="{{ route('exchange.add') }}">Thêm Giao Dịch</a></div>
            <div class="panel-body">
                <table class="table table-bordered table-striped table-auto table-condensed full_width">
                    <thead class="panel-title">
                    <th class="text-center">STT</th>
                    <th class="text-center">Tháng</th>
                    <th class="text-center">Tên khách hàng</th>
                    <th class="text-center">Tên nhân viên</th>
                    <th class="text-center">Tên sản phẩm</th>
                    <th class="text-center">Tên dịch vụ</th>
                    <th class="text-center">Sửa</th>
                    <th class="text-center">Xóa</th>
                    </thead>
                    <tbody>
                    @if(count($exchanges))
                    @foreach($exchanges as $index => $exchange)

                        <tr>
                            <td class="text-center">{{ $index+1 }}</td>
                            <td class="text-center">{{ date_format($exchange->created_at,'m') }}</td>
                            <td class="text-center">{{ $exchange->cus_id?\App\Customer::find($exchange->cus_id)->name:'' }}</td>
                            <td class="text-center">{{ $exchange->emp_id?\App\Employee::find($exchange->emp_id)->name:''  }}</td>
                            <td class="text-center">{{ $exchange->product_id?\App\Product::find($exchange->product_id)->name.'('.$exchange->product_quantity.')':''  }}</td>
                            <td class="text-center">{{ $exchange->service_id?\App\Service::find($exchange->service_id)->name.'('.$exchange->service_quantity.')':''  }}</td>
                            <td class="text-center">
                                <a href="{{route('exchange.edit',['id' => $exchange->id])}}" class="btn btn-xs btn-success">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{route('exchange.delete',['id' => $exchange->id])}}" class="btn btn-xs btn-success">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>

                    @endforeach
                    @else
                        <tr>Chua co du lieu</tr>
                    @endif
                    </tbody>
                </table>
                <div class="text-right">{{ $exchanges->links() }}</div>
            </div>
        </div>
    </div>
@endsection