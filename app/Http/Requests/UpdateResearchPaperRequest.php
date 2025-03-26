<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateResearchPaperRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tenbaiviet' => 'required|max:255',
            'mota' => 'required|max:255',
            'nguoidang' => 'required|max:255',
            'ngaydang' => 'required|date',
            'noidung' => 'required',
            'hinhanh' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'tenbaiviet.required' => 'Tên bài viết là bắt buộc.',
            'mota.required' => 'Mô tả là bắt buộc.',
            'nguoidang.required' => 'Người đăng là bắt buộc.',
            'ngaydang.required' => 'Ngày đăng là bắt buộc.',
            'ngaydang.date' => 'Ngày đăng phải là định dạng ngày hợp lệ.',
            'noidung.required' => 'Nội dung là bắt buộc.',
            'hinhanh.required' => 'Vui lòng tải lên hình ảnh minh họa.',
            'hinhanh.image' => 'Hình ảnh phải là file ảnh.',
            'hinhanh.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg hoặc gif.',
            'hinhanh.max' => 'Hình ảnh không được vượt quá 2MB.',
        ];
    }
}
