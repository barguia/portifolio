<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends AbstractCRUDRepository
{
    public function __construct()
    {
        $this->model = app(User::class);
    }
}
