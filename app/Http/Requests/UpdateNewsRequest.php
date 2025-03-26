<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
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
            'path' => ['required', 'image', 'max:10240', 'mimes:jpeg,png,jpg,gif,svg,webp'],

        ];
    }

    public function messages()
    {
        return [
            'tentintuc.required' => 'Vui lòng nhập tiêu đề bài viết.',
            'mota.required' => 'Vui lòng nhập mô tả bài viết.',
            'noidung.required' => 'Vui lòng nhập nội dung bài viết.',
            'path.image' => 'Định dạng ảnh không hợp lệ. Vui lòng tải lên ảnh dưới dạng JPG, PNG, GIF, SVG hoặc WEBP.',
            'path.mimes' => 'Định dạng ảnh không hợp lệ. Vui lòng tải lên ảnh dưới dạng JPG, PNG, GIF, SVG hoặc WEBP.',
            'path.max' => 'Kích thước ảnh không được vượt quá 10MB.',
            'path.required' => 'Vui lòng chọn ảnh cho bài viết.',
        ];
    }
}
