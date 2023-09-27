<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\TodoList;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use HasApiTokens;
    
    public function login(UserRequest $request) 
    {
        $user = User::where('email', $request->email)->first();

        if($user) {
            if (Auth::attempt($request->validated())) {
                //$user = User::where('email', $request->email)->first(); 
                $todoList = TodoList::where('user_id', $user->id)->where('name', 'General')->first();
                $success['token'] =  $user->createToken('qtodo-token')->accessToken; 
                $success['name'] =  $user->name;
                $success['email'] =  $user->email;

                return response()->json(["success" => true, "login" => true, "token" => $success['token'], "name" => $success['name'], "email" => $success['email'], "id" => $user->id, 'listId' => $todoList->id]);
            } else { 
                return response()->json(['error' => 'Password not correct.', "login" => false]);
            } 
        } else {
            $user = User::create([
                'name' => '',
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            $todoList = TodoList::create([
                'user_id' => $user->id,
                'name' => 'General'
            ]);

            TodoList::create([
                'user_id' => $user->id,
                'name' => 'Personal'
            ]);

            TodoList::create([
                'user_id' => $user->id,
                'name' => 'Shopping'
            ]);

            TodoList::create([
                'user_id' => $user->id,
                'name' => 'Work'
            ]);

            return response()->json(["success" => true, "login" => true, "token" => 'qtodo-token', "email" => $user->email, "id" => $user->id, 'listId' => $todoList->id]);
        }
    } 

    public function automaticLogin($id) {
        $user = User::where('id', $id)->first();
        if ($user) { 
            $todoList = TodoList::where('user_id', $user->id)->where('name', 'General')->first();
            return response()->json(["success" => true, "login" => true, "token" => 'qtodo-token', "email" => $user->email, "id" => $user->id, 'listId' => $todoList->id]);
        }
    }
}
