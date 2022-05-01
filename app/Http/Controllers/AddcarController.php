<?php

namespace App\Http\Controllers;

use App\Models\addcars;
use Illuminate\Http\Request;

class AddcarController extends Controller
{
    //

    public function allcars(){
        $cars= addcars::all();
        return response()->json(['message'=>'all cars','cars'=>$cars]);
    }


    public function addcars(Request $req){

        // return $req;
        $req->validate([
            'car_name'=>'required|unique:addcars',
            'car_info'=>'required',
            'car_price'=>'required',
            'car_photo'=>'required',
        ]);
        // dd($req->file('car_photo'));
        if($req->has('car_photo')){
            $file = $req->file('car_photo');
            $extension = $file->getClientOriginalExtension();
            $photo_name = str_replace(' ','',$req->car_name) . '.' . $extension;
            $req->file('car_photo')->storeAs('images', $photo_name,'public');
    
        }
        $admin = new addcars();
        $admin->car_name = $req->car_name;
        $admin->car_info = $req->car_info;
        $admin->car_price = $req->car_price;
        $admin->car_photo = $photo_name;
        $admin->save();

        return response()->json(['message'=>'car added successfully']);
    }


    public function edit($id){
        $cars = addcars::find($id);
        return response()->json(['message'=>'now','cars'=>$cars]);
    }

    public function delete($id){
        $cars = addcars::find($id)->destroy($id);
        return response()->json(['message'=>'yuh dweet']);
    }

    public function update(Request $req,$id){
        $cars = addcars::where('id',$id)->update([
            'car_name' => $req->car_name,
            'car_info'=> $req->car_info,
            'car_price'=> $req->car_price,
            'car_photo'=> $req->car_photo,

        ]);
        return response()->json(['message'=>'it update madhead']);
    }


    public function carinfo($id){
        $cars = addcars::find($id);
        return response()->json(['message'=>'INFO','cars'=>$cars]);
    }
}
