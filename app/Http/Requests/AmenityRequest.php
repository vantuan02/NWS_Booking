<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AmenityRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:1000',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên tiện ích.',
            'name.string' => 'Tên tiện ích phải là chuỗi ký tự.',
            'name.max' => 'Tên tiện ích không được vượt quá 255 ký tự.',
            'image.image' => 'Tệp được tải lên phải là hình ảnh.',
            'image.max' => 'Kích thước ảnh không được vượt quá 2MB.',
            'price.required' => 'Vui lòng nhập giá tiện ích.',
            'price.numeric' => 'Giá tiện ích phải là một số.',
            'price.min' => 'Giá tiện ích không được nhỏ hơn 0.',
            'description.string' => 'Mô tả phải là chuỗi ký tự.',
            'description.max' => 'Mô tả không được vượt quá 1000 ký tự.',
        ];
    }
}
