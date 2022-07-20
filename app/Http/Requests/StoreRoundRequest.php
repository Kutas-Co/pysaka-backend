<?php

namespace App\Http\Requests;

use App\Models\Game;
use App\Models\Round;
use Illuminate\Foundation\Http\FormRequest;

class StoreRoundRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $game = Game::findOrFail($this->input('game_id'));
        return $this->user()->can('create', [Round::class, $game]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'game_id' => ['required', 'numeric', 'exists:games,id'],
            'text' => ['required', 'string', 'max:65000'],
            'excerpt' => ['required', 'string', 'max:1000'],
        ];
    }
}
