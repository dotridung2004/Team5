@extends('layouts.admin')
@section('title', 'Phản hồi Thắc mắc')

@section('main')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="mb-0">Phản hồi</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="{{ route('feedbacks.storeReply', $feedback->mathacmac) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nội dung thắc mắc:</label>
                            <textarea class="form-control" rows="3" readonly>{{ $feedback->noidung }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nhập phản hồi:</label>
                            <textarea class="form-control" name="phanhoi" rows="3" required></textarea>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-danger">Gửi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
