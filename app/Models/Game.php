<?php

namespace App\Models;

use App\Events\GameUpdated;
use App\Policies\RoundPolicy;
use Database\Factories\GameFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Game
 *
 * @property string $status
 * @property-read bool $isPlayable
 * @property-read string $frontendUrl
 * @property string|null $locked_at
 * @property integer|null $locked_by_user_id
 * @property integer $rounds_max
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property int|null $max_lock_minutes
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read mixed $frontend_url
 * @property-read Collection $involved_users
 * @property-read bool $is_playable
 * @property-read Collection|\App\Models\Round[] $rounds
 * @property-read int|null $rounds_count
 * @property-read User|null $user
 * @method static GameFactory factory(...$parameters)
 * @method static Builder|Game newModelQuery()
 * @method static Builder|Game newQuery()
 * @method static Builder|Game query()
 * @method static Builder|Game whereCreatedAt($value)
 * @method static Builder|Game whereId($value)
 * @method static Builder|Game whereLockedAt($value)
 * @method static Builder|Game whereLockedByUserId($value)
 * @method static Builder|Game whereMaxLockMinutes($value)
 * @method static Builder|Game whereName($value)
 * @method static Builder|Game whereRoundsMax($value)
 * @method static Builder|Game whereStatus($value)
 * @method static Builder|Game whereUpdatedAt($value)
 * @method static Builder|Game whereUserId($value)
 * @mixin \Eloquent
 * @property-read User|null $lockedByUser
 */
class Game extends Model
{
    use HasFactory;

    /**
     * Statuses
     */
    const STATUS_DRAFT = 'Draft';
    const STATUS_CREATED = 'Created';
    const STATUS_STARTED = 'Started';
    const STATUS_WAITING_FIRST_ROUND = 'Waiting first round';
    const STATUS_FINISHED = 'Finished';

    /**
     * @var string[]
     */
    protected $fillable = [
        'status', 'user_id', 'name', 'rounds_max', 'max_lock_minutes', 'locked_at', 'locked_by_user_id',
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
        static::updated(function ($game) {
            if (in_array($game->status, [
                Game::STATUS_STARTED, Game::STATUS_FINISHED
            ])){
                if (auth()->check()){
                    broadcast(new GameUpdated($game))->toOthers();
                } else {
                    broadcast(new GameUpdated($game));
                }
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
     * @return BelongsTo
     */
    public function lockedByUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'locked_by_user_id');
    }

    /**
     * @return HasMany
     */
    public function rounds(): HasMany
    {
        return $this->hasMany(Round::class);
    }

    /**
     * @return Collection
     */
    public function getInvolvedUsersAttribute(): Collection
    {
        return User::query()->whereHas('rounds', function ($q){
            $q->whereIn('id', $this->rounds()->pluck('id')->toArray());
        })->get();
    }

    public function getFrontendUrlAttribute()
    {
        return rtrim(config('app.frontend_url'), '/') . '/games/' . $this->id;
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

    public function finish($withSave = true): void
    {
        $this->status = self::STATUS_FINISHED;
        if ($withSave){
            $this->save();
        }
    }

    /**
     * @param User|Authenticatable $locker
     * @param bool $force
     * @param bool $withSave
     * @return void
     */
    public function lockGame(User|Authenticatable $locker, bool $force = false, $withSave = true): void
    {
        if (!$this->locked_at || ($this->locked_at && $force)){
            $this->locked_at = now()->startOfMinute();
            $this->locked_by_user_id = $locker->id;
            if ($withSave){
                $this->save();
            }
        }
    }

}
