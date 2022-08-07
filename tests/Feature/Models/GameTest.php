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
    public function game_can_belongs_to_locker_user()
    {
        $otherUser = User::factory()->create();

        $game = Game::factory()->create([
            'locked_by_user_id' => $otherUser->id
        ]);

        $this->assertInstanceOf(User::class, $game->lockedByUser);
        $this->assertTrue($game->lockedByUser->is($otherUser));
    }

    /**
     * @test
     */
    public function set_locked_by_user_id_attribute_on_game_locking()
    {
        $lockerUser = User::factory()->create();

        $game = Game::factory()->create();

        $this->assertNull($game->locked_at);
        $this->assertNull($game->locked_by_user_id);

        $game->lockGame($lockerUser);

        $game->fresh();
        $this->assertNotNull($game->locked_at);
        $this->assertEquals($lockerUser->id, $game->locked_by_user_id);
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

    /**
     * @test
     */
    public function game_is_payable_when_status_is_started()
    {
        $game = Game::factory()->create([
            'status' => Game::STATUS_STARTED,
        ]);
        $creator = $game->user;
        $round = Round::factory()->create([
            'author_id' => $creator->id,
            'game_id' => $game->id,
            'status' => Round::STATUS_PUBLISHED,
        ]);
        $otherUser = User::factory()->create();
        $this->actingAs($otherUser);

        $this->assertEquals($game->user_id, $round->author_id);

        $this->assertTrue($game->isPlayable);

    }
}
