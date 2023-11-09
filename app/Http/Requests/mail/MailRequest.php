<?php

namespace App\Http\Requests\mail;

use Illuminate\Foundation\Http\FormRequest;

class MailRequest extends FormRequest
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
            'name' => ['required'],
            'surname' => ['required'],
            'email' => ['required'],
            'message' => ['required'],
        ];
    }



    public function messages(): array
    {
        return [
            'name.required' => 'İsim alanı zorunludur.',
            'surname.required' => 'Soyad alanı zorunludur.',
            'email.required' => 'E-posta alanı zorunludur.',
            'message.required' => 'Mesaj alanı zorunludur.',
        ];
    }
}
