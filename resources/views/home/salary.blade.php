@extends('home.layouts.base')
@section('title')
    <title>Spa CLub - Time Off</title>
@endsection
@section('css')
    {{--<link rel="stylesheet" href="{{ asset('web/css/home.css') }}">--}}
@endsection
@section('content')
    <h1>Wellcome to Spa Club - Time Off!!! <?= date("Y");?></h1>
    <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
        <div class="panel panel-primary ">
            <div class="panel-heading">Giao dịch <a  class="pull-right btn btn-primary btn-xs" href="{{ route('time_off.add') }}">Thêm giao dịch</a></div>
            <div class="panel-body">
                <table class="table table-bordered table-striped table-auto table-condensed">
                    <thead class="panel-title">
                    <th class="text-center">STT</th>
                    <th class="text-center">Tên nhân viên</th>
                    <th class="text-center">Luowng</th>
                    </thead>
                    <tbody>

                    @foreach($employees as $index => $employee)

                        <tr>
                            <td class="text-center">{{ $index+1 }}</td>
                            <td class="text-center">{{ $employee->name }}</td>
                            <td class="text-center">{{ (int) \App\Employee::getSalaryEmployee($employee->id) }}</td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection