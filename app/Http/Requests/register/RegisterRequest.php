<?php

namespace App\Http\Requests\register;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => [
                'required',
                'min:8',
                'regex:/^(?=.*[A-Z])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]+$/',
            ],
            'password__repeat' => 'required|same:password',
        ];
    }



    public function messages(): array
    {
        return [
            'name.required' => __('validator.name'),
            'email.required' => __('validator.email'),
            'email.email' => __('validator.email_email'),
            'email.unique' => __('validator.email_unique'),
            'password.required' => __('validator.password'),
            'password.min' => __('validator.password_min'),
            'password.regex' => __('validator.password_regex'),
            'password__repeat.required' => __('validator.password__repeat'),
            'password__repeat.same' => __('validator.password__repeat_same'),
        ];
    }
}

