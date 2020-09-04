<?php

namespace App\Http\Requests;

class HookahBarRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|unique:hookah_bars,name|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'A name is required',
            'name.unique'  => 'This name is already taken',
            'name.max'  => 'The name is too long',
        ];
    }
}
