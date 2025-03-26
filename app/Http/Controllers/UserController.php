<?php

namespace App\Http\Controllers;

use App\Models\Authentication;
use App\Http\Requests\StoreAuthenticationRequest;
use App\Http\Requests\UpdateAuthenticationRequest;
use App\Models\User;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use App\Notifications\AccountLockedNotification;
use App\Notifications\AccountCreated;
use Illuminate\Support\Facades\Notification;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereIn('vaitro', ['student', 'teacher'])
            ->orderBy('updated_at', 'desc')
            ->paginate(10);
        $updated_at = User::orderBy('updated_at', 'desc')->first();

        return view('users.index', compact('users', 'updated_at'));
    }

    public function dashboard()
    {
        return view('dashboard.index');
    }
    public function search(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $users = User::whereIn('vaitro', ['student', 'teacher'])
                ->where(function ($query) use ($search) {
                    $query->where('tentaikhoan', 'like', "%$search%")
                        ->orWhere('email', 'like', "%$search%");
                })
                ->orderBy('updated_at', 'desc')
                ->paginate(10);
        } else {
            $users = User::whereIn('vaitro', ['student', 'teacher'])
                ->orderBy('updated_at', 'desc')
                ->paginate(10);
        }

        $updated_at = User::orderBy('updated_at', 'desc')->first();
        return view('users.index', compact('users', 'updated_at'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthenticationRequest $request)
    {
        //
        // $user = $request->only(['tentaikhoan', 'password', 'email', 'vaitro']);
        // $user['password'] = bcrypt($user['password']);
        // User::create($user);
        // return redirect()->route('users.index')->with('success', 'Thêm tài khoản thành công');


        try {
            // Lấy dữ liệu từ request
            $userData = $request->only(['tentaikhoan', 'password', 'email', 'vaitro']);
            $temporaryPassword = $userData['password']; // Lưu mật khẩu gốc để gửi email
            $userData['password'] = bcrypt($userData['password']);

            // Tạo tài khoản mới
            $user = User::create($userData);

            // Gửi thông báo qua email
            try {
                Notification::send($user, new AccountCreated($user, $temporaryPassword));
                return redirect()->route('users.index')
                    ->with('success', 'Thêm tài khoản thành công. Thông tin kích hoạt đã được gửi.');
            } catch (\Exception $e) {
                return redirect()->route('users.index')
                    ->with('warning', 'Tài khoản đã được tạo nhưng không thể gửi email kích hoạt. Vui lòng thử lại.');
            }
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Không thể tạo tài khoản. Vui lòng kiểm tra lại thông tin.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        return view('users.detail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Authentication $authentication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthenticationRequest $request, Authentication $authentication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'Xóa tài khoản thành công');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'Xóa tài khoản thất bại');
        }
    }
    public function lock(Request $request, $tentaikhoan)
    {
        $user = User::findOrFail($tentaikhoan);

        if ($request->isMethod('patch')) {
            // Bước 5 & 6: Xác nhận và nhập lý do
            $request->validate([
                'reason' => 'required|string|max:255',
            ]);

            // Bước 7 & 8: Khóa tài khoản và thông báo
            $user->trangthai = 'locked';
            $user->lydokhoa = $request->reason;
            $user->thoigiankhoa = now();
            $user->save();


            // Gửi thông báo qua email
            $user->notify(new AccountLockedNotification($request->reason));

            return redirect()->route('users.index')->with('success', 'Tài khoản đã bị khóa thành công.');
        }

        return view('users.lock', compact('user')); // Hiển thị form xác nhận khóa
    }
}
