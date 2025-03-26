@extends('layouts.admin')
@section('title', 'Quản lý tin tức')

@section('main')
<div class="container-fluid ">
    <div class="row">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-2 mb-4">
                            <span>
                                <i class="bi bi-newspaper fs-6"></i> <!-- Thay bi-cart-check-fill -->
                            </span>
                            <h3 class="mb-0">Danh sách tin tức</h3>
                        </div>
                        <small>Cập nhật lần cuối {{$updated_at->updated_at}} </small>
                        <!-- Nút Thêm sản phẩm, căn phải -->
                        <a href="{{ route('news.create') }}" class="btn btn-primary mb-2 ms-auto d-block" style="width: max-content;">
                            <i class="bi bi-plus-circle"></i> Thêm tin tức
                        </a>
                        <form method="GET" action="{{route('news.searchtt')}}" class="form-group d-flex gap-2 align-items-center">
                            <div class="input-group">
                                <input
                                    type="search"
                                    class="form-control"
                                    name="search"
                                    placeholder="Tìm kiếm tin tức..."
                                    value="{{ request('search') }}" />
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    @if (session('success'))
                    <div class="container">
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{ session('success') }}
                            <button class="btn-close" aria-label="close" data-bs-dismiss="alert"></button>
                        </div>
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="container">
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            {{ session('error') }}
                            <button class="btn-close" aria-label="close" data-bs-dismiss="alert"></button>
                        </div>
                    </div>
                    @endif
                    <!-- Thêm lớp ms-auto để đẩy nút sang bên phải -->
                    <div class="ibox-content">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-nowrap">Mã tin tức</th>
                                    <th scope="col" class="text-nowrap">Tên tin tức </th>
                                    <th scope="col" class="text-nowrap">Mô tả </th>
                                    <th scope="col" class="text-nowrap">Tác giả </th>
                                    <th scope="col" class="text-nowrap">Trạng thái </th>
                                    <th scope="col" colspan="3" class="text-nowrap text-center">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($news as $new)
                                <tr onclick="window.location='{{ route('news.show', $new->matintuc) }}'" style="cursor: pointer;">
                                    <td>{{ $new->matintuc }}</td>
                                    <td>{{ $new->tentintuc }}</td>
                                    <td>{{ $new->mota }}</td>
                                    <td>
                                        @if($new->user)
                                        @if($new->user->vaitro === 'admin' && $new->user->admin)
                                        {{ $new->user->admin->tenquantri }}
                                        @elseif($new->user->vaitro === 'teacher' && $new->user->teacher)
                                        {{ $new->user->teacher->tengiaovien }}
                                        @elseif($new->user->vaitro === 'student' && $new->user->student)
                                        {{ $new->user->student->tensinhvien }}
                                        @else
                                        Không có tác giả
                                        @endif
                                        @else
                                        Không có tác giả
                                        @endif
                                    </td>
                                    <td>
                                        @if($new->trangthai == 'public')
                                        <strong class="text text-nowrap">Công khai</strong>
                                        @elseif($new->trangthai == 'pending')
                                        <strong class="text text-nowrap">Chờ duyệt</strong>
                                        @elseif($new->trangthai == 'rejected')
                                        <strong class="text text-nowrap">Từ chối</strong>
                                        @endif
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-{{ $new->matintuc }}" onclick="event.stopPropagation();">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>

                                    <!-- Modal -->
                                    <div class="modal fade " id="modal-{{ $new->matintuc }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa tin tức</h1> <!-- Sửa tiêu đề modal -->
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Bạn có muốn xóa tin tức này không?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                    <form action="{{route('news.destroy',$new->matintuc)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Xác nhận</button>
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
            <div class="d-flex justify-content-center">
                {{ $news->links() }}
            </div>
        </div>
    </div>
</div>
@endsection