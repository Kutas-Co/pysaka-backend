<?php

namespace App\Http\Resources;

use App\Models\Game;
use App\Traits\WithResourceSchema;
use Illuminate\Http\Resources\Json\JsonResource;

class StatisticResource extends JsonResource
{
    use WithResourceSchema;

    const JSON_SCHEMA = [
        'all_games_count',
        'user_created_games_count',
        'user_involved_games_count',
    ];

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'all_games_count' => Game::count(),
            'user_created_games_count' => $this->when($this->resource, fn() => $this->resource->games()->count()),
            'user_involved_games_count' => $this->when(
                $this->resource,
                fn() => Game::query()
                    ->where('user_id', '!=', $this->resource->id)
                    ->whereHas('rounds', function ($q){
                        $q->whereAuthorId($this->resource->id);
                    })
                    ->count()
            ),
        ];
    }
}
