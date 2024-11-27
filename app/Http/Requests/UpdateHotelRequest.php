<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHotelRequest extends FormRequest
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
            'description' => 'nullable|string',
            'address' => 'required|string|max:500',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên khách sạn là bắt buộc.',
            'name.string' => 'Tên khách sạn phải là chuỗi ký tự.',
            'name.max' => 'Tên khách sạn không được vượt quá 255 ký tự.',
            'description.string' => 'Mô tả phải là chuỗi ký tự.',
            'address.required' => 'Địa chỉ là bắt buộc.',
            'address.string' => 'Địa chỉ phải là chuỗi ký tự.',
            'address.max' => 'Địa chỉ không được vượt quá 500 ký tự.',
        ];
    }
}
