<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudAPIController;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use CrudAPIController;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
        $this->formRequest = '';
    }

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
}
