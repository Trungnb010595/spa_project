@extends('home.layouts.base')
@section('title')
    <title>Spa CLub - List Customers</title>
@endsection
@section('content')
    <h1>Danh Sách Khách Hàng</h1>
    <hr>
    <div class="col-md-10 col-lg-10 col-lg-offset-1">
        <div class="panel panel-primary ">
            <div class="panel-heading">Bảng Danh Sách Khách Hàng <a  class="pull-right btn btn-primary btn-xs" href="{{ route('customer.add') }}">Thêm Mới Khách Hàng</a></div>
            <div class="panel-body">
                <div><button class="btn pull-right"><a href="{{ route('customer.birthday') }}" class="btn btn-block">Tìm Kiếm KH</a></button></div>
                <table class="table table-bordered table-striped table-auto table-condensed full_width">
                    <thead class="panel-title">
                    <th class="text-center">Số Thứ Tự</th>
                    <th class="text-center">Tên Khách Hàng</th>
                    <th class="text-center">Số Điện Thoại</th>
                    <th class="text-center">Ngày Sinh Nhật</th>
                    <th class="text-center">Sửa</th>
                    <th class="text-center">Xóa</th>
                    </thead>
                    <tbody>

                    @foreach($customers as $index=>$customer)
                        <tr>
                            <td class="text-center">{{ $index+1 }}</td>
                            <td class="text-center">{{ $customer->name }}</td>
                            <td class="text-center">{{ $customer->sdt }}</td>
                            <td class="text-center">{{ date('d-m-Y', strtotime($customer->birthday)) }}</td>
                            <td class="text-center">
                                <a href="{{route('customer.edit',['id' => $customer->id])}}" class="btn btn-xs btn-success">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a></td>
                            <td class="text-center">
                                <a href="{{route('customer.delete',['id' => $customer->id])}}" class="btn btn-xs btn-success">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a></td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
                <div class="text-right">{{ $customers->links() }}</div>
            </div>
        </div>
    </div>

@endsection