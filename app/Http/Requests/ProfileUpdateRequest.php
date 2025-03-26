<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        $user = $this->user(); // Lấy thông tin người dùng hiện tại
        $rules = [
            'gioithieu' => ['nullable', 'string'],
            'sodienthoai' => ['nullable', 'numeric', 'digits_between:10,11'],
        ];

        // Thêm quy tắc tùy theo vai trò
        if ($user->vaitro === 'admin') {
            $rules = array_merge($rules, [
                'hinhanh' => ['nullable', 'image', 'max:2048', 'mimes:jpeg,png,jpg,gif,svg,webp'],
                'tenquantri' => ['required', 'string', 'max:100'],
                'ngaysinh' => ['nullable', 'date'],
                'gioitinh' => ['nullable', 'string', Rule::in(['Nam', 'Nữ'])],
                'quequan' => ['nullable', 'string', 'max:255'],

            ]);
        } elseif ($user->vaitro === 'student') {
            $rules = array_merge($rules, [
                'tensinhvien' => ['required', 'string', 'max:100'],
                'hinhanh' => ['nullable', 'image', 'max:2048', 'mimes:jpeg,png,jpg,gif,svg,webp'],
                'khoa' => ['nullable', 'string', 'max:100'],
                'lop' => ['nullable', 'string', 'max:100'],
                'ngaysinh' => ['nullable', 'date'],
                'gioitinh' => ['nullable', 'string', Rule::in(['Nam', 'Nữ'])],
                'quequan' => ['nullable', 'string', 'max:255'],

            ]);
        } elseif ($user->vaitro === 'teacher') {
            $rules = array_merge($rules, [

                'hinhanh' => ['nullable', 'image', 'max:2048', 'mimes:jpeg,png,jpg,gif,svg,webp'],
                'tengiaovien' => ['required', 'string', 'max:50'],
                'khoa' => ['nullable', 'string', 'max:100'],
                'ngaysinh' => ['nullable', 'date'],
                'gioitinh' => ['nullable', 'string', Rule::in(['Nam', 'Nữ'])],
                'quequan' => ['nullable', 'string', 'max:255'],

            ]);
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'gioithieu.string' => 'Giới thiệu phải là chuỗi ký tự.',
            'sodienthoai.numeric' => 'Số điện thoại phải là số.',
            'sodienthoai.digits_between' => 'Số điện thoại phải có độ dài từ 10 đến 11 chữ số.',
            'hinhanh.image' => 'Định dạng ảnh không hợp lệ. Vui lòng tải lên ảnh dưới dạng JPG, PNG, GIF, SVG hoặc WEBP.',
            'hinhanh.mimes' => 'Định dạng ảnh không hợp lệ. Vui lòng tải lên ảnh dưới dạng JPG, PNG, GIF, SVG hoặc WEBP.',
            'hinhanh.max' => 'Kích thước ảnh không được vượt quá 2MB.',
            'tenquantri.required' => 'Vui lòng nhập tên quản trị viên.',
            'tenquantri.string' => 'Tên quản trị viên phải là chuỗi ký tự.',
            'tenquantri.max' => 'Tên quản trị viên không được vượt quá 100 ký tự.',
            'ngaysinh.date' => 'Ngày sinh phải là ngày tháng.',
            'gioitinh.string' => 'Giới tính phải là chuỗi ký tự.',
            'gioitinh.in' => 'Giới tính không hợp lệ.',
            'quequan.string' => 'Quê quán phải là chuỗi ký tự.',
            'quequan.max' => 'Quê quán không được vượt quá 255 ký tự.',
            'tensinhvien.required' => 'Vui lòng nhập tên sinh viên.',
            'tensinhvien.string' => 'Tên sinh viên phải là chuỗi ký tự.',
            'tensinhvien.max' => 'Tên sinh viên không được vượt quá 100 ký tự.',
            'khoa.string' => 'Khoa phải là chuỗi ký tự.',
            'khoa.max' => 'Khoa không được vượt quá 100 ký tự.',
            'lop.string' => 'Lớp phải là chuỗi ký tự.',
            'lop.max' => 'Lớp không được vượt quá 100 ký tự.',
            'tengiaovien.required' => 'Vui lòng nhập tên giáo viên.',
            'tengiaovien.string' => 'Tên giáo viên phải là chuỗi ký tự.',
            'tengiaovien.max' => 'Tên giáo viên không được vượt quá 50 ký tự.',

        ];
    }
}
