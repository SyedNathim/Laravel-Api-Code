<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UsersController extends Controller
{
    public function index(){
   
        $users = User::all();
        $data = [
            'status'=>200,
            'students'=>$users
        ];
        
        return response()->json($data, 200);
    
       }

       public function store(Request $request)
       {
        $requestData = $request->input('dataToSend');
        
        // $requestData->validate([
        //     'email' => 'required|email|unique:users',
        //     // Add other validation rules if needed
        // ]);

        if ($requestData['password'] == "") {
         $password = 'server';
        } else {
         $password = $requestData['password'];
        }
        
    
            $user = User::create([
                'username' => $requestData['displayName'],
                'email' => $requestData['email'],
                'userid' => $requestData['uid'],
                'password' => $password
                
            ]);
   
           return response()->json(['message' => 'User created successfully'], 201);
       }
}
