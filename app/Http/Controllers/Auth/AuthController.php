<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Auth\LoginRequest;

/**
 * @group Auth
 */
class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only('destroy');
    }

    /**
     * Create auth token for user
     *
     * @response { "access_token": "token-string", "type": "Bearer" }
     * @unauthenticated
     * @param LoginRequest $request
     * @return JsonResponse
     * @throws \Illuminate\Validation\ValidationException
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
