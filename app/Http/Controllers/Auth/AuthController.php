<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Auth\LoginRequest;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only('destroy');
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function create(LoginRequest $request): JsonResponse
    {
        $request->authenticate();

        return response()->json([
            'access_token' => User::whereEmail($request->email)->firstOrFail()->createToken('access_token')->plainTextToken,
            'type' => 'Bearer',
        ]);
    }

    /**
     * @return JsonResponse
     */
    public function destroy(): JsonResponse
    {
        auth()->user()->currentAccessToken()->delete();

        return response()->json();
    }
}
