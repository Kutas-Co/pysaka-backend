<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'New Game',
            'status' => Game::STATUS_DRAFT,
            'rounds_max' => 3,
            'user_id' => User::factory(),
            'max_lock_minutes' => 15,
            'locked_at' => null,
        ];
    }
}
