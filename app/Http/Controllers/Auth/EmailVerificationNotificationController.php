<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

/**
 * @group Auth
 */
class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     * @response 200 {"status": "verification-link-sent", "success": "true"}
     * @response 200 scenario="Email already verified" {"status": "already-verified","has-verified": "true", "success": "false"}
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){
        if ($request->user()->hasVerifiedEmail()) {
            return response()->json(['status' => __('already-verified'), 'has_verified' => true, 'success' => false]);
        }

        $request->user()->sendEmailVerificationNotification();

        return response()->json(['status' => __('verification-link-sent'), "success" => true ]);
    }
}
