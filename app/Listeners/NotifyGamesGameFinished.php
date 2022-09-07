<?php

namespace App\Listeners;

use App\Events\GameFinished;
use App\Notifications\GameFinishedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class NotifyGamesGameFinished
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\GameFinished  $event
     * @return void
     */
    public function handle(GameFinished $event)
    {

        Notification::send($event->game->involvedUsers, new GameFinishedNotification($event->game));
    }
}
