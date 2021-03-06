@extends('home.layouts.base')
@section('title')
    <title>Spa CLub - List Employees</title>
@endsection
@section('content')
    <h1>Danh Sách Nhân Viên</h1>
    <hr>
    <div class="col-lg-10 col-lg-offset-1">
        <div class="panel panel-primary ">
            <div class="panel-heading">Bảng Danh Sách Nhân Viên <a  class="pull-right btn btn-primary btn-xs" href="{{ route('employee.add') }}">Thêm Mới Nhân Viên</a></div>
            <div class="panel-body">
                <table class="table table-bordered table-striped table-auto table-condensed full_width">
                    <thead class="panel-title">
                    <th class="text-center">Số Thứ Tự</th>
                    <th class="text-center">Tên Nhân Viên</th>
                    <th class="text-center">Lương Cơ Bản</th>
                    <th class="text-center">Ghi Chú</th>
                    <th class="text-center">Sửa</th>
                    <th class="text-center">Xóa</th>
                    </thead>
                    <tbody>

                    @foreach($employees as $index=>$employee)
                        <tr>
                            <td class="text-center">{{ $index+1 }}</td>
                            <td class="text-center">{{ $employee->name }}</td>
                            <td class="text-center">{{ $employee->salary }}</td>
                            <td class="text-center">{{ $employee->note }}</td>
                            <td class="text-center">
                                <a href="{{route('employee.edit',['id' => $employee->id])}}" class="btn btn-xs btn-success">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a></td>
                            <td class="text-center">
                                <a href="{{route('employee.delete',['id' => $employee->id])}}" class="btn btn-xs btn-success">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a></td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
                <div class="text-right">{{ $employees->links() }}</div>
            </div>
        </div>
    </div>

@endsection