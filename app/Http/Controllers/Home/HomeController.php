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

class HomeController extends Controller
{
    public function index(){
//        return view('home.layouts.app');
        return view('home.index');
    }

    public function salary(){
        $employees = Employee::all();
        return view('home.salary', ['employees' => $employees]);
    }
}