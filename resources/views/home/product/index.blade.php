@extends('home.layouts.base')
@section('title')
    <title>Spa CLub - List Product</title>
@endsection
@section('content')
    <h1>Danh Sách Sản Phẩm</h1>
    <hr>
    <div class="col-lg-10 col-lg-offset-1">
        <div class="panel panel-primary ">
            <div class="panel-heading">Bảng Sản Phẩm <a  class="pull-right btn btn-primary btn-xs" href="{{ route('product.add') }}">Thêm Mới Sản Phẩm</a></div>
            <div class="panel-body">
                <table class="table table-bordered table-striped table-auto table-condensed full_width">
                    <thead class="panel-title">
                    <th class="text-center">Số Thứ Tự</th>
                    <th class="text-center">Tên Sản Phẩm</th>
                    <th class="text-center">Giá Nhập Vào</th>
                    <th class="text-center">Giá Bán Ra</th>
                    <th class="text-center">Số lượng</th>
                    <th class="text-center">Hoa hồng(%)</th>
                    <th class="text-center">Ghi Chú</th>
                    <th class="text-center">Sửa</th>
                    <th class="text-center">Xóa</th>
                    </thead>
                    <tbody>

                    @foreach($products as $index=>$product)
                        <tr>
                            <td class="text-center">{{ $index+1 }}</td>
                            <td class="text-center">{{ $product->name }}</td>
                            <td class="text-center">{{ $product->price_import }}</td>
                            <td class="text-center">{{ $product->price_export }}</td>
                            <td class="text-center">{{ $product->quantity }}</td>
                            <td class="text-center">{{ $product->bonus_for_emp }}</td>
                            <td class="text-center">{{ $product->note }}</td>
                            <td class="text-center">
                                <a href="{{route('product.edit',['id' => $product->id])}}" class="btn btn-xs btn-success">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a></td>
                            <td class="text-center">
                                <a href="{{route('product.delete',['id' => $product->id])}}" class="btn btn-xs btn-success">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a></td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
                <div class="text-right">{{ $products->links() }}</div>
            </div>
        </div>
    </div>

@endsection