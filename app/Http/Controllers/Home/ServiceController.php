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

use App\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::all();
        return view('home.service.index', ['services' => $services]);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('home.service.add');
        } else {
            $service = new Service();
            $service->name = $request->name;
            $service->price = $request->price;
            $service->bonus_for_emp = $request->bonus_for_emp;
            $service->save();
            return redirect()->route('service.index');
        }
    }

    public function edit(Request $request) {
        $id = $request->get('id');
        $service = Service::find($id);
        if($request->isMethod('GET')){
            return view('home.service.edit', ['service' => $service]);
        }
        else {
            $service->name = $request->name;
            $service->price = $request->price;
            $service->bonus_for_emp = $request->bonus_for_emp;
            $service->save();
            return redirect()->route('service.index');
        }
    }
    public function delete(Request $request){
        $id = $request->get('id');
        $service = Service::find($id);
        $service->delete();
        return back();
    }
}