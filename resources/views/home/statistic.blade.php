@extends('home.layouts.base')
@section('title')
    <title>Spa CLub - Time Off</title>
@endsection
@section('css')
    {{--<link rel="stylesheet" href="{{ asset('web/css/home.css') }}">--}}
@endsection
@section('content')
    <h1>Wellcome to Spa Club - Time Off!!!</h1>
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-primary ">
            <div class="panel-heading">Giao dịch
                <a  class="pull-right btn btn-primary btn-xs" href="{{ route('time_off.add') }}">Thêm giao dịch</a>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <p style="margin-bottom: 0px;">
                        <span>Tiền đã nhận: </span></span><label class="label-success "> {{number_format(getMoneyReceived())}} vnđ</label>
                    </p>
                    <p>
                        <span>Tiền nhận(đã trừ tiền dịch vụ cho nhân viên): </span><label class="label-success "> {{number_format(getMoneyReceived2())}} vnđ</label>
                    </p>
                </div>
                <div class="form-group">
                    <table class="table table-bordered table-striped table-auto table-condensed" style="width: 100%;">
                        <thead class="panel-title">
                        <th class="text-center">STT</th>
                        <th class="text-center">Tên nhân viên</th>
                        <th class="text-center">Lương cuối tháng</th>
                        </thead>
                        <tbody>

                        @foreach($employees as $index => $employee)

                            <tr>
                                <td class="text-center">{{ $index+1 }}</td>
                                <td class="text-center">{{ $employee->name }}</td>
                                <td class="text-right">{{ number_format( \App\Employee::getSalaryEmployee($employee->id)) }} vnđ</td>
                            </tr>

                        @endforeach
                        <tr>
                            <td class="text-center">Tổng</td>
                            <td class="text-center"></td>
                            <td class="text-right">{{ number_format(countSalary()) }} vnđ</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection