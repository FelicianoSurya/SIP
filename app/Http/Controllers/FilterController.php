<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\Place;

class FilterController extends Controller
{
    public function index(){
        $params = Place::all();
        $jalan = Place::groupBy("route")->get();
        return view('findPlace',[
            'data' => $params,
            'jalan' => $jalan,
        ]);
    }

    public function findPlace($id){
        $params = Place::with(['type','isp','isp.isp'])->orderBy("created_at","ASC")->get();    
        $place = Place::find($id);
        return response()->json(['data' => $params, 'place' => $place]);
    }

    public function findPlaceRoute($route){
        $params = Place::with(['type','isp','isp.isp'])->where('route',$route)->orderBy("created_at","ASC")->get();    
        return response()->json(['data' => $params]);
    }
}
