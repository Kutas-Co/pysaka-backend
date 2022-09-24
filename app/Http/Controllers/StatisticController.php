<?php

namespace App\Http\Controllers;

use App\Http\Resources\StatisticResource;
use Illuminate\Http\Request;

/**
 * @group Statistic
 * @unauthenticated
 */
class StatisticController extends Controller
{

    /**
     * Get games statistic counters
     *
     * @response 200 scenario="For guests" {"all_games_count": "123"}
     * @response 200 scenario="For auth user" {"all_games_count": "123", "user_involved_games_count": "123", "user_created_games_count": "123"}
     * @param Request $request
     * @return StatisticResource
     */
    public function __invoke(Request $request): StatisticResource
    {
        return StatisticResource::make($request->user());
    }

}
