<?php

namespace Tests\Feature\Models;

use App\Models\Round;
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
}
