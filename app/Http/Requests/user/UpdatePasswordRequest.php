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
            'password.required' => 'Şifrə sahəsi mütləqdir.',
            'password.min' => 'Şifrə minimum 8 simvol olmalıdır.',
            'password.regex' => 'Şifrədə minimum bir böyük hərf və bir simvol olmalıdır.',
            'password__repeat.required' => 'Təsdiq şifrəsi sahəsi mütləqdir.',
            'password__repeat.same' => 'Təsdiq şifrəsi şifrə ilə uyğun gəlmir.',
        ];
    }
}
