<?php
/**
 * Created by PhpStorm.
 * User: tungnc
 * Date: 30/01/2018
 * Time: 16:52
 * Version: ${VERSION}
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
**/

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at','DESC')->paginate(NUMBER_PAGINATE);
        return view('home.product.index', ['products' => $products]);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('home.product.add');
        } else {
            $product = new Product();
            $product->name = $request->name;
            $product->price_import = $request->price_import;
            $product->price_export = $request->price_export;
            $product->quantity = $request->quantity;
            $product->bonus_for_emp = $request->bonus_for_emp;
            $product->note = $request->note;
            $product->save();
            return redirect()->route('product.index');
        }
    }

    public function edit(Request $request) {
        $id = $request->get('id');
        $product = Product::find($id);
        if($request->isMethod('GET')){
            return view('home.product.edit', ['product' => $product]);
        }
        else {
            $product->name = $request->name;
            $product->price_import = $request->price_import;
            $product->price_export = $request->price_export;
            $product->quantity = $request->quantity;
            $product->bonus_for_emp = $request->bonus_for_emp;
            $product->note = $request->note;
            $product->save();
            return redirect()->route('product.index');
        }
    }
    public function delete(Request $request){
        $id = $request->get('id');
        $product = Product::find($id);
        $product->delete();
        return back();
    }
}