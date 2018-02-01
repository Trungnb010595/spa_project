<?php
/**
 * Created by PhpStorm.
 * User: baotr
 * Date: 1/30/2018
 * Time: 8:43 PM
 */

namespace App\Http\Controllers\Home;


use App\Customer;
use App\Employee;
use App\Exchange;
use App\Http\Controllers\Controller;
use App\Product;
use App\Service;
use Illuminate\Http\Request;

class ExchangeController extends Controller
{
    public function index(){
        $exchanges = Exchange::orderBy('created_at','DESC')->paginate(2);
        return view('home.exchange.index', ['exchanges' => $exchanges]);
    }
    public function add(Request $request){
        if ($request->isMethod('GET')) {
            $customers = Customer::all();
            $employees = Employee::all();
            $products = Product::all();
            $services = Service::all();
            return view('home.exchange.add', ['customers' => $customers, 'employees' => $employees, 'products' => $products, 'services' => $services]);
        }
        else {
            $cus_id = $request->get('cus_id');
            $emp_id = $request->get('emp_id');
            $product_id = $request->get('product_id');
            $service_id = $request->get('service_id');
            $exchange = new Exchange();
            $exchange->cus_id = $cus_id;
            $exchange->emp_id = $emp_id;
            $exchange->product_id = $product_id;
            $exchange->service_id = $service_id;
            $exchange->save();
            return redirect()->route('exchange.index');
        }
    }
    public function edit(Request $request){
        $id = $request->get('id');
        $exchange = Exchange::find($id);
        if($request->isMethod('GET')){
            $customers = Customer::all();
            $employees = Employee::all();
            $products = Product::all();
            $services = Service::all();
            return view('home.exchange.edit', ['exchange' => $exchange, 'customers' => $customers, 'employees' => $employees, 'products' => $products, 'services' => $services]);
        }
        else {
            $cus_id = $request->get('cus_id');
            $emp_id = $request->get('emp_id');
            $product_id = $request->get('product_id');
            $service_id = $request->get('service_id');
            $exchange->cus_id = $cus_id;
            $exchange->emp_id = $emp_id;
            $exchange->product_id = $product_id;
            $exchange->service_id = $service_id;
            $exchange->save();
            return redirect()->route('exchange.index');
        }
    }
    public function delete(Request $request){
        $id = $request->get('id');
        $exchange = Exchange::find($id);
        $exchange->delete();
        return back();
    }
}