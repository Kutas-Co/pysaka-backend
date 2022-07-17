<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    use HasFactory;

    const STATUS_DRAFT = 'Draft';
    const STATUS_CREATED = 'Created';
    const STATUS_STARTED = 'Started';
    const STATUS_FINISHED = 'Finished';

    /**
     * @var string[]
     */
    protected $fillable = [
        'status', 'user_id', 'name', 'rounds_max', 'max_lock_minutes',
    ];

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
    public function start()
    {
        $this->update(['status' => self::STATUS_STARTED]);
    }

    public function finish(): void
    {
        $this->update(['status' => self::STATUS_FINISHED]);
    }
}
