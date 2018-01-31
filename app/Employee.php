<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    public static function getSalaryEmployee($emp_id){
        $emp = \App\Employee::find($emp_id);
        $exchanges = \App\Exchange::where('emp_id', $emp_id)->get();
        $time_offs = \App\TimeOff::where('emp_id', $emp_id)->get();
        $salary = $emp->salary;

        //tinh bonus from exchange
        foreach ($exchanges as $exchange){
            $check_date = false;
            if(date("m", strtotime($exchange->created_at)) == date('m')
                && date("Y", strtotime($exchange->created_at)) == date('Y')){
                $check_date = true;
            }
            if($exchange->service_id && $check_date){
                $service = \App\Service::find($exchange->service_id);
                $salary = $salary + $service->price*$service->bonus_for_emp/100;
            }
        }

        //thoi gian nghi
        foreach ($time_offs as $time_off){
            if(date("m", strtotime($time_off->date)) == date('m')
                && date("Y", strtotime($time_off->date)) == date('Y')){
                $salary_one_hour = $emp->salary/(28*10);
                $salary = $salary - $time_off->hours*$salary_one_hour;
            }

        }

        return $salary;
    }
}
