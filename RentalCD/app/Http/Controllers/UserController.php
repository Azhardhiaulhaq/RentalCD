<?php

namespace App\Http\Controllers;
use Illuminate\http\Request;
use App\UserModel;


class UserController extends Controller
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

    public function getAllUser(){
        return response()->json($data = UserModel::all());
        
    }

    public function getUser(Request $request){
        $username = $request->input('username');
        $auth_key = $request->input('auth_key');
        $data = UserModel::where('username',$username)->orWhere('auth_key',$auth_key)->get();
        return response ($data);
    }


    public function addUser (Request $request){
        

        $data = new UserModel();
        $data->username = $request->input('username');
        $data->password = $request->input('password');
        $data->auth_key = $request->input('auth_key');
        $data->role = $request->input('role');
        $data->save();

        return response('Succesfully added Data',200);
    }
    //
}