@extends('layouts.teacher')

@section('main')

<div class="container-fluid">
    <div class="d-flex align-items-center mb-3">
        <i class="fas fa-plus-circle fa-2x me-2"></i>
        <h2 class="mb-0">Thêm bài viết nghiên cứu</h2>
    </div>


    <div class="card shadow-sm p-4">
        <form id="paperForm" action="{{ route('researchpapers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Mã bài viết</label>
                    <input type="text" name="mabaiviet" class="form-control @error('mabaiviet') is-invalid @enderror"
                        value="{{ old('mabaiviet') }}" required>
                    @error('mabaiviet')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Tên bài viết</label>
                    <input type="text" name="tenbaiviet"
                        class="form-control @error('tenbaiviet') is-invalid @enderror" value="{{ old('tenbaiviet') }}"
                        required>
                    @error('tenbaiviet')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Mô tả</label>
                <input type="text" name="mota" class="form-control @error('mota') is-invalid @enderror"
                    value="{{ old('mota') }}" required>
                @error('mota')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Nội dung</label>
                <textarea name="noidung" class="form-control @error('noidung') is-invalid @enderror" rows="5" required>{{ old('noidung') }}</textarea>
                @error('noidung')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Tải lên tài liệu</label>
                <input type="file" name="path" class="form-control @error('path') is-invalid @enderror" required>
                @error('path')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Hình ảnh minh họa</label>
                <input type="file" name="hinhanh" class="form-control @error('hinhanh') is-invalid @enderror" accept="image/*" required onchange="previewImage(event)">
                <img id="imagePreview" src="#" alt="Preview" style="display: none; max-width: 200px; margin-top: 10px;">
                @error('hinhanh')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="ngay_dang">Ngày đăng</label>
                    <input type="date" name="ngaydang" id="ngay_dang" class="form-control">
                </div>

                {{-- <div class="col-md-6">
                        <label class="form-label fw-bold">Người đăng</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->tentaikhoan }}" readonly>
            </div> --}}

            <div class="col-md-6">
                <label class="form-label fw-bold">Người đăng</label>
                <input type="text" class="form-control" value="@php
                            $user = Auth::user();
                            $displayName = $user ? $user->tentaikhoan : 'Unknown';
                            if ($user) {
                                switch ($user->vaitro) {
                                    case 'teacher':
                                        $teacher = \App\Models\Teacher::where('tentaikhoan', $user->tentaikhoan)->first();
                                        $displayName = $teacher ? $teacher->tengiaovien : 'Unknown Teacher';
                                        break;
                                    case 'admin':
                                        $admin = \App\Models\Admin::where('tentaikhoan', $user->tentaikhoan)->first();
                                        $displayName = $admin ? $admin->tenquantri : 'Unknown Admin';
                                        break;
                                }
                            }
                            echo $displayName;
                        @endphp" readonly>
            </div>
    </div>

    <div class="d-flex justify-content-end">
        <a href="{{ route('researchpapers.index') }}" class="btn btn-secondary me-2">🔙 Quay lại</a>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmModal">
            ✅ Đăng bài
        </button>
    </div>
    </form>
</div>
</div>

<!-- Modal Xác Nhận Đăng Bài -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Xác nhận đăng bài</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Bạn có chắc chắn muốn đăng bài viết nghiên cứu này?</p>
                <p>Vui lòng kiểm tra lại thông tin trước khi đăng.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="submitForm()">✅ Đăng bài</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        let reader = new FileReader();
        reader.onload = function() {
            let output = document.getElementById('imagePreview');
            output.src = reader.result;
            output.style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    // Lấy ngày hôm nay
    const today = new Date();
    const formattedToday = today.toISOString().split('T')[0]; // Chuyển đổi sang định dạng yyyy-mm-dd

    // Gán giá trị mặc định cho các trường
    document.getElementById('ngay_dang').value = formattedToday;

    // Hàm submit form sau khi xác nhận
    function submitForm() {
        document.getElementById('paperForm').submit();
    }
</script>
@endsection