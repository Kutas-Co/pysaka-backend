<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoundRequest;
use App\Http\Requests\UpdateRoundRequest;
use App\Http\Resources\RoundResource;
use App\Models\Game;
use App\Models\Round;
use Illuminate\Http\Request;

class RoundController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return RoundResource
     */
    public function create(Request $request, Game $game)
    {
        $this->authorize('create', [Round::class, $game]);

        if ($game->status != Game::STATUS_WAITING_FIRST_ROUND){
            $game->lockGame();
        }

        return RoundResource::make(Round::query()->firstOrCreate([
            'game_id' => $game->id,
            'status' => Round::STATUS_DRAFT,
            'author_id' => $request->user()->id,
            'text' => '',
            'excerpt' => '',
        ]));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoundRequest  $request
     * @return RoundResource
     */
    public function store(StoreRoundRequest $request)
    {
        return RoundResource::make(Round::create(
            collect([
                'author_id' => $request->user()->id,
            ])->merge($request->validated())->toArray()
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Round  $round
     * @return RoundResource
     */
    public function show(Round $round)
    {
        $this->authorize('view', $round);

        return RoundResource::make($round);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Round  $round
     * @return \Illuminate\Http\Response
     */
    public function edit(Round $round)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoundRequest  $request
     * @param  \App\Models\Round  $round
     * @return RoundResource
     */
    public function update(UpdateRoundRequest $request, Round $round)
    {
        $round->update($request->validated());
        return RoundResource::make($round);
    }

    /**
     * @param Request $request
     * @param Round $round
     * @return RoundResource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function publish(Request $request, Round $round)
    {
        $this->authorize('publish', $round);

        $round->publish();

        /** @var Game $game */
        if($game = $round->game){
            if ($game->status != Game::STATUS_STARTED && $request->user()->id == $game->user_id){
                $game->start();
            }
        }

        return RoundResource::make($round);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Round  $round
     * @return \Illuminate\Http\Response
     */
    public function destroy(Round $round)
    {
        //
    }
}
