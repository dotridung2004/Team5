<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAuthenticationRequest extends FormRequest
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
            'tentaikhoan' => ['required', 'string', 'max:50'],
            'password' => ['required', 'string', 'min:8', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'regex:/^[a-zA-Z0-9._%+-]+@e\.tlu\.edu\.vn$/'],
            'vaitro' => ['required', 'string', 'in:admin,student,teacher'],
        ];
    }
    public  function messages()
    {
        return [
            'tentaikhoan.required' => 'Tên tài khoản không được để trống',
            'tentaikhoan.string' => 'Tên tài khoản phải là chuỗi',
            'tentaikhoan.max' => 'Tên tài khoản không được quá 50 ký tự',
            'password.required' => 'Mật khẩu không được để trống',
            'password.string' => 'Mật khẩu phải là chuỗi',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
            'password.max' => 'Mật khẩu không được quá 50 ký tự',
            'email.required' => 'Email không được để trống',
            'email.string' => 'Email phải là chuỗi',
            'email.email' => 'Email không đúng định dạng',
            'email.max' => 'Email không được quá 255 ký tự',
            'email.regex' => 'Email phải có định dạng @e.tlu.edu.vn',
            'vaitro.required' => 'Vai trò không được để trống',
            'vaitro.string' => 'Vai trò phải là chuỗi',
            'vaitro.in' => 'Vai trò không hợp lệ',
        ];
    }
}
