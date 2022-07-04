<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
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
