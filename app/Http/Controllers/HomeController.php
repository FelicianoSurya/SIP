<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\Employee;
use Auth;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $params = Place::with(['type','isp','isp.isp'])->paginate(10);
        $userId = Auth::user()->id;
        $userName = Employee::where('id',$userId)->first();
//         return response()->json([
//             'data' => $params
//         ]);
        return view('home',[
            'data' => $params,
            'userName' => $userName
        ]);
    }

    public function detailPlace($placeId){
        $params = Place::with(['type','isp','isp.isp'])->where('id',$placeId)->first();
//         return response()->json([
//             'data' => $params
//         ]);
        return view('detailPlace',[
            'data' => $params
        ]);
    }
}
