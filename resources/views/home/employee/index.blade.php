@extends('home.layouts.base')

@section('content')

    <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
        <div class="panel panel-primary ">
            <div class="panel-heading">Brand <a  class="pull-right btn btn-primary btn-xs" href="/brands/create">Create New</a></div>
            <div class="panel-body">
                <table class="table table-bordered table-striped table-auto table-condensed">
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
                            <td>{{ $index+1 }}</td>
                            <td class="text-center">{{ $employee->name }}</td>
                            <td class="text-center">{{ $employee->salary }}</td>
                            <td class="text-center">{{ $employee->note }}</td>
                            <td class="text-center">{{ $employee->id }}</td>
                            <td class="text-center">{{ $employee->id }}</td>
                            {{--<td class="text-center"><a href="/employee/{{ $brand->id }}" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-info-sign "></span></a></td>--}}
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection