<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $status
 * @property-read bool $isPlayable
 * @property string|null $locked_at
 * @property integer $rounds_max
 */
class Game extends Model
{
    use HasFactory;

    const STATUS_DRAFT = 'Draft';
    const STATUS_CREATED = 'Created';
    const STATUS_STARTED = 'Started';
    const STATUS_WAITING_FIRST_ROUND = 'Waiting first round';
    const STATUS_FINISHED = 'Finished';

    /**
     * @var string[]
     */
    protected $fillable = [
        'status', 'user_id', 'name', 'rounds_max', 'max_lock_minutes', 'locked_at',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::created(function ($game) {
            if($user = auth()->user()){
                $game->update(['name' => 'New Game #' . $user->games()->count() + 1]);
            }
        });
    }

    /**
     * @return bool
     */
    public function getIsPlayableAttribute()
    {
        /** @var User $user */
        if( $user = auth()->user()){
            //check game creator
            $latestRound = $this->rounds()->latest()->first();

            if ($user->id == $this->user_id){
                return $this->status == Game::STATUS_DRAFT
                    || $this->status == Game::STATUS_WAITING_FIRST_ROUND
                    || ( $this->status == Game::STATUS_STARTED && $latestRound && $latestRound->author_id != $user->id && $latestRound->status == Round::STATUS_PUBLISHED);
            } else {//check other users
                return $this->status == Game::STATUS_STARTED
//                    && is_null($this->locked_at)
                    && (
                        $latestRound
                        && ( $latestRound->status == Round::STATUS_PUBLISHED && $latestRound->author_id != $user->id )
                        || ( $latestRound?->status == Round::STATUS_DRAFT && $latestRound->author_id == $user->id )
                    );
            }

        } else {
            return false;
        }
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     */
    public function rounds(): HasMany
    {
        return $this->hasMany(Round::class);
    }

    /**
     * @return void
     */
    public function start($withSave = true)
    {
        $this->status = self::STATUS_STARTED;
        if ($withSave){
            $this->save();
        }
    }

    public function finish(): void
    {
        $this->update(['status' => self::STATUS_FINISHED]);
    }

    /**
     * @return void
     */
    public function lockGame(): void
    {
        $this->locked_at = now();
        $this->save();
    }

}
