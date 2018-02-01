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

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::orderBy('birthday','DESC')->paginate(NUMBER_PAGINATE);
        return view('home.customer.index', ['customers' => $customers]);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('home.customer.add');
        } else {
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->sdt = $request->sdt;
            $customer->birthday = $request->birthday;
            $customer->save();
            return redirect()->route('customer.index');
        }
    }

    public function edit(Request $request) {
        $id = $request->get('id');
        $customer = Customer::find($id);
        if($request->isMethod('GET')){
            return view('home.customer.edit', ['customer' => $customer]);
        }
        else {
            $customer->name = $request->name;
            $customer->sdt = $request->sdt;
            $customer->birthday = $request->birthday;
            $customer->save();
            return redirect()->route('customer.index');
        }
    }
    public function delete(Request $request){
        $id = $request->get('id');
        $customer = Customer::find($id);
        $customer->delete();
        return back();
    }

    public function birthday(Request $request)
    {
        if ($request->isMethod('get')) {
            $current_month = date('m');
        } else {
            $current_month = $request->get('month');
        }
        $cus_birthdays = array();
        $customers = Customer::all();
        foreach ($customers as $customer) {
            if(date("m", strtotime($customer->birthday)) == $current_month){
                array_push($cus_birthdays, $customer);
            }
        }
        return view('home.customer.birthday', ['cus_birthdays' => $cus_birthdays]);
    }
}