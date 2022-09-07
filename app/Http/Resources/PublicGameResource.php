<?php

namespace App\Http\Resources;

use App\Models\Round;
use App\Traits\WithResourceSchema;
use Illuminate\Http\Resources\Json\JsonResource;

class PublicGameResource extends JsonResource
{
    use WithResourceSchema;

    const JSON_SCHEMA = [
        'id',
        'author_name',
        'name',
        'status',
        'rounds',
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
            'author_name' => $this->user->name,
            'name' => $this->name,
            'status' => $this->status,
            'rounds' => PublicRoundResource::collection($this->rounds()->whereStatus(Round::STATUS_PUBLISHED)->get()),
        ];
    }
}
