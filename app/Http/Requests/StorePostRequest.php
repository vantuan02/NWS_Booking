<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image',
        ];
    }

    /**
     * Custom messages for validation errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề không được để trống.',
            'description.required' => 'Mô tả không được để trống.',
            'content.required' => 'Nội dung không được để trống.',
            'image.image' => 'Tệp tải lên phải là hình ảnh.',
        ];
    }
}
