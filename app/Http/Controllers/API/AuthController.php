<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $data = $request->only('name', 'email', 'password');
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        if($user->wasRecentlyCreated){
            $token = $user->createToken('user');
            return [
                "token" => $token->plainTextToken,
                "userData" => $user
            ];
        }
    }
}
