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
            'email.required' => 'E-poçt ünvanı mütləqdir.',
            'password.required' => 'Şifrə sahəsi mütləqdir.',
        ];
    }
}
