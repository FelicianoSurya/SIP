<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;

class UserController extends Controller
{
    public function index(){
        $params = Employee::with(['user'])->paginate(10);
        // return response()->json($params);
        return view('user',[
            'data' => $params
        ]);
    }

    public function deleteUser($idUser)
    {
        $params = User::find($idUser);
        $employee = Employee::where("userId",$idUser);
        if($params){
            $params->delete();
            $employee->delete();
            return back();
        }else{
            return back();
        }
        //
    }
}
