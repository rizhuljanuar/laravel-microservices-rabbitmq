<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Microservices\UserService;

class AuthController
{
    public function user()
    {
        return new UserResource((new UserService)->getUser());
    }
}
