<?php

namespace App\Http\Controllers;
use Illuminate\http\Request;
use App\RentModel;
use App\UserModel;
use App\CDModel;
use Hamcrest\Core\HasToString;

class RentController extends Controller
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
    Output = JSON array of Rent Model.
    Function = Untuk mendapatkan semua Data dari Table Rent
    */
    public function getAllRent(){
        return response()->json($data = RentModel::all());
        
    }

    /*
    Input = Parameter title dan username
    Output = JSON array of Rent Model.
    Function = Untuk mendapatkan Data dari Table Rent yang title dan usernamenya sama
    */
    public function getRent(Request $request){
        $title = $request->input('title');
        $username = $request->input('username');
        $data = RentModel::where('title',$title)->where('username',$username)->get();
        return response ($data);
    }

    /*
    Input = Parameter title dan username
    Output = Pesan Berhasil atau Gagal Dalam Menyewa CD
    Function = Username tertentu dapat menyewa CD dengan judul tertenta selama persediaan
               masih ada
    */
    public function rentCD(Request $request){
        
        $username = $request->input('username');
        $title = $request->input('title');
        $person = UserModel::where('username',$username)->get();
        if($person->count() == 0){
            return response('User Doesnt Exist',401);
        }
        $CD = CDModel::where('title',$title)->get();
        if($CD->count() == 0 ){
            return response('CD Doesnt Exist',404);
        } else {
            if($CD->first()->quantity == 0){
                return response('CD Out Of Stock');
            } else{
                $CD->first()->quantity = $CD->first()->quantity - 1;            
            }
        }

        $data = new RentModel();
        $data->username = $person->first()->username;
        $data->title= $CD->first()->title;
        $data->date_rent = date("Y-m-d");
        $data->date_return = null;
        $data->total = null;
        $data->save();
        $CD->first()->save();
        return response('Succesfully added Data',200);
    }

    /*
    Input = Parameter title dan username
    Output = Total Harga yang harus dibayar
    Function = user mengembalikan buku dan mengetahui jumlah yang harus dibayar
    */
    public function returnCD(Request $request){
        $username = $request->input('username');
        $title = $request->input('title');
        $rent = RentModel::where('username',$username)->where('title',$title)->first();
        if (!is_null($rent->date_return) && !is_null($rent->total)){
            return response('The CD Has Been Returned',404);
        }
        $CD = CDModel::where('title',$title)->get();
        if($CD->count() == 0 ){
            return response('CD Doesnt Exist',404);
        } 
        $startdate = \Carbon\Carbon::parse($rent->date_rent);
        $enddate = date("Y-m-d");
        $diff = $startdate->diffInDays($enddate);
        if ($diff == 0){
            $diff = 1;
        }
        $rent->date_return = $enddate;
        $rent->total = $diff * $CD->first()->rate;
        $rent->save();

        return response('Succesfully Updated Data',200);
    }
    //
}