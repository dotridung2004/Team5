@extends('layouts.admin')

@section('title', 'Quản lý tài liệu')
@section('main')
<div class="container-fluid">

    <div class="card shadow-sm p-4">
        <!-- Tiêu đề danh sách -->
        <div class="d-flex align-items-center">
            <h5 class="fw-bold mb-3">
                <i class="fas fa-list"></i> Danh sách tài liệu
            </h5>
            <a href="{{ route('documents.hiddenHistory') }}" class="btn btn-secondary ms-auto">📜 Lịch sử ẩn</a>
        </div>

        <!-- Bảng danh sách tài liệu -->
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Hình ảnh</th>
                    <th>Tên tài liệu</th>
                    <th>Người đăng</th>
                    <th>Ngày đăng</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documents as $document)
                @if (!$document->trashed())
                <tr>
                    <td>{{ $loop->iteration + ($documents->currentPage() - 1) * $documents->perPage() }}</td>
                    <td>
                        @if ($document->hinhanh && file_exists(public_path('storage/' . $document->hinhanh)))
                        <img src="{{ asset('storage/' . $document->hinhanh) }}" alt="Hình ảnh"
                            class="rounded" width="50">
                        @else
                        <img src="{{ asset('assets/images/icons/pdf_icon.jpg') }}" alt="PDF Icon"
                            class="rounded" width="50">
                        @endif
                    </td>
                    <td>{{ $document->tentailieu }}</td>
                    <td>{{ $document->nguoidang }}</td>
                    <td>{{ $document->ngaydang }}</td>
                    <td>
                        @if ($document->trangthaiduyet)
                        <span class="badge bg-success">Đã duyệt</span>
                        @else
                        <span class="badge bg-warning">Chờ duyệt</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex">
                            @if (!$document->trangthaiduyet)
                            <button type="button" class="btn btn-sm btn-success me-2"
                                data-bs-toggle="modal" data-bs-target="#confirmModal"
                                onclick="setAction('{{ route('documents.approve', $document->matailieu) }}', 'PATCH', 'Bạn có chắc chắn muốn duyệt tài liệu này?', 'Duyệt', 'btn-success')">
                                ✔ Duyệt
                            </button>
                            @endif
                            <button type="button" class="btn btn-sm btn-warning me-2" data-bs-toggle="modal"
                                data-bs-target="#reasonModal"
                                onclick="setAction('{{ route('documents.hide', $document->matailieu) }}', 'POST', 'Bạn có chắc chắn muốn ẩn tài liệu này?', 'Ẩn', 'btn-warning')">
                                🚫 Ẩn
                            </button>

                            <button type="button" class="btn btn-sm btn-danger me-2" data-bs-toggle="modal"
                                data-bs-target="#confirmModal"
                                onclick="setAction('{{ route('documents.destroy', $document->matailieu) }}', 'DELETE', 'Bạn có chắc chắn muốn xóa tài liệu này? Hành động này không thể hoàn tác!', 'Xóa', 'btn-danger')">
                                🗑 Xóa
                            </button>
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#viewDocumentModal"
                                onclick="setViewDetails({{ json_encode($document) }})">
                                📄 Xem chi tiết
                            </button>
                        </div>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $documents->links() }}
        </div>
    </div>
</div>

<!-- Modal Xem Chi Tiết -->
<div class="modal fade" id="viewDocumentModal" tabindex="-1" aria-labelledby="viewDocumentModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewDocumentModalLabel">Chi tiết tài liệu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label"><strong>Mã tài liệu:</strong></label>
                        <input type="text" class="form-control" id="docId" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Tên tài liệu:</strong></label>
                        <input type="text" class="form-control" id="docName" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Người đăng:</strong></label>
                        <input type="text" class="form-control" id="docUploader" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Ngày đăng:</strong></label>
                        <input type="text" class="form-control" id="docDate" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Đường dẫn:</strong></label>
                        <input type="text" class="form-control" id="docPath" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Nội dung:</strong></label>
                        <textarea class="form-control" id="docContent" rows="4" readonly></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Trạng thái:</strong></label>
                        <input type="text" class="form-control" id="docStatus" readonly>
                    </div>
                    <div class="mb-3 text-center">
                        <img id="docImage" src="" alt="Hình ảnh tài liệu" class="img-fluid rounded">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>


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

<!-- Modal Nhập Lý Do -->
<div class="modal fade" id="reasonModal" tabindex="-1" aria-labelledby="reasonModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="reasonForm" method="POST">
                @csrf
                <input type="hidden" name="_method" id="reasonMethodInput" value="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="reasonModalLabel">Nhập lý do ẩn tài liệu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="document_id" id="documentId">
                    <div class="mb-3">
                        <label for="lydoan" class="form-label">Lý do ẩn:</label>
                        <textarea class="form-control" id="lydoan" name="lydoan" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Xác nhận</button>
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
    function setAction(actionUrl, method, message, buttonText, buttonClass) {
        if (buttonText === 'Ẩn') {
            document.getElementById('reasonForm').action = actionUrl;
            document.getElementById('reasonMethodInput').value = method;
            // Gán matailieu vào documentId từ actionUrl
            const matailieu = actionUrl.split('/').pop(); // Lấy ID từ URL
            document.getElementById('documentId').value = matailieu;
            new bootstrap.Modal(document.getElementById('reasonModal')).show();
        } else {
            document.getElementById('confirmForm').action = actionUrl;
            document.getElementById('methodInput').value = method;
            document.getElementById('confirmMessage').textContent = message;
            const confirmButton = document.getElementById('confirmButton');
            confirmButton.textContent = buttonText;
            confirmButton.className = "btn " + buttonClass;
            new bootstrap.Modal(document.getElementById('confirmModal')).show();
        }
    }

    function setViewDetails(documentData) {
        document.getElementById('docId').value = documentData.matailieu;
        document.getElementById('docName').value = documentData.tentailieu;
        document.getElementById('docUploader').value = documentData.nguoidang;
        document.getElementById('docDate').value = documentData.ngaydang;
        document.getElementById('docPath').value = documentData.path;
        document.getElementById('docContent').value = documentData.noidung;
        document.getElementById('docStatus').value = documentData.trangthaiduyet ? "Đã duyệt" : "Chờ duyệt";

        let imageElement = document.getElementById('docImage');
        // if (documentData.hinhanh && {{ json_encode(file_exists(public_path('storage/' . $document->hinhanh))) }}) {
        //     imageElement.src = "{{ asset('storage/') }}" + documentData.hinhanh;
        // } else {
        //     imageElement.src = "{{ asset('assets/images/icons/pdf_icon.jpg') }}";
        // }
        imageElement.style.display = "block";
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