<?php

namespace App\Models;

use App\Policies\RoundPolicy;
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

    protected $casts = [
        'locked_at' => 'datetime'
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
                $game->update(['name' => 'New Game #' . $user->games()->count()]);
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
            return (new RoundPolicy)->getNext($user, $this);
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
        $this->locked_at = now()->startOfMinute();
        $this->save();
    }

}
