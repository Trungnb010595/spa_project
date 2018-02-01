<?php
/**
 * PhpStorm TimeOffController.php 31/01/2018
 *
 * @category None
 *
 * @package None
 *
 * @author Luffy <trungnb@kaopiz.com>
 *
 * @license https://github.com/sprix/forestanet.com
 *
 * @link http://fnet.foresta.jp
 *
 * @version GIT: <git_id>
 */

namespace App\Http\Controllers\Home;


use App\Employee;
use App\TimeOff;
use Illuminate\Http\Request;

class TimeOffController
{
    public function index(){
        $time_offs = TimeOff::orderBy('created_at','DESC')->paginate(NUMBER_PAGINATE);
        return view('home.time_off.index', ['time_offs' => $time_offs]);
    }
    public function add(Request $request){
        if ($request->isMethod('GET')) {
            $employees = Employee::all();
            return view('home.time_off.add', ['employees' => $employees]);
        }
        else {
            $emp_id = $request->get('emp_id');
            $hours = $request->get('hours');
            $date = $request->get('date');
            $time_off = new TimeOff();
            $time_off->emp_id = $emp_id;
            $time_off->hours = $hours;
            $time_off->date = $date;
            $time_off->save();
            return redirect()->route('time_off.index');
        }
    }
    public function edit(Request $request){
        $id = $request->get('id');
        $time_off = TimeOff::find($id);
        if($request->isMethod('GET')){
            $employees = Employee::all();
            return view('home.time_off.edit', ['time_off' => $time_off, 'employees' => $employees]);
        }
        else {
            $emp_id = $request->get('emp_id');
            $hours = $request->get('hours');
            $date = $request->get('date');
            $time_off->emp_id = $emp_id;
            $time_off->hours = $hours;
            $time_off->date = $date;
            $time_off->save();
            return redirect()->route('time_off.index');
        }
    }
    public function delete(Request $request){
        $id = $request->get('id');
        $time_off = TimeOff::find($id);
        $time_off->delete();
        return back();
    }
}