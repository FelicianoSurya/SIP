<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlaceIsp;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ProviderController extends Controller
{

    public function index(){
        return view('provider');
    }
    
    public function postProviderPlace(Request $request){
        $validate = Validator::make($request->all(),[
            'placeId' => 'required',
            'ispId' => 'required',
            'phoneNumber' => 'required',
            'pic_name' => 'required'
        ]);

        if($validate->fails()){
            return back()->withErrors($validate);
        }

        $params = PlaceIsp::create([
            'placeId' => $request->placeId,
            'ispId' => $request->ispId,
            'phoneNumber' => $request->phoneNumber,
            'pic_name' => $request->pic_name
        ]);

        return back();
    }

    public function deleteProvider($idProviderPlace){
        $params = PlaceIsp::find($idProviderPlace);
        if($params){
            $params->delete();
            return back();
        }else{
            return back();
        }
    }

    public function editProvider(Request $request){
        $id = $request->id;
        $provider = PlaceIsp::find($id);
        $validate = Validator::make($request->all(),[
            'ispId' => 'required',
            'phoneNumber' => 'required',
            'pic_name' => 'required'
        ]);

        if($validate->fails()){
            return "validate error";
        }
        
        $provider->fill([
            'placeId' => $request->placeId,
            'ispId' => $request->ispId,
            'phoneNumber' => $request->phoneNumber,
            'pic_name' => $request->pic_name
        ]);
        
        $provider->save();
        return response()->json($provider);
    }
}
