<?php

namespace App\Jobs;

use App\Events\GamesUnlocked;
use App\Models\Game;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ReleaseLockedGamesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $gameIdsToRelease = Game::query()
            ->where('locked_at', '<=', now()->subMinutes(15)
            ->toDateTimeString())->pluck('id')->toArray();
        if (!empty($gameIdsToRelease)){
            broadcast(new GamesUnlocked($gameIdsToRelease));
            Game::query()->whereIn('id', $gameIdsToRelease)->update([
                'locked_at' => null,
                'locked_by_user_id' => null,
            ]);
        }
    }
}
