<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:55',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        $user = User::create($validateData);
        $accessToken = $user->createToken($user->email)->accessToken;

        return response([
           'user' => $user,
           'access_token' => $accessToken
        ]);
    }


    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (!auth()->attempt($loginData)) {
            return response('Invalid credentials', 401);
        }

        return response([
            'user' => auth()->user(),
            'access_token' => auth()->user()->createToken('authToken')->accessToken
        ]);
    }
}
