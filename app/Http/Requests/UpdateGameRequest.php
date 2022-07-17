<?php

namespace App\Http\Requests;

use App\Models\Game;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateGameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update', $this->route('game'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'min:2'],
            'status' => ['required', 'string', Rule::in([Game::STATUS_CREATED, ])],
            'rounds_max' => ['required', 'nullable', 'numeric', 'max:255', 'min:2'],
            'max_lock_minutes' => ['required', 'numeric', 'max:10080', 'min:5'],
        ];
    }
}
