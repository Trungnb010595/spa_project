<?php
/**
 * PhpStorm HomeController.php 30/01/2018
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
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::orderBy('created_at','DESC')->paginate(NUMBER_PAGINATE);
        return view('home.employee.index', ['employees' => $employees]);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('home.employee.add');
        } else {
            $employee = new Employee();
            $employee->name = $request->name;
            $employee->salary = $request->salary;
            $employee->note = $request->note;
            $employee->save();
            return redirect()->route('employee.index');
        }
    }

    public function edit(Request $request) {
        $id = $request->get('id');
        $employee = Employee::find($id);
        if($request->isMethod('GET')){
            return view('home.employee.edit', ['employee' => $employee]);
        }
        else {
            $employee->name = $request->name;
            $employee->salary = $request->salary;
            $employee->note = $request->note;
            $employee->save();
            return redirect()->route('employee.index');
        }
    }
    public function delete(Request $request){
        $id = $request->get('id');
        $employee = Employee::find($id);
        $employee->delete();
        return back();
    }
}