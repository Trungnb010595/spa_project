<?php
//tien nhan duoc chua tru di tien cong nhan vien
function getMoneyReceived(){
    $exchanges = \App\Exchange::all();
    $money = 0;
    foreach ($exchanges as $exchange){
        $check_date = false;
        if(date("m", strtotime($exchange->created_at)) == date('m')
            && date("Y", strtotime($exchange->created_at)) == date('Y')){
            $check_date = true;
        }
        if($check_date){
            if($exchange->product_id){
                $product = \App\Product::find($exchange->product_id);
                $money = $money + $product->price_export - $product->price_import;
            }
            if($exchange->service_id){
                $service = \App\Service::find($exchange->service_id);
                $money = $money + $service->price;
            }
        }
    }
    return $money;
}
//Tien nhan duoc da tru di tien cong cua nhan vien
function getMoneyReceived2(){
    $exchanges = \App\Exchange::all();
    $money = 0;
    foreach ($exchanges as $exchange){
        $check_date = false;
        if(date("m", strtotime($exchange->created_at)) == date('m')
            && date("Y", strtotime($exchange->created_at)) == date('Y')){
            $check_date = true;
        }
        if($check_date){
            if($exchange->product_id){
                $product = \App\Product::find($exchange->product_id);
                $money = $money + $product->price_export - $product->price_import;
            }
            if($exchange->service_id){
                $service = \App\Service::find($exchange->service_id);
                $money = $money + $service->price - $service->price*$service->bonus_for_emp/100;
            }
        }
    }
    return $money;
}

function getInterst(){

}