<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Round
 *
 * @property int $id
 * @property int $author_id
 * @property int $game_id
 * @property string $text
 * @property string|null $excerpt
 * @property int $excerpt_length
 * @property int|null $prev_round_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $author
 * @property-read \App\Models\Game|null $game
 * @method static \Database\Factories\RoundFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Round newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Round newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Round query()
 * @method static \Illuminate\Database\Eloquent\Builder|Round whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Round whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Round whereExcerpt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Round whereExcerptLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Round whereGameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Round whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Round wherePrevRoundId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Round whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Round whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Round whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
        'excerpt_length',
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

    /**
     * @return BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
