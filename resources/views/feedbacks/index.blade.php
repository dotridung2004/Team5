@extends('layouts.admin')
@section('title', 'Quản lý Phản hồi')

@section('main')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center gap-2 mb-4">
                        <span>
                            <i class="bi bi-chat-left-text fs-6"></i>
                        </span>
                        <h3 class="mb-0">Danh sách Phản hồi</h3>
                    </div>
                    <!-- <small>Cập nhật lần cuối </small> -->

                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        {{ session('success') }}
                        <button class="btn-close" aria-label="close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        {{ session('error') }}
                        <button class="btn-close" aria-label="close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    <div class="ibox-content">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">Mã phản hồi</th>
                                    <th class="text-nowrap">Người gửi</th>
                                    <th class="text-nowrap">Nội dung</th>
                                    <th class="text-nowrap">Ngày thắc mắc</th>
                                    <th class="text-nowrap">Ngày phản hồi</th>
                                    <th class="text-nowrap">Trạng thái</th>
                                    <th class="text-nowrap text-center">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($feedbacks->items() as $item)
                                <tr>
                                    <td>{{ $item->mathacmac }}</td>
                                    <td>{{ $item->nguoigui ?? 'Không xác định' }}</td>
                                    <td>{{ Str::limit($item->noidung, 50) }}</td>
                                    <td>{{ $item->ngaythacmac }}</td>
                                    <td>{{ $item->ngayphanhoi }}</td>
                                    <td>
                                        @if($item->trangthai == 'pending')
                                        <span class="badge bg-warning">Chờ Phản Hồi</span>
                                        @elseif($item->trangthai == 'resolved')
                                        <span class="badge bg-success">Đã Phản Hồi</span>
                                        @elseif($item->trangthai == 'processing')
                                        <span class="badge bg-secondary">Đang Xử Lý</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('feedbacks.show', $item->mathacmac) }}" class="btn btn-success" onclick="event.stopPropagation();">
                                            Xem
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {{ $feedbacks->links() }}
            </div>
        </div>
    </div>
</div>
@endsection