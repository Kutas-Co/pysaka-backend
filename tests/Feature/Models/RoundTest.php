<?php

namespace Tests\Feature\Models;

use App\Models\Game;
use App\Models\Round;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoundTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function round_can_belongs_to_game()
    {
        $round = Round::factory()->create();

        $this->assertInstanceOf(Game::class, $round->game);
    }
}
