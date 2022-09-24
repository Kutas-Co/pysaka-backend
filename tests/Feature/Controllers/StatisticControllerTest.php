<?php

namespace Tests\Feature\Controllers;

use App\Http\Resources\StatisticResource;
use App\Models\Game;
use App\Models\Round;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StatisticControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function guest_can_get_statistic()
    {
        $user = User::factory()->create();
        Game::factory()->count(3)->create();
        $gameOwned = Game::factory()->create(['user_id' => $user]);
        Game::factory()->count(3)->has(Round::factory([
            'author_id' => $user->id,
            'game_id' => $gameOwned->id,
        ]), 'rounds')->create();

        $this->getJson(route('statistic'))
            ->assertSuccessful()
            ->assertJsonStructure(StatisticResource::jsonSchema([
                'user_created_games_count',
                'user_involved_games_count',
            ]))
            ->assertJsonPath('all_games_count', Game::count());
    }

    /**
     * @test
     */
    public function auth_user_can_get_statistic()
    {
        $user = User::factory()->create();
        Game::factory()->count(3)->create();
        $gameOwned = Game::factory()->create(['user_id' => $user]);
        Game::factory()->count(3)->has(Round::factory([
            'author_id' => $user->id,
            'game_id' => $gameOwned->id,
        ]), 'rounds')->create();

        $this->actingAs($user)->getJson(route('statistic'))
            ->assertSuccessful()
            ->assertJsonStructure(StatisticResource::jsonSchema())
            ->assertJsonPath('all_games_count', Game::count())
            ->assertJsonPath('user_created_games_count', Game::whereUserId($user->id)->count())
            ->assertJsonPath(
                'user_involved_games_count',
                Game::where('user_id','!=', $user->id)->whereHas('rounds', function ($q) use ($user){ $q->whereAuthorId($user->id);})->count()
            );
    }
}
