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
        $user = User::where('email', $request->email)->first();

        if($user) {
            if (Auth::attempt($request->validated())) {
                //$user = User::where('email', $request->email)->first(); 
                $success['token'] =  $user->createToken('qtodo-token')->accessToken; 
                $success['name'] =  $user->name;
                $success['email'] =  $user->email;

                return response()->json(["success" => true, "login" => true, "token" => $success['token'], "name" => $success['name'], "email" => $success['email']]);
            } else { 
                return response()->json(['error' => 'Password not correct.', "login" => false]);
            } 
        }
    } 
}
