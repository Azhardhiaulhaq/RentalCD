<?php

namespace App\Http\Controllers;
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

    public function index(){
        return response()->json($data = UserModel::all());
        
    }

    public function show($id){
        $data = UserModel::where('username',$id)->get();
        return response ($data);
    }

    public function store (UserModel $request){
        $data = new UserModel();
        $data->username = $request->input('username');
        $data->password = $request->input('password');
        $data->auth_key = $request->input('auth_key');
        $data->role = $request->input('role');

        return response('Succesfully added Data',200);
    }
    //
}