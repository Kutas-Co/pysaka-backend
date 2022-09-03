<?php

namespace App\Http\Controllers;

use App\Events\GameFinished;
use App\Events\GameUpdated;
use App\Http\Requests\StoreRoundRequest;
use App\Http\Requests\UpdateRoundRequest;
use App\Http\Resources\RoundResource;
use App\Models\Game;
use App\Models\Round;
use Illuminate\Auth\Access\AuthorizationException;
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
     * @param Game $game
     * @return RoundResource
     * @throws AuthorizationException
     */
    public function nextRound(Game $game)
    {
        $this->authorize('getNext', [Round::class, $game]);

        if ( $game->status == Game::STATUS_STARTED ){
            $game->lockGame(auth()->user());
        }
        if ( $game->status == Game::STATUS_DRAFT ){
            $game->update(['status' => Game::STATUS_WAITING_FIRST_ROUND]);
        }

        $newRound = Round::query()->firstOrCreate([
            'game_id' => $game->id,
            'status' => Round::STATUS_DRAFT,
            'author_id' => request()->user()->id,
        ], [
            'text' => '',
            'excerpt' => '',
        ]);

        broadcast(new GameUpdated($game))->toOthers();

        return RoundResource::make($newRound);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return RoundResource
     */
    public function create(Request $request, Game $game)
    {
        $this->authorize('create', [Round::class, $game]);

        if ($game->status != Game::STATUS_DRAFT){
            $game->lockGame( $request->user() );
        }
        if ($game->status == Game::STATUS_DRAFT){
            $game->update(['status' => Game::STATUS_WAITING_FIRST_ROUND]);
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

        return RoundResource::make($round->load(request()->input('includes', [])));
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
     * @throws AuthorizationException
     */
    public function publish(Request $request, Round $round): RoundResource
    {
        $this->authorize('publish', $round);

        $round->publish();

        /** @var Game $game */
        if($game = $round->game){
            if ($game->status != Game::STATUS_STARTED && $request->user()->id == $game->user_id){
                $game->start($withSave = false);
            }
            $game->locked_at = null;
            $game->locked_by_user_id = null;

            if ($game->rounds_max <= $game->rounds()->count()){
                $game->finish($withSave = false);
                GameFinished::dispatch($game);
            }

            $game->save();
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
