<?php

namespace App\Http\Resources;

use App\Traits\WithResourceSchema;
use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    use WithResourceSchema;

    const JSON_SCHEMA = [
        'id',
        'user_id',
        'name',
        'status',
        'rounds_max',
        'rounds',
        'max_lock_minutes',
        'locked_at',
        'created_at',
        'updated_at',
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
            'user_id' => $this->user_id,
            'name' => $this->name,
            'status' => $this->status,
            'rounds_max' => $this->rounds_max,
            'rounds' => $this->whenLoaded('rounds', fn() => RoundResource::collection($this->rounds)),
            'max_lock_minutes' => $this->max_lock_minutes,
            'locked_at' => $this->locked_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
