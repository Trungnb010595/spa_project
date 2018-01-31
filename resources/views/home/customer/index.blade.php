@extends('home.layouts.base')

@section('content')

    <div class="col-md-12 col-lg-12 ">
        <div class="panel panel-primary ">
            <div class="panel-heading">Bảng Khách Hàng <a  class="pull-right btn btn-primary btn-xs" href="{{ route('customer.add') }}">Thêm Mới Khách Hàng</a></div>
            <div class="panel-body">
                <table class="table table-bordered table-striped table-auto table-condensed">
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
                            <td class="text-center">{{ $customer->birthday }}</td>
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
            </div>
        </div>
    </div>

@endsection