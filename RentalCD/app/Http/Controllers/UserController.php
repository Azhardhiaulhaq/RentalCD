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

    /*
    Input = -
    Output = JSON array of User Model.
    Function = Untuk mendapatkan semua Data dari Table Rental_User
    */
    public function getAllUser(){
        return response()->json($data = UserModel::all());
    }
    /*
    Input = parameter username
    Output = JSON array of User Model.
    Function = Untuk mendapatkan Data dari Table Rental_User dengan username tertentu
    */
    public function getUser(Request $request){
        $username = $request->input('username');
        $data = UserModel::where('username',$username)->get();
        return response()->json(['user' => $data]);
    }

    /*
    Input = parameter username,password,dan role
    Output = Pesan Berhasil
    Function = Untuk mmenambahkan user baru
    */
    public function addUser (Request $request){
        $data = new UserModel();
        $data->username = $request->input('username');
        $data->password = $request->input('password');
        $data->role = $request->input('role');
        $data->save();

        return response('Succesfully added Data',200);
        
    }

    //
}