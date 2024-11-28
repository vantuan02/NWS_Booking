<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomRequest extends FormRequest
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
            'hotel_id' => 'required',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'customer_limit' => 'required|integer|min:1',
            'status' => 'required|in:available,occupied,maintenance',
            'detail' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'hotel_id.required' => 'Hotel ID là bắt buộc.',
            'name.required' => 'Tên phòng là bắt buộc.',
            'name.string' => 'Tên phòng phải là một chuỗi ký tự.',
            'name.max' => 'Tên phòng không được vượt quá 255 ký tự.',
            'price.required' => 'Giá phòng là bắt buộc.',
            'price.numeric' => 'Giá phòng phải là một số.',
            'price.min' => 'Giá phòng phải lớn hơn hoặc bằng 0.',
            'customer_limit.required' => 'Giới hạn khách là bắt buộc.',
            'customer_limit.integer' => 'Giới hạn khách phải là một số nguyên.',
            'customer_limit.min' => 'Giới hạn khách phải lớn hơn hoặc bằng 1.',
            'status.required' => 'Trạng thái phòng là bắt buộc.',
            'status.in' => 'Trạng thái phòng không hợp lệ.',
        ];
    }
}
