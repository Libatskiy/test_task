<?php

namespace App\Http\Requests;

class HookahRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|unique:hookahs,name|max:255',
            'pipe' => 'required|integer|between:1,5',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'A name is required',
            'name.unique'  => 'This name is already taken',
            'name.max'  => 'The name is too long',
            'pipe.required' => 'A pipe is required',
            'pipe.integer'  => 'Pipe must be integer',
            'pipe.between'  => 'Pipe must be 1 to 5',
        ];
    }
}
