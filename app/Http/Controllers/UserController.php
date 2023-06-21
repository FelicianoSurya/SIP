<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;

class UserController extends Controller
{
    public function index(){
        $params = Employee::with(['user'])->paginate(10);
        return response()->json($params);
        return view('user',[
            'data' => $params
        ]);
    }
}
