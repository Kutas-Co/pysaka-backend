<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Http\Resources\GameResource;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * @param Request $request
     * @return GameResource
     */
    public function create(Request $request)
    {
        return GameResource::make($request->user()->games()->firstOrCreate([
            'status' => Game::STATUS_DRAFT,
            'rounds_max' => 5,
            'max_lock_minutes' => 15,
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
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return GameResource
     */
    public function show(Request $request,Game $game)
    {
        $this->validate($request, [
            'includes' => ['sometimes', 'array', Rule::in(['rounds'])]
        ]);
        return GameResource::make($game->load($request->input('includes', [] )));
    }

    /**
     * Update the specified resource in storage.
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
     * @param Game $game
     * @return GameResource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function finish(Game $game)
    {
        $this->authorize('finish', $game);
        $game->finish();
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
