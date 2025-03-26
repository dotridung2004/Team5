@extends('layouts.newsviews')
@section('main')
<div class="document-search__header" style="display: flex; justify-content:space-between">
    <h2 class="display-6" style="white-space: nowrap;">Danh sách các tài liệu</h2>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="d-flex" action="{{ route('searchsearchdocument.search') }}" method="GET">
                    @method('GET')
                    <input class="form-control me-2" type="search" placeholder="Tìm kiếm tài liệu" aria-label="Search" name="search" required>
                    <button class="btn btn-outline-success" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="document--search">
    <div class="card-main" style="display:flex; flex-wrap:wrap">
        @foreach ($documents as $item)
        <div class="card" style="width: 30%; margin-right: 20px; margin-bottom:20px;">
            <!-- Card Header đóng vai trò là nút mở modal -->
            <div class="card-header" data-bs-toggle="modal" data-bs-target="#documentModal-{{ $item->id }}">
                <a class="title" style="display:flex; justify-content:space-between; text-decoration:none" href="javascript:void(0);">
                    <p>{{ $item->tentailieu }}</p>
                    <i>{{ $item->user ? $item->user->tentaikhoan : 'N/A' }}</i>
                </a>
            </div>
            <div class="card-body">
                <div class="content">
                    <p>{{ Str::limit($item->noidung, 100) }}</p> <!-- Giới hạn nội dung -->
                </div>
            </div>
            <div class="card-footer">
                <p>{{ $item->created_at }}</p>
            </div>
        </div>

        <!-- Modal riêng cho từng tài liệu -->
        <div class="modal fade" id="documentModal-{{ $item->id }}" tabindex="-1" aria-labelledby="modalTitle-{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle-{{ $item->id }}">{{ $item->tentailieu }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img class="mr-3 img-fluid rounded-circle m-3" width="64" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="News Image">
                        <p><strong>Người đăng:</strong> {{ $item->user ? $item->user->tentaikhoan : 'N/A' }}</p>
                        <p>{{ $item->user ? $item->user->gioithieu : 'N/A' }}</p>
                        <div class="document-image" style="margin-bottom: 20px">
                            <img src="{{ $item->hinhanh }}" alt="{{ $item->hinhanh }}" style="width:150px; height:auto">
                        </div>
                        <a href="{{ $item->path }}" download="{{ $item->path }}">Tải về ở đây</a>
                        <p><strong>Nội dung:</strong> {{ $item->noidung }}</p>
                        <p><strong>Ngày đăng tải:</strong> {{ $item->created_at }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="d-flex justify-content-center ">{{ $documents->links() }}</div>


@if(session('message'))
<div class="toast align-items-center show" id="toast" role="alert" aria-live="assertive" aria-atomic="true" style="position: fixed; top: 10px; right: 10px; z-index: 1050;">
    <div class="d-flex">
        <div class="toast-body">
            {{ session('message') }}
        </div>
        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
</div>
@endif


@endsection
<script>
    // Hiển thị toast nếu có
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