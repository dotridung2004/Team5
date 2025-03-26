<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
    body {
        margin-top: 20px;
    }

    /*
Blog post entries
*/

    .entry-card {
        -webkit-box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.05);
        -moz-box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.05);
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.05);
    }

    .entry-content {
        background-color: #fff;
        padding: 36px 36px 36px 36px;
        border-bottom-left-radius: 6px;
        border-bottom-right-radius: 6px;
    }

    .entry-content .entry-title a {
        color: #333;
    }

    .entry-content .entry-title a:hover {
        color: #4782d3;
    }

    .entry-content .entry-meta span {
        font-size: 12px;
    }

    .entry-title {
        font-size: .95rem;
        font-weight: 500;
        margin-bottom: 15px;
    }

    .entry-thumb {
        display: block;
        position: relative;
        overflow: hidden;
        border-top-left-radius: 6px;
        border-top-right-radius: 6px;
    }

    .entry-thumb img {
        border-top-left-radius: 6px;
        border-top-right-radius: 6px;
    }

    .entry-thumb .thumb-hover {
        position: absolute;
        width: 100px;
        height: 100px;
        background: rgba(71, 130, 211, 0.85);
        display: block;
        top: 50%;
        left: 50%;
        color: #fff;
        font-size: 40px;
        line-height: 100px;
        border-radius: 50%;
        margin-top: -50px;
        margin-left: -50px;
        text-align: center;
        transform: scale(0);
        -webkit-transform: scale(0);
        opacity: 0;
        transition: all .3s ease-in-out;
        -webkit-transition: all .3s ease-in-out;
    }

    .entry-thumb:hover .thumb-hover {
        opacity: 1;
        transform: scale(1);
        -webkit-transform: scale(1);
    }

    .article-post {
        border-bottom: 1px solid #eee;
        padding-bottom: 70px;
    }

    .article-post .post-thumb {
        display: block;
        position: relative;
        overflow: hidden;
    }

    .article-post .post-thumb .post-overlay {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        transition: all .3s;
        -webkit-transition: all .3s;
        opacity: 0;
    }

    .article-post .post-thumb .post-overlay span {
        width: 100%;
        display: block;

        text-align: center;
        transform: translateY(70%);
        -webkit-transform: translateY(70%);
        transition: all .3s;
        -webkit-transition: all .3s;
        height: 100%;
        color: #fff;
    }

    .article-post .post-thumb:hover .post-overlay {
        opacity: 1;
    }

    .article-post .post-thumb:hover .post-overlay span {
        transform: translateY(50%);
        -webkit-transform: translateY(50%);
    }

    .post-content .post-title {
        font-weight: 500;
    }

    .post-meta {
        padding-top: 15px;
        margin-bottom: 20px;
    }

    .post-meta li:not(:last-child) {
        margin-right: 10px;
    }

    .post-meta li a {
        color: #999;
        font-size: 13px;
    }

    .post-meta li a:hover {
        color: #4782d3;
    }

    .post-meta li i {
        margin-right: 5px;
    }

    .post-meta li:after {
        margin-top: -5px;
        content: "/";
        margin-left: 10px;
    }

    .post-meta li:last-child:after {
        display: none;
    }

    .post-masonry .masonry-title {
        font-weight: 500;
    }

    .share-buttons li {
        vertical-align: middle;
    }

    .share-buttons li a {
        margin-right: 0px;
    }

    .post-content .fa {
        color: #ddd;
    }

    .post-content a h2 {
        font-size: 1.5rem;
        color: #333;
        margin-bottom: 0px;
    }

    .article-post .owl-carousel {
        margin-bottom: 20px !important;
    }

    .post-masonry h4 {
        text-transform: capitalize;
        font-size: 1rem;
        font-weight: 700;
    }

    .mb40 {
        margin-bottom: 40px !important;
    }

    .mb30 {
        margin-bottom: 30px !important;
    }

    .media-body h5 a {
        color: #555;
    }

    .categories li a:before {
        content: "\f0da";
        font-family: 'FontAwesome';
        margin-right: 5px;
    }

    /*
Template sidebar
*/

    .sidebar-title {
        margin-bottom: 1rem;
        font-size: 1.1rem;
    }

    .categories li {
        vertical-align: middle;
    }

    .categories li>ul {
        padding-left: 15px;
    }

    .categories li>ul>li>a {
        font-weight: 300;
    }

    .categories li a {
        color: #999;
        position: relative;
        display: block;
        padding: 5px 10px;
        border-bottom: 1px solid #eee;
    }

    .categories li a:before {
        content: "\f0da";
        font-family: 'FontAwesome';
        margin-right: 5px;
    }

    .categories li a:hover {
        color: #444;
        background-color: #f5f5f5;
    }

    .categories>li.active>a {
        font-weight: 600;
        color: #444;
    }

    .media-body h5 {
        font-size: 15px;
        letter-spacing: 0px;
        line-height: 20px;
        font-weight: 400;
    }

    .media-body h5 a {
        color: #555;
    }

    .media-body h5 a:hover {
        color: #4782d3;
    }
</style>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý bán hàng</title>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- CSS -->
    <link rel="shortcut icon" type="image/png" href="{{ url('assets/images/logos/seodashlogo.png') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/styles.min.css') }}" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Tên thương hiệu</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tính năng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Giá cả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Liên hệ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <br><br>

    <div class="container pb50">
        <div class="row">
            <div class="col-md-9 mb40">
                <article>
                    <div class="post-content">
                        @yield('content')

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
                        <h4 class="mb40 text-uppercase font500">Về tác giả</h4>
                        @yield('author')

                        <div class="media mb40">
                            <i class="d-flex mr-3 fas fa-user-circle fa-5x text-primary"></i>
                            <div class="media-body">
                                <h5 class="mt-0 font700">Jane Doe</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
                            </div>
                        </div>

                        <hr class="mb40">
                        <h4 class="mb40 text-uppercase font500">Bình luận</h4>

                        <div class="media m50 d-flex align-items-center">
                            <i class="fas fa-user-circle fa-3x text-primary mr-3 mb-9"></i>
                            <div class="media-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="mt-0 font-weight-bold d-inline-block ">Jane Doe</h5>
                                    <a href="#" class="btn btn-outline-primary btn-sm float-right">Trả lời</a>
                                </div>
                                <p class="text-muted mt-2">Nulla vel metus scelerisque ante sollicitudin.</p>
                            </div>
                        </div>
                        <div class="media m50 d-flex align-items-center">
                            <i class="fas fa-user-circle fa-3x text-primary mr-3 mb-9"></i>
                            <div class="media-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="mt-0 font-weight-bold d-inline-block ">Anna</h5>
                                    <a href="#" class="btn btn-outline-primary btn-sm float-right">Trả lời</a>
                                </div>
                                <p class="text-muted mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, dolores maxime placeat voluptatibus praesentium consequatur, quae mollitia totam at quisquam numquam debitis facilis exercitationem. Voluptatibus explicabo nobis odio sint asperiores!</p>
                            </div>
                        </div>
                        <div class="media m50 d-flex align-items-center">
                            <i class="fas fa-user-circle fa-3x text-primary mr-3 mb-9"></i>
                            <div class="media-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mt-0 font-weight-bold d-inline-block">Bean kep</h5>
                                    <a href="#" class="btn btn-outline-primary btn-sm">Trả lời</a>
                                </div>
                                <p class="text-muted mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, in, sapiente, laudantium commodi assumenda ex laboriosam non autem doloremque unde saepe culpa debitis sequi incidunt omnis iusto aut rerum quam.</p>
                            </div>
                        </div>

                        <hr class="mb40">
                        <h4 class="mb40 text-uppercase font500">Đăng bình luận</h4>
                        <form role="form">
                            <div class="form-group">
                                <label>Tên</label>
                                <input type="text" class="form-control" placeholder="John Doe">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="john@doe.com">
                            </div>
                            <div class="form-group">
                                <label>Bình luận</label>
                                <textarea class="form-control" rows="5" placeholder="Bình luận"></textarea>
                            </div>
                            <div class="clearfix float-right">
                                <button type="button" class="btn btn-primary btn-lg">Gửi</button>
                            </div>
                        </form>
                    </div>
                </article>
            </div>

            <div class="col-md-3 mb40">
                <div class="mb40">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Tìm kiếm..." aria-describedby="basic-addon2">
                            <button class="input-group-addon btn btn-primary" id="basic-addon2">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <div>
                    <h4 class="sidebar-title">Tin tức mới nhất</h4>
                    <ul class="list-unstyled">
                        @yield('main')
                    </ul>
                </div>

                <div class="mb40">
                    <h4 class="sidebar-title">Danh mục</h4>
                    <ul class="list-unstyled categories">
                        <li><a href="#">Thuê</a></li>
                        <li><a href="#">Bán</a></li>
                        <li class="active">
                            <a href="#">Căn hộ</a>
                            <ul class="list-unstyled">
                                <li><a href="#">Văn phòng</a></li>
                                <li><a href="#">Kho</a></li>
                                <li><a href="#">Nhà để xe</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Đánh giá cao nhất</a></li>
                        <li><a href="#">Xu hướng</a></li>
                        <li><a href="#">Bất động sản mới nhất</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</body>
<footer class="bg-light text-center text-lg-start">
    <div class="container p-4">
        <div class="row">
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">Footer Content</h5>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Quisque scelerisque diam non nisi semper, et elementum lorem ornare.
                </p>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Links</h5>
                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="#!" class="text-dark">Link 1</a>
                    </li>
                    <li>
                        <a href="#!" class="text-dark">Link 2</a>
                    </li>
                    <li>
                        <a href="#!" class="text-dark">Link 3</a>
                    </li>
                    <li>
                        <a href="#!" class="text-dark">Link 4</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-0">Links</h5>
                <ul class="list-unstyled">
                    <li>
                        <a href="#!" class="text-dark">Link 1</a>
                    </li>
                    <li>
                        <a href="#!" class="text-dark">Link 2</a>
                    </li>
                    <li>
                        <a href="#!" class="text-dark">Link 3</a>
                    </li>
                    <li>
                        <a href="#!" class="text-dark">Link 4</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="text-center p-3" style="background-color: rgba(169, 109, 109, 0.2);">
        © 2025 Copyright:
        <a class="text-dark" href="#">YourWebsite.com</a>
    </div>
</footer>

</html>