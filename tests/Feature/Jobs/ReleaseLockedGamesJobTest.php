<?php

namespace Tests\Feature\Jobs;

use App\Jobs\ReleaseLockedGamesJob;
use App\Models\Game;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReleaseLockedGamesJobTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function system_can_release_locked_games()
    {
        $gameMustBeReleased = Game::factory()->create([
            'locked_at' => now()->subMinutes(16)
        ]);

        $gameMustNotBeReleased = Game::factory()->create([
            'locked_at' => now()->subMinutes(11)
        ]);

        $notLockedGame = Game::factory()->create([
            'locked_at' => null
        ]);

        $this->assertEquals(2, Game::query()->whereNotNull('locked_at')->count());

        ReleaseLockedGamesJob::dispatch();

        $this->assertEquals(1, Game::query()->whereNotNull('locked_at')->count());


    }
}
