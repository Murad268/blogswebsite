<?php

namespace App\Http\Requests\login;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'email' => ['required'],
            'password' => [
                'required',
            ],
        ];
    }



    public function messages(): array
    {
        return [
            'email.required' => __('validator.login_email_required'),
            'password.required' => __('validator.login_password_required'),
        ];
    }
}
