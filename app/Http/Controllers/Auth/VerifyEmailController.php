<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/**
 * @group Auth
 */
class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     * @urlParam id int The user's ID. Example: 123
     * @urlParam hash string Verification hasn from email verification notification. Example: 2dc7eeb4c529d8645876f249b47e6465fe92ad04
     * @queryParam expires string required Expires parameter from email verification notification. Example: 1663803379
     * @queryParam signature string required Signature parameter from email verification notification. Example: 6c9ea33f80c85cc54c5620ed9257cac995dde1088401863280e3582f947b93be
     * @response 403 scenario="Invalid link | Token expired" {}
     * @response 200 scenario="Success" {"success" = "true", "email_verified_at" => "2022-01-01 22:22:22"}
     * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(EmailVerificationRequest $request)
    {
        abort_if(!$request->hasValidSignature(false), 403, 'Action is forbidden');

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
