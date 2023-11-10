<?php

namespace App\Http\Requests\comments;

use Illuminate\Foundation\Http\FormRequest;

class AddCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    public function rules(): array
    {
        return [
            'comment' => 'required'
        ];
    }



    public function messages(): array
    {
        return [
            'comment.required' => __('validator.comment_required')
        ];
    }
}
