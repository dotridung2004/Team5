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
                                <i class="bi bi-cart check-fill fs-6"></i>
                            </span>
                            <h3 class="mb-0">Chi tiết tài khoản</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="tentaikhoan" class="form-label">Tên tài khoản</label>
                                <input type="text" class="form-control" id="tentaikhoan" name="tentaikhoan" value="{{$user->tentaikhoan}}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="vaitro" class="form-label">Vai trò</label>
                                <input type="text" class="form-control" id="vaitro" name="vaitro" value="{{$user->vaitro}}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="created_at" class="form-label">Ngày tạo</label>
                                <input type="text" class="form-control" id="created_at" name="created_at" value="{{$user->created_at}}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="updated_at" class="form-label">Ngày cập nhật</label>
                                <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{$user->updated_at}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection