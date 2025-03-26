@extends('layouts.newsviews')

@section('main')
@php
$dataFirst = $news->first();
@endphp
<div class="col-md-9 mb40 mt-3 ">
    <article>
        <div class="post-content">
            <div id="news-detail" class="container p-3 mt-3 border rounded bg-light">
                <div class="media p-3 border rounded bg-white">

                    <div class="d-flex align-items-center">
                        <img class="mr-3 img-fluid rounded-circle m-3" width="64" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="News Image">
                        <h3 class="mt-0 mb-1 bold">Tác giả: {{ $dataFirst->nguoidang}}</h3>
                    </div>
                    <br>
                    <div class="media-body">
                        <h5 class="mt-0 mb-1 bold">Tên tin tức : {{ $dataFirst->tentintuc }}</h5>

                        <div style="width: 800px; word-wrap: break-word;">
                            <p><strong>Nội dung:</strong> <strong>{{ $dataFirst->noidung }}</strong></p>
                        </div>
                        <small class="text-primary">Ngày đăng: {{ $dataFirst->created_at }}</small>
                    </div>

                </div>
                <ul class="list-inline share-buttons">
                    <li class="list-inline-item">Chia sẻ bài viết:</li>
                    <li class="list-inline-item">
                        <a href="#" class="social-icon-sm si-dark si-colored-facebook si-gray-round">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="social-icon-sm si-dark si-colored-twitter si-gray-round">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="social-icon-sm si-dark si-colored-linkedin si-gray-round">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </li>
                </ul>

                <hr class="mb40">
                <h4 class="mb40 text-uppercase font500">Về tác giả </h4>
                <div class="media mb40">
                    <div class="d-flex align-items-center">
                        <img class="mr-3 img-fluid rounded-circle m-3" width="64" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="News Image">
                        <h5 class="mt-0 font700">{{ $dataFirst->nguoidang }}</h5>
                    </div>
                    <div class="media-body ">

                        <strong>Mô tả: </strong>{{ $dataFirst->mota }}
                    </div>
                </div>

                <hr class="mb40">
                <h4 class="mb40 text-uppercase font500">Bình luận</h4>
                @if($dataFirst->feedbacks->isEmpty())
                <li class="list-group-item text-muted">Không có phản hồi.</li>
                @else
                @foreach($dataFirst->feedbacks->sortByDesc('ngaythacmac') as $feedback)
                <div class="media m50 d-flex align-items-center">
                    <i class="fas fa-user-circle fa-3x text-primary mr-3 mb-9 m-3"></i>
                    <div class="media-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="mt-0 font-weight-bold d-inline-block ">{{ $feedback->nguoigui }}</h5>
                        </div>
                        <p class="text-muted mt-2">{{ $feedback->noidung }}</p>
                    </div>
                </div>
                @endforeach
                @endif
                <hr class="mb40">
                <!-- feedbacks -->
                <h4 class="mb40 text-uppercase font500">Thêm bình luận </h4>
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
                @if(Auth::check())
                <form action="{{ route('newsviews.comment', $dataFirst->matintuc) }}" method="POST">
                    @csrf

                    <div class="mb-3 bold">
                        <label for="nguoigui" class="form-label">Tên</label>
                        <input type="text" class="form-control bold" id="nguoigui" name="nguoigui" value="{{ Auth::user()->tentaikhoan }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="noidung" class="form-label">Bình luận</label>
                        <textarea class="form-control" id="noidung" name="noidung" rows="4">{{ old('noidung') }}</textarea>
                        @if ($errors->has('noidung'))
                        <span class="error-message text-danger small mt-1 fst-italic">*{{ $errors->first('noidung') }}</span>
                        @endif
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </div>
                </form>
                @endif

            </div>
        </div>
    </article>
</div>

<div class="col-md-3 mb40 mt-3">
    <div>
        <h4 class="sidebar-title">Tin tức mới nhất</h4>
        <ul class="list-unstyled">
            <div class="container">
                <ul class="list-unstyled">
                    @foreach($news as $item)
                    @php
                    $avatarIndex = $loop->index % 6 + 1;
                    $avatarUrl = "https://bootdey.com/img/Content/avatar/avatar{$avatarIndex}.png";
                    @endphp

                    <li class="media my-4 p-3 border rounded">
                        <div class="d-flex align-items-center">
                            <img class="d-flex mr-3 img-fluid rounded-circle m-3" width="64" src="{{ $avatarUrl }}" alt="News Image">
                            <h5 class="mt-0 mb-1 ">Tác giả: {{ $item->nguoidang }}</h5>
                        </div>

                        <div class="media-body">
                            <h5 class="mt-0 mb-1">
                                <a href="#" class="news-item text-decoration-none text-dark"
                                    data-news-id="{{ $item->matintuc }}"
                                    data-author="{{ $item->nguoidang }}"
                                    data-title="{{ $item->tentintuc }}"
                                    data-summary="{{ $item->mota }}"
                                    data-content="{{ $item->noidung }}"
                                    data-date="{{ $item->created_at }}"
                                    data-avatar="{{ $avatarUrl }}"
                                    data-feedbacks="{{ $item->feedbacks }}">

                                    Tên tin tức : {{ $item->tentintuc }}
                                </a>
                            </h5>
                            <p class="text-muted">Phản hồi: {{ $item->feedbacks->count() }}</p>
                            <small class="text-primary">Ngày đăng: {{ $item->created_at }}</small>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <div class="d-flex justify-content-center">
                    {!! $news->links('pagination::bootstrap-4') !!}
                </div>

            </div>
        </ul>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        let newsItems = document.querySelectorAll('.news-item');
        let detailContainer = document.getElementById('news-detail');

        newsItems.forEach(item => {
            item.addEventListener('click', async function(event) {
                event.preventDefault();
                let title = this.getAttribute('data-title');
                let author = this.getAttribute('data-author');
                let summary = this.getAttribute('data-summary');
                let content = this.getAttribute('data-content');
                let date = this.getAttribute('data-date');
                let avatar = this.getAttribute('data-avatar');
                let newsId = this.getAttribute('data-news-id');
                let feedbacks = JSON.parse(this.getAttribute('data-feedbacks') || '[]'); // Chuyển JSON thành mảng

                let feedbackHtml = '';

                if (feedbacks.length === 0) {
                    feedbackHtml = '<li class="list-group-item text-muted">Không có phản hồi.</li>';
                } else {
                    // Sắp xếp phản hồi theo `ngaythacmac` giảm dần (mới nhất lên trước)
                    feedbacks.sort((a, b) => new Date(b.ngaythacmac) - new Date(a.ngaythacmac));
                    feedbacks.forEach(fb => {
                        feedbackHtml += `
                        <div class="media m50 d-flex align-items-center">
                            <i class="fas fa-user-circle fa-5x text-primary mr-9 mb-9 m-3"></i>
                            <div class="media-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="mt-0 font-weight-bold d-inline-block">${fb.nguoigui}</h5>
                                </div>
                                <p class="text-muted mt-2">${fb.noidung}</p>
                            </div>
                        </div>
                    `;
                    });
                }

                // Lấy danh sách phản hồi từ API


                detailContainer.innerHTML = `
                    <div class="media p-3 border rounded bg-white">
                        
                        <div class="d-flex align-items-center">
                            <img class="mr-3 img-fluid rounded-circle m-3" width="64" src="${avatar}" alt="News Image">
                            <h3 class="mt-0 mb-1 bold">Tác giả: ${author}</h3>
                        </div>
                        <br>
                        <div class="media-body">
                            <h5 class="mt-0 mb-1 bold">Tên tin tức : ${title}</h5>
                            
                            <div style="width: 800px; word-wrap: break-word;">  
                                <p><strong>Nội dung:</strong> <strong>${content}</strong></p>
                            </div>  
                            <small class="text-primary">Ngày đăng: ${date}</small>
                        </div>
                    </div>
                    
                    <ul class="list-inline share-buttons">
        <li class="list-inline-item">Chia sẻ bài viết:</li>
        <li class="list-inline-item">
            <a href="#" class="social-icon-sm si-dark si-colored-facebook si-gray-round">
                <i class="fab fa-facebook"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#" class="social-icon-sm si-dark si-colored-twitter si-gray-round">
                <i class="fab fa-twitter"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#" class="social-icon-sm si-dark si-colored-linkedin si-gray-round">
                <i class="fab fa-linkedin"></i>
            </a>
        </li>
    </ul>

    <hr class="mb40">
    <h4 class="mb40 text-uppercase font500">Về tác giả </h4>
    <div class="media mb40">
        <div class="d-flex align-items-center">
            <img class="mr-3 img-fluid rounded-circle m-3" width="64" src="${avatar}" alt="News Image">
            <h5 class="mt-0 font700">${author}</h5>
        </div>
        <div class="media-body ">

            <strong>Mô tả: </strong>${summary}
        </div>
    </div>

    <hr class="mb40">
    <h4 class="mb40 text-uppercase font500">Bình luận</h4>
    ${feedbackHtml}
    <hr class="mb40">
    <!-- feedbacks -->
    <h4 class="mb40 text-uppercase font500">Thêm bình luận </h4>
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
@if(Auth::check())
    <form id="commentForm" method="POST">
        @csrf
        
        <div class="mb-3 bold">
            <label for="nguoigui" class="form-label">Tên</label>
            <input type="text" class="form-control bold" id="nguoigui" name="nguoigui" value="{{ Auth::user()->tentaikhoan }}" readonly>
        </div>

        <div class="mb-3">
            <label for="noidung" class="form-label">Bình luận</label>
            <textarea class="form-control" id="noidung" name="noidung" rows="4">{{ old('noidung') }}</textarea>
            @if ($errors->has('noidung'))
            <span class="error-message text-danger small mt-1 fst-italic">*{{ $errors->first('noidung') }}</span>
            @endif
        </div>

        <div class="d-flex justify-content-end gap-2">
            <button type="submit" class="btn btn-primary">Gửi</button>
        </div>
    </form>
    @endif
                    
                `;
                // Cập nhật action của form sau khi render
                document.getElementById('commentForm').action = `/newsviews/${newsId}/comment`;
            });
        });
    });
</script>
@endsection