<?php

namespace App\Http\Resources;

use App\Traits\WithResourceSchema;
use Illuminate\Http\Resources\Json\JsonResource;

class RoundResource extends JsonResource
{
    use WithResourceSchema;

    const JSON_SCHEMA = [
        'id',
        'author_id',
        'game_id',
        'text',
        'excerpt',
        'prev_round_id',
        'status',
        'game',
    ];

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'author_id' => $this->author_id,
            'game_id' => $this->game_id,
            'game' => $this->whenLoaded('game', fn() => GameResource::make($this->game)),
            'text' => $this->text,
            'excerpt' => $this->excerpt,
            'prev_round_id' => $this->prev_round_id,
            'status' => $this->status,
        ];
    }
}
