<?php

namespace App\Policies;

use App\Models\Game;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use function Symfony\Component\String\u;

class GamePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Game $game)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Game $game)
    {
        return $user->id == $game->user_id;
    }

    /**
     * @param User $user
     * @param Game $game
     * @return bool|\Illuminate\Auth\Access\Response
     */
    public function start(User $user, Game $game)
    {
        return $this->update($user, $game);
    }

    /**
     * @param User $user
     * @param Game $game
     * @return bool|\Illuminate\Auth\Access\Response
     */
    public function finish(User $user, Game $game)
    {
        return $this->update($user, $game);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Game $game)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Game $game)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Game $game)
    {
        //
    }
}
