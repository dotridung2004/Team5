@extends('layouts.admin')
@section('title', 'Xem chi tiết tin tức')

@section('main')
<div class="container-fluid ">
    <div class="row">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-2 mb-4">
                            <h3 class="mb-0">{{$news->tentintuc}}</h3>
                        </div>
                        <small>Trạng thái: <strong>@if($news->trangthai=='public') Công khai
                                @elseif($news->trangthai=='pending') Chờ duyệt
                                @else Từ chối
                                @endif</strong></small>
                        <!-- Card Body -->
                        <div class="card-body p-4">
                            <!-- Thông báo -->
                            @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif

                            @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif

                            <!-- Nội dung chi tiết -->
                            <div class="row">
                                <!-- Hình ảnh -->
                                <div class="col-md-6 mb-4">
                                    <div class="card h-100">
                                        <img src="{{ asset('storage/' . $news->path) }}"
                                            class="card-img-top img-fluid"
                                            alt="{{$news->tentintuc}}"
                                            style="max-height: 300px; object-fit: cover;">
                                    </div>
                                </div>

                                <!-- Thông tin mô tả -->
                                <div class="col-md-6 mb-4">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h5 class="card-title text-primary">Mô tả ngắn</h5>
                                            <p class="card-text text-muted">{{$news->mota}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Nội dung chính -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">Nội dung chi tiết</h5>
                                    <div class="content">
                                        {!! $news->noidung !!}
                                    </div>
                                </div>
                            </div>

                            <!-- Nút điều hướng -->
                            <div class="d-flex justify-content-end gap-2">
                                @if ($news->trangthai=='public')
                                <a href="{{ route('news.edit', $news->matintuc) }}"
                                    class="btn btn-primary">
                                    Chỉnh sửa
                                </a>
                                @endif
                                @if ($news->trangthai=='pending'||$news->trangthai=='rejected')
                                <form action="{{ route('news.approve', $news->matintuc) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-primary">
                                        Duyệt
                                    </button>
                                </form>
                                @endif
                                @if ($news->trangthai=='pending')
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#reject-modal-{{ $news->matintuc }}">
                                    Từ chối
                                </button>
                                @endif
                                <a href="{{ route('news.index') }}"
                                    class="btn btn-secondary">
                                    Quay lại
                                </a>
                            </div>
                            <!-- Modal Khóa -->
                            @if($news->trangthai == 'pending')
                            <div class="modal fade" id="reject-modal-{{ $news->matintuc }}" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="rejectModalLabel">Từ chối tin tức</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('news.reject', $news->matintuc) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <div class="modal-body">
                                                <p>Bạn có chắc chắn muốn từ chối bài viết của {{ $news->nguoidang }} không?</p>
                                                <div class="mb-3">
                                                    <label for="reason" class="form-label">Lý do từ chối (bắt buộc):</label>
                                                    <textarea class="form-control" name="reason" id="reason"></textarea>
                                                    @if($errors->has('reason'))
                                                    <div class="alert alert-danger mt-1">{{ $errors->first('reason') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                <button type="submit" class="btn btn-danger">Từ chối</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection