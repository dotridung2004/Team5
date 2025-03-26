<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResearchPaperRequest extends FormRequest
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
            'mabaiviet' => 'required|unique:research_papers,mabaiviet|max:50',
            'tenbaiviet' => 'required|max:255',
            'mota' => 'required|max:255',
            'noidung' => 'required',
            'path' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'hinhanh' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ngaydang' => 'nullable|date',
        ];
    }

    public function messages(): array
    {
        return [
            'mabaiviet.required' => 'Mã bài viết là bắt buộc.',
            'mabaiviet.unique' => 'Mã bài viết đã tồn tại.',
            'mabaiviet.max' => 'Mã bài viết không được vượt quá 50 ký tự.',
            'tenbaiviet.required' => 'Tên bài viết là bắt buộc.',
            'tenbaiviet.max' => 'Tên bài viết không được vượt quá 255 ký tự.',
            'mota.required' => 'Mô tả là bắt buộc.',
            'mota.max' => 'Mô tả không được vượt quá 255 ký tự.',
            'noidung.required' => 'Nội dung là bắt buộc.',
            'path.required' => 'Vui lòng tải lên tài liệu.',
            'hinhanh.required' => 'Vui lòng tải lên hình ảnh minh họa.',
            'path.mimes' => 'Tài liệu phải có định dạng pdf, doc hoặc docx.',
            'path.max' => 'Tài liệu không được vượt quá 2MB.',
            'hinhanh.image' => 'Hình ảnh phải là file ảnh.',
            'hinhanh.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg hoặc gif.',
            'hinhanh.max' => 'Hình ảnh không được vượt quá 2MB.',
            'ngaydang.date' => 'Ngày đăng phải là định dạng ngày hợp lệ.',
        ];
    }
}
