@extends('layouts.teacher')

@section('title', 'Quản lý bài viết nghiên cứu')
@section('main')
<div class="container-fluid">


    <div class="card shadow-sm p-4">
        <div class="d-flex align-items-center">
            <h5 class="fw-bold mb-3">
                <i class="fas fa-list"></i> Danh sách bài viết
            </h5>
            <a href="{{ route('researchpapers.create') }}" class="btn btn-secondary ms-auto">➕ Thêm bài viết</a>
        </div>

        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Hình ảnh</th>
                    <th>Tên bài viết</th>
                    <th>Người đăng</th>
                    <th>Ngày đăng</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($papers as $paper)
                <tr>
                    <td>{{ $loop->iteration + ($papers->currentPage() - 1) * $papers->perPage() }}</td>
                    <td>
                        @if ($paper->hinhanh && Storage::disk('public')->exists($paper->hinhanh))
                        <img src="{{ asset('storage/' . $paper->hinhanh) }}" alt="Hình ảnh" class="rounded" width="50" onerror="this.src='{{ asset('assets/images/icons/pdf_icon.jpg') }}'">
                        @else
                        <img src="{{ asset('assets/images/icons/pdf_icon.jpg') }}" alt="PDF Icon"
                            class="rounded" width="50">
                        @endif

                    </td>
                    <td>{{ $paper->tenbaiviet }}</td>
                    <td>{{ $paper->nguoidang }}</td>
                    <td>{{ $paper->ngaydang }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('researchpapers.edit', $paper->mabaiviet) }}"
                                class="btn btn-sm btn-warning me-2">✏ Sửa</a>
                            <button type="button" class="btn btn-sm btn-danger ms-2" data-bs-toggle="modal"
                                data-bs-target="#confirmModal"
                                onclick="setAction('{{ route('researchpapers.destroy', $paper->mabaiviet) }}', 'DELETE', 'Bạn có chắc chắn muốn xóa bài viết này?', 'Xóa', 'btn-danger')">
                                🗑 Xóa
                            </button>
                            <button type="button" class="btn btn-sm btn-info ms-2" data-bs-toggle="modal"
                                data-bs-target="#viewPaperModal"
                                onclick="setViewDetails({{ json_encode($paper) }})">
                                📄 Xem chi tiết
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $papers->links() }}
        </div>
    </div>
</div>

<div class="modal fade" id="viewPaperModal" tabindex="-1" aria-labelledby="viewPaperModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewPaperModalLabel">Chi tiết bài viết</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label"><strong>Mã bài viết:</strong></label>
                        <input type="text" class="form-control" id="paperId" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Tên bài viết:</strong></label>
                        <input type="text" class="form-control" id="paperName" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Người đăng:</strong></label>
                        <input type="text" class="form-control" id="paperUploader" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Ngày đăng:</strong></label>
                        <input type="text" class="form-control" id="paperDate" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Đường dẫn:</strong></label>
                        <input type="text" class="form-control" id="paperPath" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Nội dung:</strong></label>
                        <textarea class="form-control" id="paperContent" rows="4" readonly></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>


<!-- Thêm Modal Xác Nhận Hành Động-->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="confirmForm" method="POST">
                @csrf
                <input type="hidden" name="_method" id="methodInput" value="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Xác nhận</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="confirmMessage">
                    Bạn có chắc chắn muốn thực hiện hành động này?
                </div>
                <div class="modal-footer">
                    <button type="submit" id="confirmButton" class="btn btn-danger">Đồng ý</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if (session('success'))
<div class="toast align-items-center show" id="toast" role="alert" aria-live="assertive"
    aria-atomic="true" style="position: fixed; top: 10px; right: 10px; z-index: 1050;">
    <div class="d-flex">
        <div class="toast-body">
            {{ session('success') }}
        </div>
        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
            aria-label="Close"></button>
    </div>
</div>
@endif

<script>
    function setViewDetails(paperData) {
        document.getElementById('paperId').value = paperData.mabaiviet;
        document.getElementById('paperName').value = paperData.tenbaiviet;
        document.getElementById('paperUploader').value = paperData.nguoidang;
        document.getElementById('paperDate').value = paperData.ngaydang;
        document.getElementById('paperPath').value = paperData.path;
        document.getElementById('paperContent').value = paperData.noidung;
    }


    function setAction(actionUrl, method, message, buttonText, buttonClass) {
        document.getElementById('confirmForm').action = actionUrl;
        document.getElementById('methodInput').value = method;
        document.getElementById('confirmMessage').textContent = message;
        const confirmButton = document.getElementById('confirmButton');
        confirmButton.textContent = buttonText;
        confirmButton.className = "btn " + buttonClass;
    }

    window.onload = function() {
        var toast = document.getElementById('toast');
        if (toast) {
            toast.classList.add('show');
            setTimeout(function() {
                toast.classList.remove('show');
            }, 3000); // 3 giây để ẩn toast
        }
    }
</script>
@endsection