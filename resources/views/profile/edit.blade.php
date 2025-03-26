@extends('layouts.app')
@section('main')
<div class="container-fluid ">
    <div class="row">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <section class="section profile">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="card">
                                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                            @if($user->vaitro == 'admin')
                                            <img src="{{ asset('storage/' . ($user->admin?->hinhanh ?? 'default-avatar.png')) }}" alt="Hồ sơ" class="rounded-circle">
                                            <h2>{{ $user->admin?->tenquantri ?? 'Không có tên' }}</h2>
                                            <h5>Quản trị viên</h5>
                                            @elseif($user->vaitro == 'student')
                                            <img src="{{ asset('storage/' . ($user->student?->hinhanh ?? 'default-avatar.png')) }}" alt="Hồ sơ" class="rounded-circle">
                                            <h2>{{ $user->student?->tensinhvien ?? 'Không có tên' }}</h2>
                                            <h5>Sinh viên</h5>
                                            @elseif($user->vaitro == 'teacher')
                                            <img src="{{ asset('storage/' . ($user->teacher?->hinhanh ?? 'default-avatar.png')) }}" alt="Hồ sơ" class="rounded-circle">
                                            <h2>{{ $user->teacher?->tengiaovien ?? 'Không có tên' }}</h2>
                                            <h5>Giảng viên</h5>
                                            @endif
                                            <div class="social-links mt-2">
                                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-8">
                                    <div class="card">
                                        <div class="card-body pt-3">
                                            <!-- Tab viền -->
                                            <ul class="nav nav-tabs nav-tabs-bordered">

                                                <li class="nav-item">
                                                    <a class="nav-link active" href="{{ route('profile.edit')}}">Tổng quan</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('profile.editprofile')}}">Chỉnh sửa hồ sơ</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('password.edit')}}">Đổi mật khẩu</a>
                                                </li>

                                            </ul>
                                            <div class="tab-content pt-2">
                                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                                    <!-- Form tổng quan -->
                                                    <h5 class="card-title mt-3"><strong>Giới thiệu</strong></h5>
                                                    <p class="small fst-italic mb-3">{{$user->gioithieu}}</p>

                                                    <h5 class="card-title mb-4"><strong>Chi tiết hồ sơ</strong></h5>
                                                    @if($user->vaitro == 'admin')
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Mã quản trị</strong></div>
                                                        <div class="col-lg-9 col-md-8">{{$user->admin->maquantri}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Họ và tên</strong></div>
                                                        <div class="col-lg-9 col-md-8">{{$user->admin->tenquantri}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Ngày sinh</strong></div>
                                                        <div class="col-lg-9 col-md-8">{{$user->admin->ngaysinh}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Giới tính</strong></div>
                                                        <div class="col-lg-9 col-md-8">{{$user->admin->gioitinh}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Địa chỉ</strong></div>
                                                        <div class="col-lg-9 col-md-8">{{$user->admin->quequan}}</div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Email</strong></div>
                                                        <div class="col-lg-9 col-md-8">{{$user->email}}</div>
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
                                                    @elseif($user->vaitro == 'student')
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Mã sinh viên</strong></div>
                                                        <div class="col-lg-9 col-md-8">{{$user->student->masinhvien}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Họ và tên</strong></div>
                                                        <div class="col-lg-9 col-md-8">{{$user->student->tensinhvien}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Ngày sinh</strong></div>
                                                        <div class="col-lg-9 col-md-8">{{$user->student->ngaysinh}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Giới tính</strong></div>
                                                        <div class="col-lg-9 col-md-8">{{$user->student->gioitinh}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Địa chỉ</strong></div>
                                                        <div class="col-lg-9 col-md-8">{{$user->student->quequan}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Khoa</strong></div>
                                                        <div class="col-lg-9 col-md-8">{{$user->student->khoa}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Lớp</strong></div>
                                                        <div class="col-lg-9 col-md-8">{{$user->student->lop}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Email</strong></div>
                                                        <div class="col-lg-9 col-md-8">{{$user->email}}</div>
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
                                                    @elseif($user->vaitro == 'teacher')
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Mã giảng viên</strong></div>
                                                        <div class="col-lg-9 col-md-8">{{$user->teacher->magiaovien}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Họ và tên</strong></div>
                                                        <div class="col-lg-9 col-md-8">{{$user->teacher->tengiaovien}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Ngày sinh</strong></div>
                                                        <div class="col-lg-9 col-md-8">{{$user->teacher->ngaysinh}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Giới tính</strong></div>
                                                        <div class="col-lg-9 col-md-8">{{$user->teacher->gioitinh}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Địa chỉ</strong></div>
                                                        <div class="col-lg-9 col-md-8">{{$user->teacher->quequan}}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Khoa</strong></div>
                                                        <div class="col-lg-9 col-md-8">{{$user->teacher->khoa}}</div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 mb-2 label"><strong>Email</strong></div>
                                                        <div class="col-lg-9 col-md-8">{{$user->email}}</div>
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
                                                    @endif
                                                    <div class="text-center">
                                                        <a href="{{ route('newsviews.index') }}" class="btn btn-secondary">Quay lại</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection