<?php

//Tien nhan duoc da tru di tien cong cua nhan vien
function getMoneyReceived(){
    $money = getMoneyReceivedByServices() + getMoneyReceivedByProducts() - sumSalary();
    return $money;
}

function sumSalary(){
    $employees = \App\Employee::all();
    $sum = 0;
    foreach ($employees as $employee){
        $sum = $sum + \App\Employee::getSalaryEmployee($employee->id);
    }
    return $sum;
}
function getMoneyReceivedByServices(){
    $exchanges = \App\Exchange::all();
    $money = 0;
    foreach ($exchanges as $exchange){
        $check_date = false;
        if(date("m", strtotime($exchange->created_at)) == date('m')
            && date("Y", strtotime($exchange->created_at)) == date('Y')){
            $check_date = true;
        }
        if($check_date){
            if($exchange->service_id && $exchange->service_quantity){
                $service = \App\Service::find($exchange->service_id);
                $money = $money + $service->price;
            }
        }
    }
    return $money;
}
function getMoneyReceivedByProducts(){
    $exchanges = \App\Exchange::all();
    $money = 0;
    foreach ($exchanges as $exchange){
        $check_date = false;
        if(date("m", strtotime($exchange->created_at)) == date('m')
            && date("Y", strtotime($exchange->created_at)) == date('Y')){
            $check_date = true;
        }
        if($check_date){
            if($exchange->product_id && $exchange->product_quantity){
                $product = \App\Product::find($exchange->product_id);
                $money = $money + ($product->price_export - $product->price_import)*$exchange->product_id;
            }
        }
    }
    return $money;
}