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
            'name.required' => __('validator.name'),
            'email.required' => __('validator.email'),
            'email.email' => __('validator.email_email'),
            'email.unique' => __('validator.email_unique'),
        ];
    }
}
