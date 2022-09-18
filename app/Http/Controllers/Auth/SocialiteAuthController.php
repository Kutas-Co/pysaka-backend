<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Laravel\Socialite\Facades\Socialite;

class SocialiteAuthController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirect(Request $request)
    {
        $request->validate([
            'driver' => Rule::in('google'),
        ]);

        return response()->json([
            'driver' => $request->driver,
            'url' => Socialite::driver($request->driver)->stateless()->redirect()->getTargetUrl(),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function callback(Request $request)
    {
        $request->validate([
            'driver' => Rule::in('google'),
        ]);

        try {
            $socialiteUser = Socialite::driver($request->driver)->stateless()->user();

            //find existed or create new user
            $user = User::query()->firstOrCreate([
                'email' => $socialiteUser->email,
            ], [
                'name' => $socialiteUser->name,
                'password' => bcrypt(Str::random(32)),
                'email_verified_at' => now(),
            ]);

            //fire event if user created
            if ($user->wasRecentlyCreated){
                event(new Registered($user));
            }

            //mark email as verified if required
            if (!$user->hasVerifiedEmail()){
                $user->markEmailAsVerified();
            }

            return response()->json([
                'access_token' => $user->createToken('access_token')->plainTextToken,
                'type' => 'Bearer',
            ]);

        } catch (\Exception $exception){
            Log::error($exception->getMessage(), $exception->getTrace());

            throw $exception;
        }

    }
}
