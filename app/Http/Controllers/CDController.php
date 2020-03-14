<?php

namespace App\Http\Controllers;
use Illuminate\http\Request;
use App\CDModel;
use App\UserModel;


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
    
    /*
    Input = -
    Output = JSON array of CD Model.
    Function = Untuk mendapatkan semua Data dari Table CD
    */
    public function getAllCD(){
        return response()->json($data = CDModel::all());
        
    }

    /*
    Input = title
    Output = CD Model
    Function = Untuk mendapatkan Model CD dengan judul tertentu
    */
    public function getCD($title){
        $data = CDModel::where('title',$title)->get();
        return response ($data);
    }

    /*
    Input = Parameter username , title, rate, category, quantity
    Output = Pesan Berhasil atau Gagal
    Function = Untuk menambahkan CD ke dalam database
    */
    public function addCD(Request $request){
        $user = UserModel::where('username',$request->input('username'))->first();
        if($user->role != 'owner'){
            return response('Authentication Failed. Non-Owner Account',401);
        }
        $data = new CDModel();
        $data->title = $request->input('title');
        $data->rate = $request->input('rate');
        $data->category = $request->input('category');
        $data->quantity = $request->input('quantity');
        $data->save();

        return response('Succesfully added Data',200);
    }
    /*
    Input =  parameter title, username, quantity
    Output = Pesan Berhasil atau Gagal
    Function = Untuk menambahkan CD ke dalam database
    */
    public function updateCD(Request $request){
        $user = UserModel::where('username',$request->input('username'))->first();
        if($user->role != 'owner'){
            return response('Authentication Failed. Non-Owner Account',401);
        }

        $data = CDModel::where('title',$request->input('title'))->first();
        $data->quantity = $request->input('quantity');
        $data->save();

        return response('Succesfully Updated Data',200);
    }
    //
}