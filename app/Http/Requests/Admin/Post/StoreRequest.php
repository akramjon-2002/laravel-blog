<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'integer|required|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'integer|nullable|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'these fields must be filled in',
            'title.string' => 'this field should be a string',
            'content.required' => 'these fields must be filled in',
            'content.string' => 'this field should be a string',
            'preview_image.required' => 'these fields must be filled in',
            'preview_image.file' => 'the file needs to be uploaded',
            'main_image.required' => 'these fields must be filled in',
            'main_image.file' => 'the file needs to be uploaded',


        ];
    }
}
