<?php

namespace App\Http\Resources;

use App\Traits\WithResourceSchema;
use Illuminate\Http\Resources\Json\JsonResource;

class PublicRoundResource extends JsonResource
{
    use WithResourceSchema;

    const JSON_SCHEMA = [
        'text',
        'author' => ['name']
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
            'text' => $this->text,
            'author' => $this->author()->get(['id', 'name'])->first()->toArray()
        ];
    }
}
