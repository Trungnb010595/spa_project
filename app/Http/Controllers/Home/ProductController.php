<?php
/**
 * Created by PhpStorm.
 * User: tungnc
 * Date: 30/01/2018
 * Time: 16:52
 * Version: ${VERSION}
 */

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::get();
        return view('product.list', ['products' => $products]);
    }
}