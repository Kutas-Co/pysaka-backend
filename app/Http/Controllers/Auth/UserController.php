<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Get auth user data
     *
     * @response {
    "id": 3,
    "name": "User Name",
    "email": "writer@funny.com",
    "email_verified_at": "2022-07-26T21:36:43.000000Z",
    "role": "User",
    "created_at": "2022-07-26T21:36:43.000000Z",
    "updated_at": "2022-08-13T23:50:18.000000Z"
    }
     *
     * @group Auth
     * @param  \Illuminate\Http\Request  $request
     * @return UserResource
     */
    public function __invoke(Request $request)
    {
        return UserResource::make($request->user());
    }
}
