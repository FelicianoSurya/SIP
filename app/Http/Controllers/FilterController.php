<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;

class FilterController extends Controller
{
    public function index(){
        $params = Place::all();
        return view('findPlace',[
            'data' => $params
        ]);
    }
}
