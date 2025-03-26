<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function editprofile(Request $request): View
    {
        return view('profile.update-profile-information-form', [
            'user' => $request->user(),
        ]);
    }
    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        $user = $request->user();
        $validated = $request->validated();


        // Xử lý upload ảnh
        if ($request->hasFile('hinhanh')) {
            // Xóa ảnh cũ nếu tồn tại
            if ($user->vaitro == 'admin' && $user->admin->hinhanh) {
                Storage::disk('public')->delete($user->admin->hinhanh);
            } elseif ($user->vaitro == 'teacher' && $user->teacher->hinhanh) {
                Storage::disk('public')->delete($user->teacher->hinhanh);
            } elseif ($user->vaitro == 'student' && $user->student->hinhanh) {
                Storage::disk('public')->delete($user->student->hinhanh);
            }

            // Lưu ảnh mới
            $path = $request->file('hinhanh')->store('profile_images', 'public');

            // Cập nhật đường dẫn ảnh vào bảng tương ứng
            if ($user->vaitro == 'admin') {
                $user->admin->update(['hinhanh' => $path]);
            } elseif ($user->vaitro == 'teacher') {
                $user->teacher->update(['hinhanh' => $path]);
            } elseif ($user->vaitro == 'student') {
                $user->student->update(['hinhanh' => $path]);
            }
        }


        // Cập nhật thông tin người dùng
        if ($user->vaitro == 'admin') {
            $user->admin->update([
                'tenquantri' => $validated['tenquantri'] ?? $user->admin->tenquantri,
                'ngaysinh' => $validated['ngaysinh'] ?? $user->admin->ngaysinh,
                'gioitinh' => $validated['gioitinh'] ?? $user->admin->gioitinh,
                'quequan' => $validated['quequan'] ?? $user->admin->quequan,
            ]);
        } elseif ($user->vaitro == 'teacher') {
            $user->teacher->update([
                'tengiaovien' => $validated['tengiaovien'] ?? $user->teacher->tengiaovien,
                'ngaysinh' => $validated['ngaysinh'] ?? $user->teacher->ngaysinh,
                'gioitinh' => $validated['gioitinh'] ?? $user->teacher->gioitinh,
                'quequan' => $validated['quequan'] ?? $user->teacher->quequan,
                'khoa' => $validated['khoa'] ?? $user->teacher->khoa,
            ]);
        } elseif ($user->vaitro == 'student') {
            $user->student->update([
                'tensinhvien' => $validated['tensinhvien'] ?? $user->student->tensinhvien,
                'ngaysinh' => $validated['ngaysinh'] ?? $user->student->ngaysinh,
                'gioitinh' => $validated['gioitinh'] ?? $user->student->gioitinh,
                'quequan' => $validated['quequan'] ?? $user->student->quequan,
                'khoa' => $validated['khoa'] ?? $user->student->khoa,
                'lop' => $validated['lop'] ?? $user->student->lop,
            ]);
        }


        // Cập nhật thông tin chung của user
        $user->update([
            'gioithieu' => ($validated['gioithieu'] ?? $user->gioithieu),
            'sodienthoai' => ($validated['sodienthoai'] ?? $user->sodienthoai),
        ]);


        if ($user->vaitro == 'admin') {
            $user->admin->save();
        } elseif ($user->vaitro == 'teacher') {
            $user->teacher->save();
        } elseif ($user->vaitro == 'student') {
            $user->student->save();
        }

        $user->save();
        // Trả về trang hiện tại với thông báo thành công
        return redirect()->back()->with('status', 'Cập nhật thông tin thành công!');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
