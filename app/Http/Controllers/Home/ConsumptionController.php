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

use App\Consumption;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConsumptionController extends Controller
{
    public function index(){
        $consumptions = Consumption::orderBy('created_at','DESC')->paginate(NUMBER_PAGINATE);
        return view('home.consumption.index', ['consumptions' => $consumptions]);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('home.consumption.add');
        } else {
            $consumption = new Consumption();
            $consumption->name = $request->name;
            $consumption->price = $request->price;
            $consumption->note = $request->note;
            $consumption->date = $request->date;
            $consumption->save();
            return redirect()->route('consumption.index');
        }
    }

    public function edit(Request $request) {
        $id = $request->get('id');
        $consumption = Consumption::find($id);
        if($request->isMethod('GET')){
            return view('home.consumption.edit', ['consumption' => $consumption]);
        }
        else {
            $consumption->name = $request->name;
            $consumption->price = $request->price;
            $consumption->note = $request->note;
            $consumption->date = $request->date;
            $consumption->save();
            return redirect()->route('consumption.index');
        }
    }
    public function delete(Request $request){
        $id = $request->get('id');
        $consumption = Consumption::find($id);
        $consumption->delete();
        return back();
    }
}