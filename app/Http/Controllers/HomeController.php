<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\Employee;
use App\Models\Type;
use App\Models\Isp;
use App\Models\PlaceIsp;
use Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

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

    public function map(){
        $initialMarkers = [
            [
                'position' => [
                    'lat' => 28.625485,
                    'lng' => 79.821091
                ],
                'label' => [ 'color' => 'white', 'text' => 'P1' ],
                'draggable' => true
            ],
        ];
        return view('map', compact('initialMarkers'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $params = Place::with(['type','isp','isp.isp'])->orderBy("created_at","DESC")->paginate(10);
        $userId = Auth::user()->id;
        $userName = Employee::where('id',$userId)->first();
        $dataType = Type::all();
        return view('home',[
            'data' => $params,
            'userName' => $userName,
            'dataType' => $dataType 
        ]);
    }

    public function addPlace()
    {
        $params = Place::with(['type','isp','isp.isp'])->orderBy("created_at","DESC")->paginate(10);
        $userId = Auth::user()->id;
        $userName = Employee::where('id',$userId)->first();
        $dataType = Type::all();
        return view('formPlace',[
            'data' => $params,
            'userName' => $userName,
            'dataType' => $dataType 
        ]);
    }

    public function detailPlace($placeId){
        $params = Place::with(['type','isp','isp.isp'])->where('id',$placeId)->first();
        $data = PlaceIsp::with(['isp'])->where('placeId', $placeId)->get();
        $row = $data->count();
        $ispData = Isp::all();
        $dataType = Type::all();
        

        return view('detailPlace',[
            'data' => $params,
            'isp' => $data,
            'placeId' => $placeId,
            'ispData' => $ispData,
            'row' => $row,
            'dataType' => $dataType
        ]);
    }

    public function postPlace(Request $request){
        $validate = Validator::make($request->all(),[
            'name' => 'required',
            'address' => 'required',
            'phoneNumber' => 'required',
            'typeId' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        if($validate->fails()){
            $request->session()->flash('validate','failed');
            return back()->withErrors($validate);
        }

        $params = Place::create([
            'name' => $request->name,
            'address' => $request->address,
            'phoneNumber' => $request->phoneNumber,
            'typeId' => $request->typeId,
            'createdBy' => $request->userId,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'route' => $request->route,
            'kecamatan' => $request->kecamatan,
            'provinsi' => $request->provinsi,
            'city' => $request->city,
        ]);

        return redirect('/');
    }

    public function postProvider(Request $request){
        $validate = Validator::make($request->all(),[
            'name' => 'required',
            'phoneNumber' => 'required',
            'pic_name' => 'required',
        ]);

        if($validate->fails()){
            $request->session()->flash('validate','failed');
            return back()->withErrors($validate);
        }

        $params = Isp::create([
            'name' => $request->name,
            'phoneNumber' => $request->phoneNumber,
            'pic_name' => $request->pic_name,
        ]);

        return back();
    }

    public function clearProvider($placeId){
        $params = PlaceIsp::where('placeId',$placeId)->delete();
        return back();
    }

    public function editPlace(Request $request){
        $id = $request->id;
        $place = Place::find($id);

        $validate = Validator::make($request->all(),[
            'name' => 'required',
            'address' => 'required',
            'phoneNumber' => 'required',
            'typeId' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        if($validate->fails()){
            return back();
        }

        $place->fill([
            'name' => $request->name,
            'address' => $request->address,
            'phoneNumber' => $request->phoneNumber,
            'typeId' => $request->typeId,
            'createdBy' => $request->userId,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'route' => $request->route,
            'kecamatan' => $request->kecamatan,
            'provinsi' => $request->provinsi,
            'city' => $request->city,
        ]);

        $place->save();
        return redirect("/place" . "/" . $request->id);
    }

    public function edit($id){
        $params = Place::find($id);
        $dataType = Type::all();
        return view('editPlace',[
            'data' => $params,
            'dataType' => $dataType 
        ]);
    }
    public function deletePlace($idPlace){
        $params = Place::find($idPlace);

        if($params){
            $params->delete();
            return redirect('/');
        }
    }
}
