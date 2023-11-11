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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif'
        ];
    }



    public function messages(): array
    {
        return [
            'title.required' => __('validator.title_required'),
            'title.min' => __('validator.title_min'),
            'title.max' => __('validator.title_max'),
            'category_id.required' => __('validator.category_id_required'),
            'desc.required' => __('validator.desc_required'),

            'image.required' => __('validator.image_required'),
            'image.image' => __('validator.image_image'),
            'image.mimes' => __('validator.image_mimes'),
            'banner.required' => __('validator.image_required'),
            'banner.image' => __('validator.image_image'),
            'banner.mimes' => __('validator.image_mimes'),
        ];
    }
}
