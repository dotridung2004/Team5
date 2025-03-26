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
                                                    <a class="nav-link active" href="{{ route('profile.editprofile')}}">Chỉnh sửa hồ sơ</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('password.edit')}}">Đổi mật khẩu</a>
                                                </li>

                                            </ul>
                                            <div class="tab-content pt-2">
                                                <div class="tab-pane fade  profile-overview" id="profile-overview">
                                                    <!-- Form tổng quan -->
                                                </div>

                                                <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">
                                                    <!-- Form chỉnh sửa hồ sơ -->
                                                    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('patch')
                                                        <div class="row mb-3">
                                                            <label for="hinhanh" class="col-md-4 col-lg-3 col-form-label">Ảnh hồ sơ</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                @if($user->vaitro == 'admin')
                                                                <img src="{{ asset('storage/' . $user->admin->hinhanh) }}" alt="Hồ sơ" class="rounded-circle" style="width: 100px; height: 100px;">
                                                                @elseif($user->vaitro == 'student')
                                                                <img src="{{ asset('storage/' . $user->student->hinhanh) }}" alt="Hồ sơ" class="rounded-circle" style="width: 100px; height: 100px;">
                                                                @elseif($user->vaitro == 'teacher')
                                                                <img src="{{ asset('storage/' . $user->teacher->hinhanh) }}" alt="Hồ sơ" class="rounded-circle" style="width: 100px; height: 100px;">
                                                                @endif
                                                                <div class="pt-2">
                                                                    <input type="file" name="hinhanh" id="hinhanh" class="form-control d-none" accept="image/*">
                                                                    <a href="#" class="btn btn-primary btn-sm" title="Tải lên ảnh hồ sơ mới" onclick="document.getElementById('hinhanh').click(); return false;">
                                                                        <i class="bi bi-upload"></i>
                                                                    </a>
                                                                    <a href="#" class="btn btn-danger btn-sm" title="Xóa ảnh hồ sơ của tôi" onclick="document.getElementById('hinhanh').value = ''; return false;">
                                                                        <i class="bi bi-trash"></i>
                                                                    </a>
                                                                </div>
                                                                @if ($errors->has('hinhanh'))
                                                                <span class="error-message text-danger small mt-1 fst-italic">*{{ $errors->first('hinhanh') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        @if (session('status'))
                                                        <div class="container">
                                                            <div class="alert alert-success  alert-dismissible" role="alert">
                                                                {{ session('status') }}
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

                                                        @if($user->vaitro == 'admin')
                                                        <div class="row mb-3">
                                                            <label for="maquantri" class="col-md-4 col-lg-3 col-form-label">Mã quản trị</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <label for="maquantri" class="col-md-4 col-lg-3 col-form-label">{{$user->admin->maquantri}}</label>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <label for="email" class="col-md-4 col-form-label">{{$user->email}}</label>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <label for="tenquantri" class="col-md-4 col-lg-3 col-form-label">Họ và tên</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <input name="tenquantri" type="text" class="form-control" id="tenquantri" value="{{$user->admin->tenquantri}}">
                                                                @if ($errors->has('tenquantri'))
                                                                <span class="error-message text-danger small mt-1 fst-italic">*{{$errors->first('tenquantri')}}</span>
                                                                @endif
                                                            </div>

                                                        </div>

                                                        <div class="row mb-3">
                                                            <label for="gioithieu" class="col-md-4 col-lg-3 col-form-label">Giới thiệu</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <textarea name="gioithieu" class="form-control" id="gioithieu" style="height: 100px">{{$user->gioithieu}}</textarea>
                                                                @if ($errors->has('gioithieu'))
                                                                <span class="error-message text-danger small mt-1 fst-italic">*{{$errors->first('gioithieu')}}</span>
                                                                @endif
                                                            </div>

                                                        </div>

                                                        <div class="row mb-3">
                                                            <label for="ngaysinh" class="col-md-4 col-lg-3 col-form-label">Ngày sinh</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <input name="ngaysinh" type="date" class="form-control" id="ngaysinh" value="{{$user->admin->ngaysinh}}">
                                                                @if ($errors->has('ngaysinh'))
                                                                <span class="error-message text-danger small mt-1 fst-italic">*{{$errors->first('ngaysinh')}}</span>
                                                                @endif
                                                            </div>


                                                        </div>

                                                        <div class="row mb-3">
                                                            <label for="gioitinh" class="col-md-4 col-lg-3 col-form-label">Giới tính</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <select name="gioitinh" class="form-control" id="gioitinh">
                                                                    <option value="Nam" {{ $user->admin->gioitinh == 'Nam' ? 'selected' : '' }}>Nam</option>
                                                                    <option value="Nữ" {{ $user->admin->gioitinh == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                                                                </select>
                                                                @if ($errors->has('gioitinh'))
                                                                <span class="error-message text-danger small mt-1 fst-italic">*{{$errors->first('gioitinh')}}</span>
                                                                @endif
                                                            </div>


                                                        </div>

                                                        <div class="row mb-3">
                                                            <label for="quequan" class="col-md-4 col-lg-3 col-form-label">Quê quán</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <input name="quequan" type="text" class="form-control" id="quequan" value="{{$user->admin->quequan}}">
                                                                @if ($errors->has('quequan'))
                                                                <span class="error-message text-danger small mt-1 fst-italic">*{{$errors->first('quequan')}}</span>
                                                                @endif
                                                            </div>

                                                        </div>



                                                        <div class="row mb-3">
                                                            <label for="sodienthoai" class="col-md-4 col-lg-3 col-form-label">Số điện thoại</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <input name="sodienthoai" type="text" class="form-control" id="sodienthoai" value="{{$user->sodienthoai}}">
                                                                @if ($errors->has('sodienthoai'))
                                                                <span class="error-message text-danger small mt-1 fst-italic">*{{$errors->first('sodienthoai')}}</span>
                                                                @endif
                                                            </div>

                                                        </div>


                                                        @elseif($user->vaitro == 'teacher')
                                                        <div class="row mb-3">
                                                            <label for="magiaovien" class="col-md-4 col-lg-3 col-form-label">Mã giảng viên </label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <label for="magiaovien" class="col-md-4 col-lg-3 col-form-label">{{$user->teacher->magiaovien}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <label for="email" class="col-md-4 col-lg-3 col-form-label">{{$user->email}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="tengiaovien" class="col-md-4 col-lg-3 col-form-label">Họ và tên</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <input name="tengiaovien" type="text" class="form-control" id="tengiaovien" value="{{$user->teacher->tengiaovien}}">
                                                                @if($errors->has('tengiaovien'))
                                                                <span class="error-message text-danger small mt-1 fst-italic">*{{$errors->first('tengiaovien')}}</span>
                                                                @endif
                                                            </div>

                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="gioithieu" class="col-md-4 col-lg-3 col-form-label">Giới thiệu</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <textarea name="gioithieu" class="form-control" id="gioithieu" style="height: 100px">{{$user->gioithieu}}</textarea>
                                                                @if($errors->has('gioithieu'))
                                                                <span class="error-message text-danger small mt-1 fst-italic">*{{$errors->first('gioithieu')}}</span>
                                                                @endif
                                                            </div>

                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="ngaysinh" class="col-md-4 col-lg-3 col-form-label">Ngày sinh</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <input name="ngaysinh" type="date" class="form-control" id="ngaysinh" value="{{$user->teacher->ngaysinh}}">
                                                                @if($errors->has('ngaysinh'))
                                                                <span class="error-message text-danger small mt-1 fst-italic">*{{$errors->first('ngaysinh')}}</span>
                                                                @endif
                                                            </div>


                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="gioitinh" class="col-md-4 col-lg-3 col-form-label">Giới tính</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <select name="gioitinh" class="form-control" id="gioitinh">
                                                                    <option value='Nam' {{ $user->teacher->gioitinh == 'Nam' ? 'selected' : '' }}>Nam</option>
                                                                    <option value='Nữ' {{ $user->teacher->gioitinh == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                                                                </select>
                                                                @if($errors->has('gioitinh'))
                                                                <span class="error-message text-danger small mt-1 fst-italic">*{{$errors->first('gioitinh')}}</span>
                                                                @endif
                                                            </div>

                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="quequan" class="col-md-4 col-lg-3 col-form-label">Quê quán</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <input name="quequan" type="text" class="form-control" id="quequan" value="{{$user->teacher->quequan}}">
                                                                @if($errors->has('quequan'))
                                                                <span class="error-message text-danger small mt-1 fst-italic">*{{$errors->first('quequan')}}</span>
                                                                @endif
                                                            </div>

                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="khoa" class="col-md-4 col-lg-3 col-form-label">Khoa</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <input name="khoa" type="text" class="form-control" id="khoa" value="{{$user->teacher->khoa}}">
                                                                @if($errors->has('khoa'))
                                                                <span class="error-message text-danger small mt-1 fst-italic">*{{$errors->first('khoa')}}</span>
                                                                @endif
                                                            </div>


                                                        </div>

                                                        <div class="row mb-3">
                                                            <label for="sodienthoai" class="col-md-4 col-lg-3 col-form-label">Số điện thoại</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <input name="sodienthoai" type="text" class="form-control" id="sodienthoai" value="{{$user->sodienthoai}}">
                                                                @if($errors->has('sodienthoai'))
                                                                <span class="error-message text-danger small mt-1 fst-italic">*{{$errors->first('sodienthoai')}}</span>
                                                                @endif
                                                            </div>


                                                        </div>
                                                        @elseif($user->vaitro == 'student')
                                                        <div class="row mb-3">
                                                            <label for="masinhvien" class="col-md-4 col-lg-3 col-form-label">Mã sinh viên</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <label for="masinhvien" class="col-md-4 col-lg-3 col-form-label">{{$user->student->masinhvien}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <label for="email" class="col-md-4 col-lg-3 col-form-label">{{$user->email}}</label>
                                                            </div>

                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="tensinhvien" class="col-md-4 col-lg-3 col-form-label">Họ và tên</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <input name="tensinhvien" type="text" class="form-control" id="tensinhvien" value="{{$user->student->tensinhvien}}">
                                                                @if ($errors->has('tensinhvien'))
                                                                <span class="error-message text-danger small mt-1 fst-italic">*{{$errors->first('tensinhvien')}}</span>
                                                                @endif
                                                            </div>


                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="gioithieu" class="col-md-4 col-lg-3 col-form-label">Giới thiệu</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <textarea name="gioithieu" class="form-control" id="gioithieu" style="height: 100px">{{$user->gioithieu}}</textarea>
                                                                @if ($errors->has('gioithieu'))
                                                                <span class="error-message text-danger small mt-1 fst-italic">*{{$errors->first('gioithieu')}}</span>
                                                                @endif
                                                            </div>


                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="ngaysinh" class="col-md-4 col-lg-3 col-form-label">Ngày sinh</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <input name="ngaysinh" type="date" class="form-control" id="ngaysinh" value="{{$user->student->ngaysinh}}">
                                                                @if ($errors->has('ngaysinh'))
                                                                <span class="error-message text-danger small mt-1 fst-italic">*{{$errors->first('ngaysinh')}}</span>
                                                                @endif
                                                            </div>


                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="gioitinh" class="col-md-4 col-lg-3 col-form-label">Giới tính</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <select name="gioitinh" class="form-control" id="gioitinh">
                                                                    <option value='Nam' {{ $user->student->gioitinh == 'Nam' ? 'selected' : '' }}>Nam</option>
                                                                    <option value='Nữ' {{ $user->student->gioitinh == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                                                                </select>
                                                                @if ($errors->has('gioitinh'))
                                                                <span class="error-message text-danger small mt-1 fst-italic">*{{$errors->first('gioitinh')}}</span>
                                                                @endif
                                                            </div>

                                                        </div>

                                                        <div class="row mb-3">
                                                            <label for="quequan" class="col-md-4 col-lg-3 col-form-label">Quê quán</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <input name="quequan" type="text" class="form-control" id="quequan" value="{{$user->student->quequan}}">
                                                                @if ($errors->has('quequan'))
                                                                <span class="error-message text-danger small mt-1 fst-italic">*{{$errors->first('quequan')}}</span>
                                                                @endif
                                                            </div>

                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="khoa" class="col-md-4 col-lg-3 col-form-label">Khoa</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <input name="khoa" type="text" class="form-control" id="khoa" value="{{$user->student->khoa}}">
                                                                @if ($errors->has('khoa'))
                                                                <span class="error-message text-danger small mt-1 fst-italic">*{{$errors->first('khoa')}}</span>
                                                                @endif
                                                            </div>

                                                        </div>

                                                        <div class="row mb-3">
                                                            <label for="lop" class="col-md-4 col-lg-3 col-form-label">Lớp</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <input name="lop" type="text" class="form-control" id="lop" value="{{$user->student->lop}}">
                                                                @if ($errors->has('lop'))
                                                                <span class="error-message text-danger small mt-1 fst-italic">*{{$errors->first('lop')}}</span>
                                                                @endif
                                                            </div>

                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="sodienthoai" class="col-md-4 col-lg-3 col-form-label">Số điện thoại</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                <input name="sodienthoai" type="text" class="form-control" id="sodienthoai" value="{{$user->sodienthoai}}">
                                                                @if ($errors->has('sodienthoai'))
                                                                <span class="error-message text-danger small mt-1 fst-italic">*{{$errors->first('sodienthoai')}}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        @endif

                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                                            <a href="{{ route('newsviews.index') }}" class="btn btn-secondary">Quay lại</a>
                                                        </div>
                                                    </form>
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