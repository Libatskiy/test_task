<?php

namespace App\Http\Requests;

class ReservationRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:255|unique_active',
            'number_people' => 'required|integer|max:10',
            'hookah_id' => 'required|exists:hookahs,id|is_hookah_free:time_from|is_hookah_pipe_match',
            'time_from' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'A name is required',
            'name.unique_active'  => 'We already have reservation for this name',
            'name.max'  => 'The name is too long',
            'hookah_id.exists'  => 'This hookah do not exist',
            'hookah_id.is_hookah_free' => 'This hookah don\'t free at that time',
            'hookah_id.is_hookah_pipe_match' => 'The number of pipes does not match the number of people',
        ];
    }
}
