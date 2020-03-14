<?php

namespace App\Http\Controllers;
use Illuminate\http\Request;
use App\CDModel;


class CDController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getAllCD(){
        return response()->json($data = CDModel::all());
        
    }

    public function getCD($title){
        $data = CDModel::where('title',$title)->get();
        return response ($data);
    }


    public function addCD(Request $request){
        
        $data = new CDModel();
        $data->title = $request->input('title');
        $data->rate = $request->input('rate');
        $data->category = $request->input('category');
        $data->quantity = $request->input('quantity');
        $data->save();

        return response('Succesfully added Data',200);
    }

    public function updateCD(Request $request,$title){
        $data = CDModel::where('title',$title)->first();
        $data->quantity = $request->input('quantity');
        $data->save();

        return response('Succesfully Updated Data',200);
    }
    //
}