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

class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::all();
        return view('home.employee.index', ['employees' => $employees]);
    }
}