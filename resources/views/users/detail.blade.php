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
                                <i class="bi bi-person-lines-fill fs-6"></i>
                            </span>
                            <h3 class="mb-0">Chi tiết tài khoản</h3>
                        </div>
                    </div>


                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <!-- Form tổng quan -->
                            <div class="row">
                                <div class="col-lg-3 col-md-4 mb-2 label"><strong>Tên tài khoản</strong></div>
                                <div class="col-lg-9 col-md-8">{{$user->tentaikhoan}}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 mb-2 label"><strong>Email</strong></div>
                                <div class="col-lg-9 col-md-8">{{$user->email}}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 mb-2 label"><strong>Giới thiệu</strong></div>
                                <div class="col-lg-9 col-md-8">{{$user->gioithieu}}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 mb-2 label"><strong>Vai trò</strong></div>
                                <div class="col-lg-9 col-md-8">
                                    @if($user->vaitro == 'teacher')
                                    Giảng viên
                                    @elseif($user->vaitro == 'student')
                                    Sinh viên
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 mb-2 label"><strong>Số điện thoại</strong></div>
                                <div class="col-lg-9 col-md-8">{{$user->sodienthoai}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 mb-2 label"><strong>Trạng thái</strong></div>
                                <div class="col-lg-9 col-md-8">
                                    @if($user->trangthai == 'active')
                                    <strong class="text">Hoạt động</strong>
                                    @else
                                    <span class="badge bg-danger">Khóa</span>
                                    @endif
                                </div>
                            </div>
                            <div class="d-flex justify-content-end gap-2"> <a href="{{ route('users.index') }}" class="btn btn-secondary">Quay lại</a></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection