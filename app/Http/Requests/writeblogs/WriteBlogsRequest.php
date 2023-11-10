<?php

namespace App\Http\Requests\writeblogs;

use Illuminate\Foundation\Http\FormRequest;

class WriteBlogsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'min:70', 'max:120'],
            'category_id' => ['required'],
            'desc' => ['required'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }



    public function messages(): array
    {
        return [
            'title.required' => 'Ad sahəsi mütləqdir.',
            'title.min' => 'Minimum 70 simvol',
            'title.max' => 'Maksimum 120 simvol',
            'category_id.required' => 'Kateqoriya seçimi mütləqdir.',
            'desc.required' => 'Əgər blog yazmaq fikrin yoxdursa, o zaman niyə burdasan?'
        ];
    }
}
