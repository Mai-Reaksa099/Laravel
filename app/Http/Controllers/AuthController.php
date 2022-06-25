<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller{

    public function register(Request $request){
        $fileds = $request->validate([
           'name' => 'required|string',
           'email' => 'required|string|unique:user,email',
           'password' => 'required|sting|confirmed'
        ]);
        $user = User::create([
            'name' => $fileds['name'],
            'email' => $fileds['email'],
            'password' => bcrypt($fileds['password'])
        ]);
        $token = $user->createToken('myapptoken')->plainTexToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return $response($response, 201);
    }
}
