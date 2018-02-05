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
        $exchanges = Exchange::orderBy('created_at','DESC')->paginate(NUMBER_PAGINATE);
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
            $exchange = new Exchange();
            $exchange->cus_id = $request->cus_id;
            $exchange->emp_id = $request->emp_id;
            $exchange->product_id = $request->product_id;
            $exchange->service_id = $request->service_id;
            $exchange->product_quantity = $request->product_quantity;
            $exchange->service_quantity = $request->service_quantity;
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
            $exchange->cus_id = $request->cus_id;
            $exchange->emp_id = $request->emp_id;
            $exchange->product_id = $request->product_id;
            $exchange->service_id = $request->service_id;
            $exchange->product_quantity = $request->product_quantity;
            $exchange->service_quantity = $request->service_quantity;
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