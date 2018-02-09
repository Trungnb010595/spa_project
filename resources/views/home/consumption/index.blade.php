@extends('home.layouts.base')
@section('title')
<title>Spa CLub - List Consumptions</title>
@endsection
@section('content')
    <h1>Danh Sách Chi Tiêu</h1>
    <hr>
    <div class="col-lg-10 col-lg-offset-1 ">
        <div class="panel panel-primary ">
            <div class="panel-heading">Bảng Chi Tiêu<a  class="pull-right btn btn-primary btn-xs" href="{{ route('consumption.add') }}">Thêm Mới Chi Tiêu</a></div>
            <div class="panel-body">
                <table class="table table-bordered table-striped table-auto table-condensed full_width">
                    <thead class="panel-title">
                    <th class="text-center">Số Thứ Tự</th>
                    <th class="text-center">Tên Khoản Chi</th>
                    <th class="text-center">Số Tiền Bỏ Ra</th>
                    <th class="text-center">Ghi Chú</th>
                    <th class="text-center">Ngày Tháng</th>
                    <th class="text-center">Sửa</th>
                    <th class="text-center">Xóa</th>
                    </thead>
                    <tbody>

                    @foreach($consumptions as $index=>$consumption)
                        <tr>
                            <td class="text-center">{{ $index+1 }}</td>
                            <td class="text-center">{{ $consumption->name }}</td>
                            <td class="text-center">{{ $consumption->price }}</td>
                            <td class="text-center">{{ $consumption->note }}</td>
                            <td class="text-center">{{ date('d-m-Y', strtotime($consumption->date)) }}</td>
                            <td class="text-center">
                                <a href="{{route('consumption.edit',['id' => $consumption->id])}}" class="btn btn-xs btn-success">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a></td>
                            <td class="text-center">
                                <a href="{{route('consumption.delete',['id' => $consumption->id])}}" class="btn btn-xs btn-success">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a></td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
                <div class="text-right">{{ $consumptions->links() }}</div>
            </div>
        </div>
    </div>

@endsection