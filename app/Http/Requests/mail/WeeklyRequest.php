<?php

namespace App\Http\Requests\mail;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule as ValidationRule;

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
            'email' => ['required', 'email', ValidationRule::unique('weekly', 'email')],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'E-poçt ünvanı mütləqdir.',
            'email.email' => 'Düzgün e-poçt ünvanı daxil edin.',
            'email.unique' => 'Bu e-poçt ünvanı artıq müraciət keçib.',
        ];
    }
}
