<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    public static function getSalaryEmployee($emp_id){
        $emp = \App\Employee::find($emp_id);
        $salary = $emp->salary;
        $bonus_from_service = Employee::getMoneyBonusFromService($emp_id);
        $bonus_from_product = Employee::getMoneyBonusFromProduct($emp_id);
        $money_from_time_off = Employee::calculateMoneyTimeOff($emp_id);
        $salary = $salary + $bonus_from_service + $bonus_from_product - $money_from_time_off;
        return (int)$salary;
    }

    public static function getMoneyBonusFromService($emp_id){
        $exchanges = \App\Exchange::all();
        $money = 0;
        foreach ($exchanges as $exchange){
            $check_date = false;
            if(date("m", strtotime($exchange->created_at)) == date('m')
                && date("Y", strtotime($exchange->created_at)) == date('Y')){
                $check_date = true;
            }
            if($check_date){
                if($exchange->service_id  && $exchange->service_quantity && $exchange->emp_id == $emp_id){
                    $service = \App\Service::find($exchange->service_id);
                    $money = $money + $service->price*$exchange->service_quantity*$service->bonus_for_emp/100;
                }
            }
        }
        return $money;
    }
    public static function getMoneyBonusFromProduct($emp_id){
        $exchanges = \App\Exchange::all();
        $money = 0;
        foreach ($exchanges as $exchange){
            $check_date = false;
            if(date("m", strtotime($exchange->created_at)) == date('m')
                && date("Y", strtotime($exchange->created_at)) == date('Y')){
                $check_date = true;
            }
            if($check_date){
                if($exchange->product_id  && $exchange->product_quantity && $exchange->emp_id == $emp_id){
                    $product = \App\Product::find($exchange->product_id);
                    $money = $money + ($product->price_export - $product->price_import)*$exchange->product_quantity*$product->bonus_for_emp/100;
                }
            }
        }
        return $money;
    }
    public static function getSumHoursTimeOff($emp_id){
        $time_offs = TimeOff::where(['emp_id' => $emp_id])->get();
        $sum = 0;
        foreach ($time_offs as $time_off){
            if (date("m", strtotime($time_off->date)) == date('m')
                && date("Y", strtotime($time_off->date)) == date('Y')){
                $sum = $sum + $time_off->hours;
            }
        }

        return $sum;
    }

    public static function calculateMoneyTimeOff($emp_id){
        $emp = \App\Employee::find($emp_id);
        $time_offs = \App\TimeOff::where('emp_id', $emp_id)->get();
        $money = 0;
        $salary_one_hour = $emp->salary/((date('t')-2)*10);
        foreach ($time_offs as $time_off){
            if(date("m", strtotime($time_off->date)) == date('m')
                && date("Y", strtotime($time_off->date)) == date('Y')){
                $money = $money + $time_off->hours*$salary_one_hour;
            }

        }

        return (int)$money;
    }
}
