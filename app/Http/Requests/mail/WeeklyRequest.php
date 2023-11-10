<?php

namespace App\Http\Requests\mail;

use Illuminate\Foundation\Http\FormRequest;

class WeeklyRequest extends FormRequest
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
            'email' => ['required', 'email'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => __('validator.email'),
            'email.email' => __('validator.email_email'),
        ];
    }
}
