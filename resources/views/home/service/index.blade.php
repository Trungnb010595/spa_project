@extends('home.layouts.base')

@section('content')

    <div class="col-md-12 col-lg-12 ">
        <div class="panel panel-primary ">
            <div class="panel-heading">Bảng Nhân Viên <a  class="pull-right btn btn-primary btn-xs" href="{{ route('service.add') }}">Thêm Mới Nhân Viên</a></div>
            <div class="panel-body">
                <table class="table table-bordered table-striped table-auto table-condensed">
                    <thead class="panel-title">
                    <th class="text-center">Số Thứ Tự</th>
                    <th class="text-center">Tên Dịch Vụ</th>
                    <th class="text-center">Giá Dịch Vụ</th>
                    <th class="text-center">Phần Trăm Hoa Hồng</th>
                    <th class="text-center">Sửa</th>
                    <th class="text-center">Xóa</th>
                    </thead>
                    <tbody>

                    @foreach($services as $index=>$service)
                        <tr>
                            <td class="text-center">{{ $index+1 }}</td>
                            <td class="text-center">{{ $service->name }}</td>
                            <td class="text-center">{{ $service->price }}</td>
                            <td class="text-center">{{ $service->bonus_for_emp }}</td>
                            <td class="text-center">
                                <a href="{{route('service.edit',['id' => $service->id])}}" class="btn btn-xs btn-success">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a></td>
                            <td class="text-center">
                                <a href="{{route('service.delete',['id' => $service->id])}}" class="btn btn-xs btn-success">
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