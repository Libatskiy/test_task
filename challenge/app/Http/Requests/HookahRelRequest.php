<?php

namespace App\Http\Requests;

class HookahRelRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'hookah_id' => 'required|exists:hookahs,id|unique:hookah_relations,hookah_id',
            'hookah_bar_id' => 'required|exists:hookah_bars,id',
        ];
    }

    public function messages(): array
    {
        return [
            'hookah_id.exists' => 'This hookah do not exist',
            'hookah_bar_id.exists' => 'This hookah_bar do not exist',
            'hookah_id.required' => 'A hookah_id is required',
            'hookah_bar_id.required' => 'A hookah_bar_id is required',
            'hookah_id.unique' => 'This hookah is already added.You must first delete it from bar',
        ];
    }
}
