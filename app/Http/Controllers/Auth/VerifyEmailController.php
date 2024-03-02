<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(EmailVerificationRequest $request)
    {
        abort_if(!$request->hasValidSignature(app()->environment('testing')), 403, 'Action is forbidden');

        if ($request->user()->hasVerifiedEmail()) {
            return response()->json([
                'has_verified' => true,
                'success' => false,
            ]);
        }
        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return response()->json(['success' => true, 'email_verified_at' => now()]);
    }
}
