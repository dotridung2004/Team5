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
                                            <img src="{{ asset('storage/' . $user->admin->hinhanh) }}" alt="Hồ sơ" class="rounded-circle">
                                            <h2>{{$user->admin->tenquantri}}</h2>
                                            <h5>Quản trị viên</h5>
                                            @elseif($user->vaitro == 'student')
                                            <img src="{{ asset('storage/' . $user->student->hinhanh) }}" alt="Hồ sơ" class="rounded-circle">
                                            <h2>{{$user->student->tensinhvien}}</h2>
                                            <h5>Sinh viên</h5>
                                            @elseif($user->vaitro == 'teacher')
                                            <img src="{{ asset('storage/' . $user->teacher->hinhanh) }}" alt="Hồ sơ" class="rounded-circle">
                                            <h2>{{$user->teacher->tengiaovien}}</h2>
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
                                                    <a class="nav-link " href="{{ route('profile.edit')}}">Tổng quan</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('profile.editprofile')}}">Chỉnh sửa hồ sơ</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link active" href="{{ route('password.edit')}}">Đổi mật khẩu</a>
                                                </li>

                                            </ul>
                                            <div class="tab-content pt-2">
                                                <div class="tab-pane fade  profile-overview" id="profile-overview">
                                                    <!-- Form tổng quan -->

                                                </div>

                                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                                    <!-- Form chỉnh sửa hồ sơ -->
                                                </div>
                                                <div class="tab-pane fade show active pt-3" id="profile-change-password">
                                                    <!-- Form đổi mật khẩu -->
                                                    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                                                        @csrf
                                                        @method('put')

                                                        <div class="row mb-3">
                                                            <label for="update_password_current_password" class="col-md-4 col-lg-3 col-form-label">Mật khẩu hiện tại</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <input name="current_password" type="password" class="form-control" id="update_password_current_password">
                                                                @if ($errors->updatePassword->has('current_password'))
                                                                <span class="error-message text-danger small mt-1 fst-italic">{{ $errors->updatePassword->first('current_password') }}</span>
                                                                @endif
                                                            </div>

                                                        </div>

                                                        <div class="row mb-3">
                                                            <label for="update_password_password" class="col-md-4 col-lg-3 col-form-label">Mật khẩu mới</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <input name="password" type="password" class="form-control" id="update_password_password" autocomplete="new-password">
                                                                @if ($errors->updatePassword->has('password'))
                                                                <span class="error-message text-danger small mt-1 fst-italic">{{ $errors->updatePassword->first('password') }}</span>
                                                                @endif
                                                            </div>

                                                        </div>

                                                        <div class="row mb-3">
                                                            <label for="update_password_password_confirmation" class="col-md-4 col-lg-3 col-form-label">Nhập lại mật khẩu</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <input name="password_confirmation" type="password" class="form-control" id="update_password_password_confirmation" autocomplete="new-password">
                                                                @if ($errors->updatePassword->has('password_confirmation'))
                                                                <span class="error-message text-danger small mt-1 fst-italic">{{ $errors->updatePassword->first('password_confirmation') }}</span>
                                                                @endif
                                                            </div>

                                                        </div>

                                                        @if (session('status') === 'password-updated')
                                                        <div class="row mb-3">
                                                            <div class="col-md-8 offset-md-4 col-lg-9 offset-lg-3">
                                                                <span class="text-success small fst-italic">Mật khẩu đã được cập nhật.</span>
                                                            </div>
                                                        </div>
                                                        @endif

                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                                                            <a href="{{ route('newsviews.index') }}" class="btn btn-secondary">Quay lại</a>
                                                        </div>
                                                    </form><!-- Kết thúc Form đổi mật khẩu -->
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