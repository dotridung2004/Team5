@extends('layouts.admin')
@section('main')
@if (session('success'))
<div class="position-fixed top-0 start-50 translate-middle-x mt-3 z-3" style="width: 50%;">
    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        <span>{{ session('success') }}</span>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

<div class="container-fluid">
    <div class="d-flex align-items-center">
        <i class="fas fa-book fa-2x me-2"></i>
        <h2 class="mb-0">Lịch sử tài liệu ẩn</h2>
    </div>


    <div class="card shadow-sm p-4">
        <div class="d-flex align-items-center">
            <h5 class="fw-bold mb-3">
                <i class="fas fa-list"></i> Danh sách tài liệu ẩn
            </h5>
            <a href="{{ route('documents.index') }}" class="btn btn-secondary ms-auto">📋 Quay lại danh sách</a>
        </div>

        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Hình ảnh</th>
                    <th>Tên tài liệu</th>
                    <th>Người đăng</th>
                    <th>Ngày đăng</th>
                    <th>Ngày ẩn</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documents as $document)
                <tr>
                    <td>{{ $loop->iteration + ($documents->currentPage() - 1) * $documents->perPage() }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $document->hinhanh) }}" alt="Hình ảnh" class="rounded"
                            width="50">
                    </td>
                    <td>{{ $document->tentailieu }}</td>
                    <td>{{ $document->nguoidang }}</td>
                    <td>{{ $document->ngaydang }}</td>
                    <td>{{ $document->deleted_at }}</td>
                    <td>
                        <div class="d-flex">
                            <button type="button" class="btn btn-sm btn-primary me-2" data-bs-toggle="modal"
                                data-bs-target="#confirmModal"
                                onclick="setAction('{{ route('documents.restore', $document->matailieu) }}', 'POST', 'Bạn có chắc chắn muốn khôi phục tài liệu này?', 'Khôi phục', 'btn-primary')">
                                🔄 Khôi phục
                            </button>
                            <button type="button" class="btn btn-sm btn-danger me-2" data-bs-toggle="modal"
                                data-bs-target="#confirmModal"
                                onclick="setAction('{{ route('documents.destroy', $document->matailieu) }}', 'DELETE', 'Bạn có chắc chắn muốn xóa vĩnh viễn tài liệu này?', 'Xóa vĩnh viễn', 'btn-danger')">
                                🗑 Xóa vĩnh viễn
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $documents->links() }}
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

<!-- Modal Xác Nhận Hành Động -->
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
                    <button type="submit" id="confirmButton" class="btn btn-primary">Đồng ý</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
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