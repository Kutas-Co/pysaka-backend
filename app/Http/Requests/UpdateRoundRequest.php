<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoundRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update', $this->route('round'));
    }

    /**
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge(['text' => $this->input('text') ?? ' ']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'text' => ['present', 'string', 'max:65000'],
            'excerpt' => ['present', 'nullable','string', 'max:1000'],
            'excerpt_length' => ['present', 'nullable', 'numeric', 'max:1000'],
        ];
    }
}
