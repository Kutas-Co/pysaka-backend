<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Round extends Model
{
    use HasFactory;

    const STATUS_DRAFT = 'Draft';
    const STATUS_PUBLISHED = 'Published';

    /**
     * @var string[]
     */
    protected $fillable = [
        'game_id',
        'author_id',
        'prev_round_id',
        'text',
        'excerpt',
        'status',
    ];

    /**
     * @return void
     */
    public function publish()
    {
        $this->update(['status' => Round::STATUS_PUBLISHED]);
    }
    /**
     * @return BelongsTo
     */
    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }
}
