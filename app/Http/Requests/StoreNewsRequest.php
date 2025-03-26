<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
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
            'tentintuc' => 'required|string|max:255',
            'mota' => 'required|string',
            'noidung' => 'required|string',
            'path' => ['required', 'image', 'max:4096', 'mimes:jpeg,png,jpg,gif,svg,webp'],
            'trangthai' => 'required|in:pending,public',
        ];
    }

    public function messages(): array
    {
        return [
            'tentintuc.required' => 'Vui lòng nhập tiêu đề tin tức.',
            'mota.required' => 'Vui lòng nhập mô tả tin tức.',
            'noidung.required' => 'Vui lòng nhập nội dung tin tức.',
            'path.required' => 'Vui lòng chọn ảnh cho tin tức.',
            'path.image' => 'Định dạng ảnh không hợp lệ. Vui lòng tải lên ảnh dưới dạng JPG, PNG, GIF, SVG hoặc WEBP.',
            'path.mimes' => 'Định dạng ảnh không hợp lệ. Vui lòng tải lên ảnh dưới dạng JPG, PNG, GIF, SVG hoặc WEBP.',
            'path.max' => 'Kích thước ảnh không được vượt quá 4MB.',
            'trangthai.required' => 'Vui lòng chọn trạng thái tin tức.',
            'trangthai.in' => 'Trạng thái không hợp lệ.',
        ];
    }
}
