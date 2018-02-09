@extends('home.layouts.base')
@section('title')
    <title>Spa CLub - List Time Off</title>
@endsection
@section('css')
    {{--<link rel="stylesheet" href="{{ asset('web/css/home.css') }}">--}}
@endsection
@section('content')
    <h1>Bảng Chấm Công Nhân Viên Nghỉ</h1>
    <hr>
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-primary ">
            <div class="panel-heading">Chấm Công<a  class="pull-right btn btn-primary btn-xs" href="{{ route('time_off.add') }}">Thêm Nhân Viên Nghỉ</a></div>
            <div class="panel-body">
                <table class="table table-bordered table-striped table-auto table-condensed full_width">
                    <thead class="panel-title">
                    <th class="text-center">STT</th>
                    <th class="text-center">Tên nhân viên</th>
                    <th class="text-center">Số giờ nghỉ</th>
                    <th class="text-center">Ngày</th>
                    <th class="text-center">Sửa</th>
                    <th class="text-center">Xóa</th>
                    </thead>
                    <tbody>

                    @foreach($time_offs as $index => $time_off)

                        <tr>
                            <td class="text-center">{{ $index+1 }}</td>
                            <td class="text-center">{{ \App\Employee::find($time_off->emp_id)->name }}</td>
                            <td class="text-center">{{ $time_off->hours  }}</td>
                            <td class="text-center">{{ date('d-m-Y', strtotime($time_off->date)) }}</td>
                            <td class="text-center">
                                <a href="{{route('time_off.edit',['id' => $time_off->id])}}" class="btn btn-xs btn-success">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{route('time_off.delete',['id' => $time_off->id])}}" class="btn btn-xs btn-success">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
                <div class="text-right">{{ $time_offs->links() }}</div>
            </div>
        </div>
    </div>
@endsection