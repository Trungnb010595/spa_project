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
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home.index');
    }

    public function statistic(){
        $employees = Employee::orderBy('created_at','DESC')->paginate(NUMBER_PAGINATE);
        return view('home.statistic', ['employees' => $employees]);
    }
    public function ajaxGetQuantityProduct(Request $request){
        $product = Product::find($request->product_id);
        $quantity = $product->quantity;
        $data = [];
        $data['quantity'] = $quantity;
        return response(json_encode($data));
    }
}