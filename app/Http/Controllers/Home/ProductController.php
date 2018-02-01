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
            $products = new Product();
            $products->name = $request->name;
            $products->price_import = $request->price_import;
            $products->price_export = $request->price_export;
            $products->note = $request->note;
            $products->save();
            return redirect()->route('product.index');
        }
    }

    public function edit(Request $request) {
        $id = $request->get('id');
        $products = Product::find($id);
        if($request->isMethod('GET')){
            return view('home.product.edit', ['product' => $products]);
        }
        else {
            $products->name = $request->name;
            $products->price_import = $request->price_import;
            $products->price_export = $request->price_export;
            $products->note = $request->note;
            $products->save();
            return redirect()->route('product.index');
        }
    }
    public function delete(Request $request){
        $id = $request->get('id');
        $products = Product::find($id);
        $products->delete();
        return back();
    }
}