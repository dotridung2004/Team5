@extends('layouts.admin')
@section('title', 'Quản lý tin tức')
@section('main')
<div class="container-fluid ">
    <div class="row">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-2 mb-4">
                            <span>
                                <i class="bi bi-newspaper check-fill fs-6"></i>
                            </span>
                            <h3 class="mb-0">Thêm tin tức</h3>
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
                    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="tentintuc" class="form-label">Tên tin tức</label>
                            <input type="text" class="form-control" id="tentintuc" name="tentintuc" value="{{ old('tentintuc') }}">
                            @if ($errors->has('tentintuc'))
                            <span class="error-message text-danger small mt-1 fst-italic">*{{$errors->first('tentintuc')}}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="mota" class="form-label">Mô tả</label>
                            <input type="text" class="form-control" id="mota" name="mota" value="{{ old('mota') }}">
                            @if ($errors->has('mota'))
                            <span class="error-message text-danger small mt-1 fst-italic">*{{$errors->first('mota')}}</span>
                            @endif

                        </div>
                        <div class="mb-3">
                            <label for="noidung" class="form-label">Nội dung</label>
                            <textarea class="form-control" id="noidung" name="noidung" rows="4">{{ old('noidung')}} </textarea>
                            @if ($errors->has('noidung'))
                            <span class="error-message text-danger small mt-1 fst-italic">*{{$errors->first('noidung')}}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="path" class="form-label">Hình ảnh</label>
                            <input type="file" class="form-control" id="path" name="path" value="{{ old('path') }}">
                            @if ($errors->has('path'))
                            <span class="error-message text-danger small mt-1 fst-italic">*{{$errors->first('path')}}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="trangthai" class="form-label">Trạng thái</label>
                            <select class="form-control" name="trangthai" id="trangthai">
                                <option value="public">Công khai</option>
                                <option value="pending">Bản nháp</option>
                            </select>
                            @if ($errors->has('trangthai'))
                            <span class="error-message text-danger small mt-1 fst-italic">*{{$errors->first('trangthai')}}</span>
                            @endif

                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                            <a href="{{ route('news.index') }}" class="btn btn-secondary">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection