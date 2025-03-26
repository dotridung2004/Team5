@extends('layouts.teacher')

@section('main')
@if (session('success'))
<div class="position-fixed top-0 start-50 translate-middle-x mt-3 z-3" style="width: 50%;">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

<div class="container-fluid">
    <div class="d-flex align-items-center">
        <i class="fas fa-edit fa-2x me-2"></i>
        <h2 class="mb-0">Chỉnh sửa bài viết</h2>
    </div>

    <div class="card shadow-sm p-4 mt-3">
        <form action="{{ route('researchpapers.update', $paper->mabaiviet) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="tenbaiviet" class="form-label fw-bold">Tên bài viết</label>
                <input type="text" class="form-control @error('tenbaiviet') is-invalid @enderror" id="tenbaiviet" name="tenbaiviet" value="{{ old('tenbaiviet', $paper->tenbaiviet) }}">
                @error('tenbaiviet')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="mota" class="form-label fw-bold">Mô tả</label>
                <input type="text" class="form-control @error('mota') is-invalid @enderror" id="mota" name="mota" value="{{ old('mota', $paper->mota) }}">
                @error('mota')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nguoidang" class="form-label fw-bold">Người đăng</label>
                <input type="text" class="form-control @error('nguoidang') is-invalid @enderror" id="nguoidang" name="nguoidang" value="{{ old('nguoidang', $paper->nguoidang) }}">
                @error('nguoidang')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ngaydang" class="form-label fw-bold">Ngày đăng</label>
                <input type="date" class="form-control @error('ngaydang') is-invalid @enderror" id="ngaydang" name="ngaydang" value="{{ old('ngaydang', $paper->ngaydang) }}">
                @error('ngaydang')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="noidung" class="form-label fw-bold">Nội dung</label>
                <textarea class="form-control @error('noidung') is-invalid @enderror" id="noidung" name="noidung" rows="4" required>{{ old('noidung', $paper->noidung) }}</textarea>
                @error('noidung')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hinhanh" class="form-label fw-bold">Hình ảnh</label>
                <input type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="hinhanh" name="hinhanh" accept="image/*" onchange="previewImage(event)">
                @error('hinhanh')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="mt-2">
                    @if ($paper->hinhanh && Storage::disk('public')->exists($paper->hinhanh))
                    <img id="imagePreview" src="{{ asset('storage/' . $paper->hinhanh) }}" alt="Hình ảnh bài viết" class="img-fluid rounded" style="max-width: 200px; margin-top: 10px;">
                    @else
                    <img id="imagePreview" src="{{ asset('assets/images/icons/pdf_icon.jpg') }}" alt="PDF Icon" class="img-fluid rounded" style="max-width: 200px; margin-top: 10px;">
                    @endif
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('researchpapers.index') }}" class="btn btn-secondary me-2">🔙 Hủy</a>
                <button type="submit" class="btn btn-primary">✅ Lưu thay đổi</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Hàm xem trước ảnh khi chọn file mới
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

    // Gán giá trị mặc định cho trường ngày đăng nếu không có giá trị
    const ngayDangInput = document.getElementById('ngaydang');
    if (!ngayDangInput.value) {
        ngayDangInput.value = formattedToday;
    }
</script>
@endsection