<?php

namespace Tests\Feature\Controllers;

use App\Http\Resources\RoundResource;
use App\Models\Game;
use App\Models\Round;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoundControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @var Game
     */
    protected Game $game;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withAuthUser();
        $this->game = Game::factory()->create([
            'user_id' => $this->user->id,
            'status' => Game::STATUS_CREATED,
        ]);
    }

    /**
     * @test
     */
    public function user_can_create_first_draft_round_for_own_game()
    {
        $this->game->update(['status' => Game::STATUS_DRAFT]);
        $this->assertEquals(0, $this->game->rounds()->count());
        $this->assertDatabaseHas('games', [
            'id' => $this->game->id,
            'status' => Game::STATUS_DRAFT,
            'locked_at' => null,
        ]);

        $this->getJson(route('games.rounds.next', ['game' => $this->game]))
            ->assertSuccessful()
            ->assertJsonStructure(RoundResource::jsonSchema(['game', 'author']))
            ->assertJsonPath('status', Round::STATUS_DRAFT );

        $this->assertDatabaseHas('games', [
            'id' => $this->game->id,
            'status' => Game::STATUS_WAITING_FIRST_ROUND,
            'locked_at' => null,
        ]);

        $this->assertEquals(1, $this->game->rounds()->count());

    }

    /**
     * @test
     */
    public function user_can_get_first_draft_round_for_own_game()
    {
        $this->game->update(['status' => Game::STATUS_WAITING_FIRST_ROUND]);
        $round = Round::factory()->create([
            'game_id' => $this->game->id,
            'author_id' => $this->user->id,
            'status' => Round::STATUS_DRAFT,
        ]);
        $this->assertEquals(1, $this->game->rounds()->count());

        $this->assertDatabaseHas('games', [
            'id' => $this->game->id,
            'status' => Game::STATUS_WAITING_FIRST_ROUND,
            'locked_at' => null,
        ]);

        $this->getJson(route('games.rounds.next', ['game' => $this->game]))
            ->assertSuccessful()
            ->assertJsonStructure(RoundResource::jsonSchema(['game', 'author']))
            ->assertJsonPath('id', $round->id)
            ->assertJsonPath('status', Round::STATUS_DRAFT );

        $this->assertDatabaseHas('games', [
            'id' => $this->game->id,
            'status' => Game::STATUS_WAITING_FIRST_ROUND,
            'locked_at' => null,
        ]);

        $this->assertEquals(1, $this->game->rounds()->count());

    }

    /**
     * @test
     */
    public function user_can_update_first_round_for_own_game()
    {
        $text = $this->faker->paragraph;
        $round = Round::factory()->create([
            'game_id' => $this->game->id,
            'author_id' => $this->user->id,
            'status' => Round::STATUS_DRAFT,
        ]);
        $roundData = [
            'text' => $text,
            'excerpt' => substr($text, -50),
            'excerpt_length' => strlen(substr($text, -50)),
        ];

        $this->putJson(route('rounds.update', $round), $roundData)
            ->assertSuccessful()
            ->assertJsonStructure(RoundResource::jsonSchema(['game', 'author']));

        $this->assertDatabaseHas('rounds', [
            'id' => $round->id,
            'excerpt_length' => strlen(substr($text, -50)),
        ]);

    }

    /**
     * @test
     */
    public function user_can_publish_first_round_for_own_game()
    {
        $this->game->update(['status' => Game::STATUS_DRAFT]);
        $round = Round::factory()->create([
            'game_id' => $this->game->id,
            'author_id' => $this->user->id,
            'status' => Round::STATUS_DRAFT,
        ]);

        $this->assertDatabaseHas('games', [
            'id' => $this->game->id,
            'status' => Game::STATUS_DRAFT,
        ]);

        $this->postJson(route('rounds.publish', $round))
            ->assertSuccessful()
            ->assertJsonStructure(RoundResource::jsonSchema(['game', 'author']));

        $this->assertDatabaseHas('games', [
            'id' => $this->game->id,
            'status' => Game::STATUS_STARTED,
            'locked_at' => null,
        ]);

        $this->assertDatabaseHas('rounds', [
            'id' => $round->id,
            'status' => Round::STATUS_PUBLISHED,
        ]);

    }

    /**
     * @test
     */
    public function user_can_get_own_round()
    {
        $round = Round::factory()->create([
            'game_id' => $this->game->id,
            'author_id' => $this->user->id,
            'status' => Round::STATUS_DRAFT,
        ]);

        $this->getJson(route('rounds.show', $round))
            ->assertSuccessful()
            ->assertJsonStructure(RoundResource::jsonSchema(['game', 'author']));
    }

    /**
     * @test
     */
    public function user_can_get_own_round_with_game_include()
    {
        $round = Round::factory()->create([
            'game_id' => $this->game->id,
            'author_id' => $this->user->id,
            'status' => Round::STATUS_DRAFT,
        ]);

        $this->getJson(route('rounds.show', ['round' => $round, 'includes' => ['game']]))
            ->assertSuccessful()
            ->assertJsonStructure(RoundResource::jsonSchema(['author']));
    }

    /**
     * @test
     */
    public function user_can_create_draft_round_for_not_own_game()
    {
        $otherUser = User::factory()->create();
        $this->game->update(['status' => Game::STATUS_STARTED, 'user_id' => $otherUser->id]);
        $round = Round::factory()->create([
            'author_id' => $otherUser->id,
            'status' => Round::STATUS_PUBLISHED,
            'game_id' => $this->game->id,
        ]);

        $this->assertEquals(1, $this->game->rounds()->count());


        $this->getJson(route('games.rounds.next', ['game' => $this->game]))
            ->assertSuccessful()
            ->assertJsonStructure(RoundResource::jsonSchema(['game', 'author']))
            ->assertJsonPath('status', Round::STATUS_DRAFT );

        $this->assertDatabaseHas('games', [
            'id' => $this->game->id,
            'status' => Game::STATUS_STARTED,
        ]);

        $this->assertNotNull($this->game->fresh()->locked_at);

        $this->assertEquals(2, $this->game->rounds()->count());
    }

    /**
     * @test
     */
    public function user_can_get_draft_round_for_not_own_game()
    {
        $otherUser = User::factory()->create();
        $this->game->update([
            'status' => Game::STATUS_STARTED,
            'user_id' => $otherUser->id,
            'locked_at' => now(),
        ]);
        $round = Round::factory()->create([
            'author_id' => $otherUser->id,
            'status' => Round::STATUS_PUBLISHED,
            'game_id' => $this->game->id,
            'created_at' => now()->subMinutes(1)
        ]);
        $ownRound = Round::factory()->create([
            'author_id' => $this->user->id,
            'status' => Round::STATUS_DRAFT,
            'game_id' => $this->game->id,
        ]);

        $this->getJson(route('games.rounds.next', ['game' => $this->game]))
            ->assertSuccessful()
            ->assertJsonStructure(RoundResource::jsonSchema(['game', 'author']))
            ->assertJsonPath('status', Round::STATUS_DRAFT );


    }

    /**
     * @test
     */
    public function user_can_publish_round_for_not_own_game()
    {
        $otherUser = User::factory()->create();
        $this->game->update([
            'status' => Game::STATUS_STARTED,
            'user_id' => $otherUser->id,
            'locked_at' => now(),
        ]);
        $round = Round::factory()->create([
            'author_id' => $otherUser->id,
            'status' => Round::STATUS_PUBLISHED,
            'game_id' => $this->game->id,
        ]);

        $ownRound = Round::factory()->create([
            'author_id' => $this->user->id,
            'status' => Round::STATUS_DRAFT,
            'game_id' => $this->game->id,
        ]);

        $this->postJson(route('rounds.publish', $ownRound))
            ->assertSuccessful()
            ->assertJsonStructure(RoundResource::jsonSchema(['game', 'author']));

        $this->assertDatabaseHas('games', [
            'id' => $this->game->id,
            'status' => Game::STATUS_STARTED,
            'locked_at' => null,
        ]);

        $this->assertDatabaseHas('rounds', [
            'id' => $ownRound->id,
            'status' => Round::STATUS_PUBLISHED,
        ]);

    }

    /**
     * @test
     */
    public function game_is_finished_on_last_round_finish()
    {
        $otherUser = User::factory()->create();
        $this->game->forceFill([
            'status' => Game::STATUS_STARTED,
            'user_id' => $otherUser->id,
            'locked_at' => now(),
            'rounds_max' => 2,
        ]);
        $this->game->save();
        $round = Round::factory()->create([
            'author_id' => $otherUser->id,
            'status' => Round::STATUS_PUBLISHED,
            'game_id' => $this->game->id,
        ]);

        $ownRound = Round::factory()->create([
            'author_id' => $this->user->id,
            'status' => Round::STATUS_DRAFT,
            'game_id' => $this->game->id,
        ]);

        $this->assertDatabaseHas('games', [
            'id' => $this->game->id,
            'status' => Game::STATUS_STARTED,
        ]);
        $this->assertNotNull($this->game->locked_at);

        $this->postJson(route('rounds.publish', $ownRound))
            ->assertSuccessful()
            ->assertJsonStructure(RoundResource::jsonSchema(['game', 'author']));

        $this->assertDatabaseHas('games', [
            'id' => $this->game->id,
            'locked_at' => null,
            'status' => Game::STATUS_FINISHED,
        ]);

    }
}
