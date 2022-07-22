<?php

namespace Tests\Feature\Models;

use App\Models\Game;
use App\Models\Round;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GameTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function game_can_has_rounds()
    {
        $round = Round::factory()->create();

        $game = $round->game;

        $this->assertInstanceOf(Round::class, $game->rounds()->first());

    }


    /**
     * @test
     */
    public function game_can_belongs_to_user()
    {
        $game = Game::factory()->create();
        $this->assertInstanceOf(User::class, $game->user);
    }
    /**
     * @test
     */
    public function game_has_is_playable_attribute()
    {
        $game = Game::factory()->create();
        $this->assertNotNull($game->isPlayable);
    }

    /**
     * @test
     */
    public function game_is_playable_for_creator_before_first_round_draft_creation()
    {
        /** @var Game $game */
        $game = Game::factory()->create([
            'status' => Game::STATUS_DRAFT,
        ]);
        $this->actingAs($game->user);

        $this->assertTrue($game->isPlayable);
    }

    /**
     * @test
     */
    public function game_is_not_playable_for_other_while_not_started()
    {
        $otherUser = User::factory()->create();
        $this->actingAs($otherUser);

        /** @var Game $game */
        $game = Game::factory()->create([
            'status' => Game::STATUS_DRAFT,
        ]);

        $this->assertFalse($game->isPlayable);

    }
}
