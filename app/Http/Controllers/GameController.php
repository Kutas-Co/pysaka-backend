<?php

namespace App\Http\Controllers;

use App\Events\GameFinished;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Http\Resources\GameResource;
use App\Http\Resources\PublicGameResource;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\Rule;

/**
 * @group Games
 */
class GameController extends Controller
{
    /**
     * Display a listing of the public games.
     *
     * @response { "data": [ {
        "id": 132,
        "user_id": 1,
        "name": "New Game #6",
        "status": "Finished",
        "rounds_max": 2,
        "finished_rounds_count": 2,
        "latest_round_excerpt": null,
        "max_lock_minutes": 15,
        "is_playable_for_current_user": false,
        "locked_at": null,
        "locked_by_user_id": null,
        "created_at": "2022-09-03T21:09:31.000000Z",
        "updated_at": "2022-09-03T21:09:53.000000Z"
        },]
     * }
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $games = Game::whereIn('status', [Game::STATUS_STARTED, Game::STATUS_FINISHED])->latest()->paginate(6);
        return GameResource::collection($games);
    }

    /**
     * Display a listing of the auth user's games.
     * @response { "data": [{
        "id": 132,
        "user_id": 1,
        "name": "New Game #6",
        "status": "Finished",
        "rounds_max": 2,
        "finished_rounds_count": 2,
        "latest_round_excerpt": null,
        "max_lock_minutes": 15,
        "is_playable_for_current_user": false,
        "locked_at": null,
        "locked_by_user_id": null,
        "created_at": "2022-09-03T21:09:31.000000Z",
        "updated_at": "2022-09-03T21:09:53.000000Z"
        },]
     * }
     *
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function indexUser(Request $request)
    {
        return GameResource::collection($request->user()->games()->latest()->paginate(6));
    }

    /**
     * Create new game
     * @response 201 {
        "id": 132,
        "user_id": 1,
        "name": "New Game #6",
        "status": "Finished",
        "rounds_max": 2,
        "finished_rounds_count": 2,
        "latest_round_excerpt": null,
        "max_lock_minutes": 15,
        "is_playable_for_current_user": false,
        "locked_at": null,
        "locked_by_user_id": null,
        "created_at": "2022-09-03T21:09:31.000000Z",
        "updated_at": "2022-09-03T21:09:53.000000Z"
        }
     * @param Request $request
     * @return GameResource
     */
    public function create(Request $request)
    {
        return GameResource::make($request->user()->games()->firstOrCreate([
            'status' => Game::STATUS_DRAFT,
            'rounds_max' => 5,
            'max_lock_minutes' => 1,
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGameRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGameRequest $request)
    {
        //
    }

    /**
     * Display the specified game.
     * @response 200 {
        "id": 132,
        "user_id": 1,
        "name": "New Game #6",
        "status": "Finished",
        "rounds_max": 2,
        "finished_rounds_count": 2,
        "latest_round_excerpt": null,
        "max_lock_minutes": 15,
        "is_playable_for_current_user": false,
        "locked_at": null,
        "locked_by_user_id": null,
        "created_at": "2022-09-03T21:09:31.000000Z",
        "updated_at": "2022-09-03T21:09:53.000000Z"
        }
     * @param  \App\Models\Game  $game
     * @return GameResource
     */
    public function show(Request $request,Game $game)
    {
        $this->validate($request, [
            'includes' => ['sometimes', 'array', Rule::in(['rounds', 'rounds.author'])]
        ]);
        return GameResource::make($game->load($request->input('includes', [] )));
    }

    /**
     * Show a game with public schema
     * {
        'id' => 123,
        'author_name' => "Test user",
        'name' => "Game title here",
        'status' => "Finished",
        'rounds' => "8",
        }
     *
     * @param Request $request
     * @param Game $game
     * @return PublicGameResource
     */
    public function showPublic( Game $game )
    {
        if ($game->status !== Game::STATUS_FINISHED){
            abort(404);
        }

        return PublicGameResource::make($game);
    }

    /**
     * Update the specified game in storage.
     * @response 200 {
        "id": 132,
        "user_id": 1,
        "name": "New Game #6",
        "status": "Finished",
        "rounds_max": 2,
        "finished_rounds_count": 2,
        "latest_round_excerpt": null,
        "max_lock_minutes": 15,
        "is_playable_for_current_user": false,
        "locked_at": null,
        "locked_by_user_id": null,
        "created_at": "2022-09-03T21:09:31.000000Z",
        "updated_at": "2022-09-03T21:09:53.000000Z"
        }
     *
     * @param  \App\Http\Requests\UpdateGameRequest  $request
     * @param  \App\Models\Game  $game
     * @return GameResource
     */
    public function update(UpdateGameRequest $request, Game $game)
    {
        $game->update($request->validated());
        $game->load('rounds');
        return GameResource::make($game);
    }

    /**
     * Start existed draft game
     * @response {
        "id": 132,
        "user_id": 1,
        "name": "New Game #6",
        "status": "Finished",
        "rounds_max": 2,
        "finished_rounds_count": 2,
        "latest_round_excerpt": null,
        "max_lock_minutes": 15,
        "is_playable_for_current_user": false,
        "locked_at": null,
        "locked_by_user_id": null,
        "created_at": "2022-09-03T21:09:31.000000Z",
        "updated_at": "2022-09-03T21:09:53.000000Z"
        }
     * @param Request $request
     * @param Game $game
     * @return GameResource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function start(Game $game)
    {
        $this->authorize('start', $game);
        $game->start();
        return GameResource::make($game);
    }

    /**
     * Finish existed game
     * @response {
        "id": 132,
        "user_id": 1,
        "name": "New Game #6",
        "status": "Finished",
        "rounds_max": 2,
        "finished_rounds_count": 2,
        "latest_round_excerpt": null,
        "max_lock_minutes": 15,
        "is_playable_for_current_user": false,
        "locked_at": null,
        "locked_by_user_id": null,
        "created_at": "2022-09-03T21:09:31.000000Z",
        "updated_at": "2022-09-03T21:09:53.000000Z"
        }
     * @param Game $game
     * @return GameResource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function finish(Game $game)
    {
        $this->authorize('finish', $game);
        $game->finish();
        GameFinished::dispatch($game);
        return GameResource::make($game);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
    }
}
