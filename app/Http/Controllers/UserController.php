<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        $params = Employee::with(['user'])->paginate(10);
        // return response()->json($params);
        return view('user',[
            'data' => $params
        ]);
    }

    public function postUser(Request $request){
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'phoneNumber' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        if($validate->fails()){
            return back();
        }

        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'name' => $request->name,
            'role' => $request->role
        ]);
        
        $user = User::where('email', $request->email)->first();
        $userId = $user->id;

        $employee = Employee::create([
            'name' => $request->name,
            'phoneNumber' => $request->phoneNumber,
            'userId' => $userId
        ]);

        return back();
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
