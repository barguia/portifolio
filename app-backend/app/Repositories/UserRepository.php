<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Response;


class UserRepository extends AbstractCRUDRepository
{
    public function __construct()
    {
        $this->model = app(User::class);
    }

    public function create(array $data): Response
    {
        $data['password'] = bcrypt($data['password']);

        $user = $this->model->create($data);
        $accessToken = $user->createToken($user->email)->accessToken;

        return response(
            [
                'data' => [
                    'user' => $user,
                    'access_token' => $accessToken
                ],
                'message' => 'Successfully created.'
            ],
            201
        );
    }
}
