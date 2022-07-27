<?php

namespace Tests\Feature\Controllers;

use App\Http\Resources\GameResource;
use App\Http\Resources\PublicGameResource;
use App\Http\Resources\PublicRoundResource;
use App\Models\Game;
use App\Models\Round;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GameControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withAuthUser();
    }

    /**
     * @test
     */
    public function user_can_get_new_draft_game()
    {
        $this->getJson(route('games.create'))
            ->assertSuccessful()
            ->assertJsonStructure(GameResource::jsonSchema(['rounds']))
            ->assertJsonPath('status', Game::STATUS_DRAFT);
    }

    /**
     * @test
     */
    public function user_can_get_own_games_list()
    {
        Game::factory()->count(3)->create(['user_id' => $this->user->id]);
        Game::factory()->create();

        $response = $this->getJson(route('games.user.index'));
        $response
            ->assertSuccessful()
            ->assertJsonStructure(['data' =>[ '*' =>  GameResource::jsonSchema(['rounds'])]]);
        $this->assertCount(3, $response->json('data'));
    }

    /**
     * @test
     */
    public function user_can_get_public_games_list()
    {
        Game::factory()->count(2)->create(['user_id' => $this->user->id, 'status' => Game::STATUS_DRAFT]);
        Game::factory()->create(['user_id' => $this->user->id, 'status' => Game::STATUS_STARTED]);
        Game::factory()->count(2)->create(['status' => Game::STATUS_STARTED]);
        Game::factory()->create(['status' => Game::STATUS_DRAFT]);
        Game::factory()->create(['status' => Game::STATUS_WAITING_FIRST_ROUND]);

        $expectedPublicGamesCount = 1 + 2;

        $response = $this->getJson(route('games.index'));
        $response
            ->assertSuccessful()
            ->assertJsonStructure(['data' =>[ '*' =>  GameResource::jsonSchema(['rounds'])]]);
        $this->assertCount($expectedPublicGamesCount, $response->json('data'));
    }

    /**
     * @test
     */
    public function user_can_get_game_by_id()
    {
        $game = Game::factory()->create(['user_id' => $this->user->id]);

        $this->getJson(route('games.show', ['game' => $game->id, 'includes' => ['rounds']]))
            ->assertSuccessful()
            ->assertJsonStructure(GameResource::jsonSchema());
    }

    /**
     * @test
     */
    public function user_can_update_game_settings()
    {
        $game = Game::factory()->create(['user_id' => $this->user->id]);

        $this->assertEquals(Game::STATUS_DRAFT, $game->status);

        $newData = [
            'name' => 'Test name',
            'rounds_max' => 5,
            'max_lock_minutes' => 100,
        ];

        $this->putJson(route('games.update', $game), $newData)
            ->assertSuccessful()
            ->assertJsonStructure(GameResource::jsonSchema());

        $this->assertDatabaseHas('games', [ 'id' => $game->id ] + $newData );
        $this->assertEquals(Game::STATUS_DRAFT, $game->fresh()->status);

    }

    /**
     * @test
     */
    public function user_can_start_created_game()
    {
        $game = Game::factory()->create(['user_id' => $this->user->id, 'status' => Game::STATUS_CREATED]);
        $newData = [
            'status' => Game::STATUS_STARTED,
        ];
        $this->postJson(route('games.start', $game), $newData)
            ->assertSuccessful()
            ->assertJsonStructure(GameResource::jsonSchema(['rounds']));

        $this->assertDatabaseHas('games', [
            'id' => $game->id,
            'status' => Game::STATUS_STARTED,
        ]);
    }

    /**
     * @test
     */
    public function user_can_finish_game()
    {
        $game = Game::factory()->create(['user_id' => $this->user->id, 'status' => Game::STATUS_STARTED]);

        $this->postJson(route('games.finish', $game))
            ->assertSuccessful()
            ->assertJsonStructure(GameResource::jsonSchema(['rounds']));

        $this->assertDatabaseHas('games', [
            'id' => $game->id,
            'status' => Game::STATUS_FINISHED,
        ]);
    }

    /**
     * @test
     */
    public function auth_user_can_get_public_game()
    {
        $round = Round::factory()->create(['status' => Round::STATUS_PUBLISHED]);
        $game = $round->game;
        $game->update(['status' => Game::STATUS_FINISHED]);
        $expectedSchema = PublicGameResource::jsonSchema(['rounds']);
        $expectedSchema['rounds'] = ['*' => PublicRoundResource::jsonSchema()];
        $this->get(route('public.games.show', $game))
            ->assertSuccessful()
            ->assertJsonStructure($expectedSchema);
    }

    /**
     * @test
     */
    public function guest_user_can_get_public_game()
    {
        auth()->logout();
        $this->assertGuest();

        $round = Round::factory()->create(['status' => Round::STATUS_PUBLISHED]);
        $game = $round->game;
        $game->update(['status' => Game::STATUS_FINISHED]);
        $expectedSchema = PublicGameResource::jsonSchema(['rounds']);
        $expectedSchema['rounds'] = ['*' => PublicRoundResource::jsonSchema()];
        $this->get(route('public.games.show', $game))
            ->assertSuccessful()
            ->assertJsonStructure($expectedSchema);
    }

    /**
     * @test
     */
    public function user_can_get_public_game_only_if_game_is_finished()
    {
        $round = Round::factory()->create(['status' => Round::STATUS_PUBLISHED]);
        $game = $round->game;
        $game->update(['status' => Game::STATUS_STARTED]);
        $this->get(route('public.games.show', $game))
            ->assertNotFound();
    }
}
