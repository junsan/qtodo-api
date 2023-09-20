<?php

namespace App\Http\Controllers;


use Laravel\Sanctum\HasApiTokens;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    use HasApiTokens;
    
    public function login(UserRequest $request) 
    {
        if (Auth::attempt($request->validated())) {
            $user = User::where('email', $request->email)->first(); 
            $success['token'] =  $user->createToken('qtodo-token')->accessToken; 
            $success['name'] =  $user->name;

            return response()->json(["success" => true, "login" => true, "token" => $success['token'], "name" => $success['name']]);
        } else{ 
            return response()->json(['error' => 'Unauthorised', "login" => false]);
        } 
    } 
}
