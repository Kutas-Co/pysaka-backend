<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\Round;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Round>
 */
class RoundFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'game_id' => Game::factory()->create()->id,
            'author_id' => User::factory()->create()->id,
            'prev_round_id' => null,
            'text' => $this->faker->text,
            'excerpt' => $excerpt = $this->faker->sentence,
            'excerpt_length' => strlen($excerpt),
            'status' => Round::STATUS_DRAFT,
        ];
    }
}
