@extends('layouts.teacher')

@section('title', 'Quản lý tài liệu')


@section('main')
<div class="container-fluid ">
    <div class="row">
        <div class="teacher-header">
            <p>Danh sách các bài viết của bạn</p>
            @foreach ($documents as $item)

            @endforeach
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addModal-{{ $item->matailieu }}">
                Thêm
                <i class="bi bi-plus-square-fill"></i>
            </button>

            <div class="modal fade" id="addModal-{{ $item->matailieu }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addModalLabel-{{ $item->matailieu }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addModalLabel">Thêm tài liệu mới</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('documentteacher.store') }}" class="form" method="POST" enctype="multipart/form-data">
                                @method('POST')
                                @csrf
                                <div class="mb-3">
                                    <label for="matailieu" class="form-label">Mã tài liệu</label>
                                    <input type="text" class="form-control" name="matailieu" id="matailieu">
                                </div>
                                <div class="mb-3">
                                    <label for="tentailieu" class="form-label">Tên tài liệu</label>
                                    <input type="text" class="form-control" name="tentailieu" id="tentailieu">
                                </div>
                                <div class="mb-3">
                                    <label for="hinhanh" class="form-label">Hình ảnh</label>
                                    <input type="file"
                                        id="hinhanh"
                                        name="hinhanh"
                                        accept="image/jpeg, image/png, image/gif"
                                        class="form-control"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="path" class="form-label">Tài liệu đính kèm</label>
                                    <input type="file"
                                        id="path"
                                        name="path"
                                        accept=".pdf,.doc,.docx"
                                        class="form-control"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="noidung" class="form-label">Nội dung</label>
                                    <textarea name="noidung" id="noidung" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="btn-footer" style="display: flex;justify-content: flex-end;">
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" style="margin-right: 20px">Hủy</button>
                                    <button type="submit" class="btn btn-success">Thêm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="teacher-main">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Mã tài liệu</th>
                        <th scope="col">Tên tài liệu </th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Tài liệu</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documents as $item)
                    <tr>
                        <td>{{ $item->matailieu }}</td>
                        <td>{{ $item->tentailieu }}</td>
                        <td><img style="width:100px; height:auto" src="{{$item->hinhanh}}"></td>
                        <td>
                            <a href="{{$item->path}}" download>
                                <img style="width: 50px" src="https://www.w3schools.com/images/myw3schoolsimage.jpg"></img>
                            </a>
                        </td>
                        <td style="white-space: nowrap; overflow: hidden;text-overflow: ellipsis; max-width: 150px">{{ $item->noidung }}</td>
                        <td>
                            @if ($item->trangthaiduyet == 0)
                            <span class="ant-tag-like ant-tag-like-green">Đang chờ</span>
                            @elseif($item->trangthaiduyet == 1)
                            <span class="ant-tag-like ant-tag-like-red">Đã duyệt</span>

                            @endif
                        </td>
                        <td>
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#detailModal-{{$item->matailieu}}">Xem<i class="bi bi-balloon-heart"></i>
                            </button>
                            <div class="modal fade" id="detailModal-{{$item->matailieu}}" tabindex="-1" aria-labelledby="detailModalLabel-{{$item->matailieu}}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detailModalLabel-{{$item->matailieu}}">Chi tiết tài liệu</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('documentteacher.update', $item->matailieu) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p><strong>Trạng thái: </strong> @if ($item->trangthaiduyet == 0)
                                                            <span class="ant-tag-like ant-tag-like-green">Đang chờ</span>
                                                            @elseif($item->trangthaiduyet == 1)
                                                            <span class="ant-tag-like ant-tag-like-red">Đã duyệt</span>
                                                            @endif
                                                        </p>
                                                        <p><strong>Mã tài liệu:</strong> {{$item->matailieu}}</p>
                                                        <p><strong>Tên tài liệu:</strong> {{$item->tentailieu}}</p>
                                                        <p><strong>Tài liệu:
                                                                <a href="{{ $item->path }}" download="{{ $item->path }}">
                                                                    <img style="width: 50px" src="https://www.w3schools.com/images/myw3schoolsimage.jpg"></img>
                                                                </a>
                                                            </strong></p>
                                                        <p><strong>Người đăng:</strong> {{$item->user ? $item->user->tentaikhoan : 'N/A'}}</p>
                                                        <p><strong>Ngày đăng:</strong> {{$item->created_at}}</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><strong>Hình ảnh:</strong></p>
                                                        <img src="{{$item->hinhanh}}" style="width: 100%; height: auto;">
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-12">
                                                        <p><strong>Nội dung:</strong></p>
                                                        <p>{{$item->noidung}}</p>
                                                    </div>
                                                </div>
                                                @if ($item->trangthaiduyet == 1)
                                                <div class="row mt-3">
                                                    <div class="col-md-12">
                                                        <p><strong>Lí do bài viết bị ẩn hay bị xóa: </strong></p>
                                                        <p>{{$item->noidung}}</p>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- Sửa --}}
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateModal-{{$item->matailieu}}">Sửa<i class="bi bi-balloon-heart"></i>
                            </button>
                            <div class="modal fade" id="updateModal-{{$item->matailieu}}" tabindex="-1" aria-labelledby="updateModalLabel-{{$item->matailieu}}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateModalLabel-{{$item->matailieu}}">Sửa tài liệu</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('documentteacher.update', $item->matailieu) }}" class="form" method="POST" enctype="multipart/form-data">
                                                @method('PATCH')
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="matailieu" class="form-label">Mã tài liệu</label>
                                                    <input type="text" class="form-control" name="matailieu" id="matailieu" value="{{ $item->matailieu }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tentailieu" class="form-label">Tên tài liệu</label>
                                                    <input type="text" class="form-control" name="tentailieu" id="tentailieu" value="{{ $item->tentailieu }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="hinhanh" class="form-label">Hình ảnh</label>
                                                    <input type="file"
                                                        id="hinhanh"
                                                        name="hinhanh"
                                                        accept="image/jpeg, image/png, image/gif"
                                                        class="form-control"
                                                        required>
                                                </div>
                                                @if (!empty($item->hinhanh))
                                                <img src="{{ asset($item->hinhanh) }}" alt="Hình ảnh" style="width: 200px; height: auto;">
                                                @endif

                                                <div class="mb-3">
                                                    <label for="path" class="form-label">Tài liệu đính kèm</label>
                                                    <input type="file"
                                                        id="path"
                                                        name="path"
                                                        accept=".pdf,.doc,.docx"
                                                        class="form-control"
                                                        required>
                                                    @if (!empty($item->path))
                                                    <p>File hiện tại: <a href="{{ asset($item->path) }}" target="_blank">Xem file</a></p>
                                                    @endif
                                                </div>
                                                <div class="mb-3">
                                                    <label for="noidung" class="form-label">Nội dung</label>
                                                    <textarea name="noidung" id="noidung" cols="30" rows="10" class="form-control">{{ $item->noidung }}</textarea>
                                                </div>
                                                <div class="btn-footer" style="display: flex; justify-content: flex-end;">
                                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" style="margin-right: 20px">Hủy</button>
                                                    <button type="submit" class="btn btn-success">Cập nhật</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
        </div>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModel-{{ $item->matailieu }}">
            Xóa
            <i class="bi bi-archive-fill"></i>
        </button>

        <div class="modal fade" id="deleteModel-{{ $item->matailieu }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $item->matailieu }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModelLabel">Bạn có muốn xóa tài liệu này???</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p style="color: red;">Hãy suy nghĩ thật kỹ</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <form action="{{ route('documentteacher.destroy', $item->matailieu) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <!-- Truyền tham số action để xác định hành động xóa cứng -->
                            <input type="hidden" name="action" value="delete">
                            <button type="submit" class="btn btn-danger">Xóa <i class="bi bi-archive-fill"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </td>
        </tr>
        @endforeach

        </tbody>
        </table>
    </div>
</div>
</div>

@endsection

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