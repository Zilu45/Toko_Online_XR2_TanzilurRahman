<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Hash;
use App\Models\User;

class AuthController extends Controller
{
    function register(Request $request){ 
        $validator = Validator :: make($request->all(), [
            'name'=>'required',
            'email'=>'required|unique:users',
            "address"=>'required',
            "birthday"=>'required',
            'role'=>'required',
            'password'=>'required',
        ]);
    if($validator->fails()){
            return response()->json([
                'status' => false,
                'message'=> $validator->errors(),
            ]);
        }
        $data = [
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'password'=>Hash::make($request->get('password')),
            'role'=>$request->get('role'),
            "address"=>$request->get("address"),
            "birthday"=>$request->get("birthday")
        ];
    
        try {
            $insert = User::create($data);
            return Response()->json(["status"=>true, 'message'=>'data berhasil ditambahkan']);
        }
        catch (Exception $e){
            return Response()->json(["status"=>false,'message'=>$e]);
        }
    }
   
}