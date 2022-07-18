<?php

namespace Tests\Feature\Models;

use App\Models\Game;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    /**
     * @test
     */
    public function user_can_has_games()
    {
        Game::factory()->create(['user_id' => $this->user->id]);

        $this->assertInstanceOf(Game::class, $this->user->games()->first());
    }
}
