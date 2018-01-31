<?php
function getSalaryEmployee($emp_id){
    $emp = \App\Employee::find($emp_id);
    $exchanges = \App\Exchange::where('emp_id', $emp_id)->get();
    $time_offs = \App\TimeOff::where('emp_id', $emp_id)->get();
    $salary = $emp->salary;

    //tinh bonus from exchange
    foreach ($exchanges as $exchange){
        if($exchange->service_id){
            $service = \App\Product::find($exchange->service_id);
            $salary = $salary + $service->price*$service->bonus_for_emp/100;
        }
    }

    //thoi gian nghi
    foreach ($time_offs as $time_off){
        if($time_off->emp_id){
            $salary_one_hour = $emp->salary/(28*10);
            $salary = $salary - $time_off->hours*$salary_one_hour;
        }
    }

    return $salary;
}