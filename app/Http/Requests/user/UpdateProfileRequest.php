<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore(auth()->user()->id)],

        ];
    }



    public function messages(): array
    {
        return [
            'name.required' => 'Ad sahəsi tələb olunur.',
            'email.required' => 'Email sahəsi tələb olunur.',
            'email.email' => 'Düzgün email ünvanı daxil edin.',
            'email.unique' => 'Bu email artıq istifadə olunur, başqa bir email seçin.',
        ];
    }
}
