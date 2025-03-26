@extends('layouts.admin')
@section('title', 'Chi tiết Thắc mắc')

@section('main')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-4">Xem Thắc mắc</h3>
                    <div class="mb-3">
                        <label class="form-label">Mã thắc mắc</label>
                        <input type="text" class="form-control" value="{{ $feedback->mathacmac }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Người thắc mắc</label>
                        <input type="text" class="form-control" value="{{ $feedback->nguoigui ?? 'Không xác định' }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ngày thắc mắc</label>
                        <input type="text" class="form-control" value="{{ $feedback->ngaythacmac }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Trạng thái</label>
                        <input type="text" class="form-control" value="{{ $feedback->trangthai }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nội dung</label>
                        <textarea class="form-control" rows="4" readonly>{{ $feedback->noidung }}</textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('feedbacks.index') }}" class="btn btn-secondary">Đóng</a>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#replyModal">Phản hồi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Phản hồi -->
<div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="replyModalLabel">Phản hồi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="replyForm">
                <div class="modal-body">
                    <label class="form-label">Nội dung thắc mắc:</label>
                    <textarea class="form-control" rows="3" readonly>{{ $feedback->noidung }}</textarea>
                    <label class="form-label mt-2">Nhập phản hồi:</label>
                    <textarea class="form-control" name="reply_content" rows="3" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-danger">Gửi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Thông báo -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Thông báo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Gửi phản hồi thành công!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                    <a href="{{ route('feedbacks.index') }}" class="text-white">Đóng</a>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Thông báo lỗi -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="errorModalLabel">Lỗi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="errorMessage">
                Đã xảy ra lỗi, vui lòng thử lại!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript để xử lý gửi phản hồi bằng GET -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#replyForm").submit(function(event) {
            event.preventDefault();
            let replyContent = $("textarea[name='reply_content']").val();
            let url = "{{ route('feedbacks.storeReply', $feedback->mathacmac) }}?reply_content=" + encodeURIComponent(replyContent);

            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    $("#replyModal").modal("hide");
                    $("#successModal").modal("show");
                    $("input[value='{{ $feedback->trangthai }}']").val("Đã phản hồi");
                    $("textarea[name='reply_content']").val(""); // Xóa nội dung sau khi gửi
                },
                error: function(xhr) {
                    let errorMsg = xhr.responseJSON?.message || "Đã xảy ra lỗi, vui lòng thử lại!";
                    $("#errorMessage").text(errorMsg); // Hiển thị lỗi từ server
                    $("#errorModal").modal("show"); // Hiển thị modal lỗi
                }
            });
        });
    });
</script>

@endsection