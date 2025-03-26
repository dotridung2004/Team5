@extends('layouts.admin')
@section('title', 'Quản lý tài khoản')
@section('main')
<div class="container-fluid ">
    <div class="row">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-2 mb-4">
                            <span>
                                <i class="bi bi-person-plus fs-6"></i>
                            </span>
                            <h3 class="mb-0">Thêm tài khoản</h3>
                        </div>

                    </div>
                    @if (session('success'))
                    <div class="container">
                        <div class="alert alert-success  alert-dismissible" role="alert">
                            {{ session('success') }}
                            <button class="btn-close" aria-label="close" data-bs-dismiss="alert"></button>
                        </div>
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="container">
                        <div class="alert alert-danger  alert-dismissible" role="alert">
                            {{ session('error') }}
                            <button class="btn-close" aria-label="close" data-bs-dismiss="alert"></button>
                        </div>
                    </div>
                    @endif
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="tentaikhoan" class="form-label">Tên tài khoản</label>
                            <input type="text" class="form-control" id="tentaikhoan" name="tentaikhoan">
                            @if ($errors->has('tentaikhoan'))
                            <span class="error-message text-danger small mt-1 fst-italic">*{{$errors->first('tentaikhoan')}}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                            @if ($errors->has('email'))
                            <span class="error-message text-danger small mt-1 fst-italic">*{{$errors->first('email')}}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" name="password">
                            @if ($errors->has('password'))
                            <span class="error-message text-danger small mt-1 fst-italic">*{{$errors->first('password')}}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="vaitro" class="form-label">Vai trò</label>
                            <select class="form-select" id="vaitro" name="vaitro">
                                <option value="student">Sinh viên</option>
                                <option value="teacher">Giảng viên</option>

                            </select>
                            @if($errors->has('vaitro'))
                            <span class="error-message text-danger small mt-1 fst-italic">*{{$errors->first('vaitro')}}</span>
                            @endif
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection