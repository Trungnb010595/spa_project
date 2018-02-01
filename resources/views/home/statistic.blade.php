@extends('home.layouts.base')
@section('title')
    <title>Spa CLub - Interest</title>
@endsection
@section('css')
    {{--<link rel="stylesheet" href="{{ asset('web/css/home.css') }}">--}}
@endsection
@section('content')
    <h1>Thống Kê Thu Chi</h1>
    <hr>
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-primary ">
            <div class="panel-heading">Bảng Thống Kê</div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="form-group">
                        <div class="col-xs-6" style="padding-left: 0px">
                            <span>Tiền từ sản phẩm (vnđ): </span>
                        </div>
                        <div class="col-xs-6">
                            <label class="label-success "> {{number_format(getMoneyReceivedByProducts())}}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6" style="padding-left: 0px">
                            <span>Tiền từ dịch vụ (vnđ): </span>
                        </div>
                        <div class="col-xs-6">
                            <label class="label-success "> {{number_format(getMoneyReceivedByServices())}}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6" style="padding-left: 0px">
                            <span>Lãi cuối tháng (vnđ) (đã trừ lương nhân viên): </span>
                        </div>
                        <div class="col-xs-6">
                            @if((date('d') == date('t')))
                                <label class="label-success "> {{number_format(getMoneyReceived2() - countSalary()) }}</label>
                            @else
                                <label class="label-success "> Chưa cuối tháng ({{number_format(getMoneyReceived2() - countSalary()) }} vnđ)</label>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <h3 style="color: #3456b1">Thống kê:</h3>
                    <table class="table table-bordered table-striped table-auto table-condensed" style="width: 100%;">
                        <thead class="panel-title">
                        <th class="text-center">STT</th>
                        <th class="text-center">Tên nhân viên</th>
                        <th class="text-center">Tiền dịch vụ</th>
                        <th class="text-center">Số giờ nghỉ (giờ)</th>
                        <th class="text-center">Lương cuối tháng (vnđ)</th>
                        </thead>
                        <tbody>

                        @foreach($employees as $index => $employee)

                            <tr>
                                <td class="text-center">{{ $index+1 }}</td>
                                <td class="text-center">{{ $employee->name }}</td>
                                <td class="text-center">{{ number_format(\App\Employee::getMoneyServicePayForEmployees($employee->id)) }}</td>
                                <td class="text-center">{{ number_format(\App\Employee::getSumHoursTimeOff($employee->id)) }}</td>
                                <td class="text-right">{{ number_format( \App\Employee::getSalaryEmployee($employee->id)) }}</td>
                            </tr>

                        @endforeach
                        <tr>
                            <td class="text-center">Tổng</td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-right">{{ number_format(countSalary()) }} vnđ</td>
                        </tr>
                        </tbody>
                    </table>
                    {{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection