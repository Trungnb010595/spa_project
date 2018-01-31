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
        $customers = Customer::all();
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
}