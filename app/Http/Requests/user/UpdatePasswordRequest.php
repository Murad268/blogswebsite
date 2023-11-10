<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'password' => [
                'required',
                'min:8',
                'regex:/^(?=.*[A-Z])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]+$/',
            ],
            'reply_password' => 'required|same:password',
        ];
    }


    public function messages(): array
    {
        return [
            'password.required' => __('validator.password'),
            'password.min' => __('validator.password_min'),
            'password.regex' => __('validator.password_regex'),
            'password__repeat.required' => __('validator.password__repeat'),
            'password__repeat.same' => __('validator.password__repeat_same'),
        ];
    }
}
