@extends('layouts.admin')
@section('title', 'Quản lý tài khoản')

@section('main')
<div class="container-fluid ">
    <div class="row">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-2 mb-4">
                            <span>
                                <i class="bi bi-person-lines-fill fs-6"></i>
                            </span>
                            <h3 class="mb-0">Danh sách tài khoản</h3>
                        </div>
                        <small>Cập nhật lần cuối {{$updated_at->updated_at}}</small>

                        <a href="{{ route('users.create') }}" class="btn btn-primary mb-2 ms-auto d-block" style="width: max-content;">
                            <i class="bi bi-person-plus"></i> Thêm tài khoản
                        </a>
                        <form method="GET" action="{{ route('users.search') }}" class="form-group d-flex gap-2 align-items-center">
                            <div class="input-group">
                                <input
                                    type="search"
                                    class="form-control"
                                    name="search"
                                    placeholder="Tìm kiếm tài khoản..."
                                    value="{{ request('search') }}" />
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    @if (session('success'))
                    <div class="container">
                        <div class="alert alert-success  alert-dismissible" role="alert">
                            {{ session('success') }}
                            <button class="btn-close" aria-label="close" data-bs-dismiss="alert"></button>
                        </div>
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="container">
                        <div class="alert alert-danger  alert-dismissible" role="alert">
                            {{ session('error') }}
                            <button class="btn-close" aria-label="close" data-bs-dismiss="alert"></button>
                        </div>
                    </div>
                    @endif
                    <div class="ibox-content">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-nowrap">STT</th>
                                    <th scope="col" class="text-nowrap">Tên tài khoản </th>
                                    <th scope="col" class="text-nowrap">Vai trò</th>
                                    <th scope="col" class="text-nowrap">Email</th>
                                    <th scope="col" class="text-nowrap">Trạng thái</th>
                                    <th scope="col" colspan="2" class="text-nowrap text-center">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr onclick="window.location='{{ route('users.show', $user->tentaikhoan) }}'" style="cursor: pointer;">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $user->tentaikhoan }}</td>
                                    <td>
                                        @if($user->vaitro == 'teacher')
                                        Giảng viên
                                        @elseif($user->vaitro == 'student')
                                        Sinh viên
                                        @endif
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->trangthai == 'active')
                                        <strong>Hoạt động</strong>
                                        @else
                                        <strong>Khóa</strong>
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->trangthai == 'active')
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#lock-modal-{{ $user->tentaikhoan}}" onclick="event.stopPropagation();">
                                            <i class="bi bi-unlock"></i>
                                        </button>
                                        @else
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#lock-modal-{{ $user->tentaikhoan}}" onclick="event.stopPropagation();">
                                            <i class="bi bi-lock"></i>
                                        </button>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-{{ $user->tentaikhoan}}" onclick="event.stopPropagation();">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                    <!-- Modal Khóa -->
                                    @if($user->trangthai == 'active')
                                    <div class="modal fade" id="lock-modal-{{ $user->tentaikhoan}}" tabindex="-1" aria-labelledby="lockModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="lockModalLabel">Khóa tài khoản</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('users.lock', $user->tentaikhoan) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="modal-body">
                                                        <p>Bạn có chắc chắn muốn khóa tài khoản {{ $user->tentaikhoan }} không?</p>
                                                        <div class="mb-3">
                                                            <label for="reason" class="form-label">Lý do khóa (bắt buộc):</label>
                                                            <textarea class="form-control" name="reason" id="reason" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                        <button type="submit" class="btn btn-danger">Khóa</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                    <!-- Modal delete -->
                                    <div class="modal fade" id="modal-{{ $user->tentaikhoan }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa tài khoản</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Bạn có muốn xóa tài khoản này không?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                    <form action="{{ route('users.destroy', $user->tentaikhoan) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Xác nhận</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection