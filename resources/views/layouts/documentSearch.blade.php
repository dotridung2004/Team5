<!DOCTYPE html>

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

    .footer-page {
        background-color: #001f7f;
        /* Màu xanh đậm */
        color: white;
        font-family: Arial, sans-serif;
    }

    .footer-top {
        background-color: #0057d8;
        /* Màu xanh dương nhạt hơn */
        padding: 10px 0;
    }

    .footer-top h3 {
        font-size: 16px;
        font-weight: bold;
        margin: 0;
    }

    .footer-top .text-right img {
        width: 24px;
        height: 24px;
        margin-left: 10px;
    }

    .footer-middle {
        padding: 20px 0;
    }

    .footer-middle .col-md-4 img {
        max-width: 100%;
        border-radius: 5px;
    }

    .address {
        font-size: 16px;
    }

    .address div {
        margin-bottom: 5px;
    }

    .address a {
        color: #ffcc00;
        /* Màu vàng để làm nổi bật email */
        text-decoration: none;
    }

    .address a:hover {
        text-decoration: underline;
    }

    /* Reset mặc định */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
    }

    /* HEADER */
    .section-one {
        background: white;
        padding: 10px 0;
        border-bottom: 3px solid #003366;
    }

    .inner-logo img {
        height: 60px;
    }

    .inner-content h2 {
        text-align: right;
        color: #003366;
        font-size: 18px;
        font-weight: bold;
    }

    /* NAVIGATION */
    /* .nav {
        background: #003366;
        padding: 10px 0;
    }

    .nav .inner-item {
        display: flex;
        justify-content: center;
        gap: 20px;
    }

    .nav .inner-item a {
        color: white;
        text-decoration: none;
        font-weight: bold;
        text-transform: uppercase;
    }

    .nav .inner-item a:hover {
        color: #00aaff;
    } */
    .nav {
        background: #003366;
        /* Màu nền xanh */
        padding: 10px 0;
        border: 1px solid;
    }

    .nav .inner-item {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .nav .inner-item div {
        position: relative;
        padding: 0 15px;
        /* Khoảng cách giữa các mục */
    }

    .nav .inner-item div:not(:last-child)::after {
        content: "|";
        /* Dấu gạch phân cách */
        position: absolute;
        right: -5px;
        top: 50%;
        transform: translateY(-50%);
        color: white;
        /* Màu gạch phân cách */
        font-weight: bold;
    }

    .nav .inner-item a {
        color: white;
        text-decoration: none;
        font-weight: bold;
        text-transform: uppercase;
    }

    .nav .inner-item a:hover {
        color: #00aaff;
    }


    /* SECTION TWO - Banner */
    .section-two {
        width: 100%;
        background-color: #003366;
    }

    .section-two .inner-img img {
        width: 100%;
        display: block;
    }

    /* SECTION THREE - Các icon */
    .section-three {
        background: white;
        padding: 20px 0;
    }

    .section-three .row {
        display: flex;
        justify-content: space-around;
    }



    .section-three .col-1 {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .section-three .inner-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .section-three .inner-img img {
        width: 40px;
        /* Điều chỉnh kích thước ảnh */
        height: 40px;
        object-fit: contain;
        /* Đảm bảo ảnh không bị méo */
    }

    .section-three .inner-title p {
        margin-top: 5px;
        font-size: 14px;
        font-weight: bold;
        color: #003366;
        /* Điều chỉnh màu chữ */
    }

    .col-md-3 {
        position: sticky;
        top: 20px;
        /* Khoảng cách từ đỉnh màn hình */
        height: 100vh;
        /* Đảm bảo nó không bị quá dài */
        overflow-y: auto;
        /* Cho phép cuộn nếu nội dung dài hơn */
    }
</style>

<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Khoa công nghệ thông tin</title>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/styles.min.css') }}" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" type="image/png" href="{{url('assets/images/logos/dhtl.png')}}" />
    <link rel="stylesheet" href="{{url('assets/css/styles.min.css')}}" />
</head>


<body>

    <header>

        <div class="section-one">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Logo bên trái -->
                    <div class="col-4">
                        <div class="inner-logo">
                            <img src="{{url('assets/images/logos/logo_cntt.png')}}" alt="">
                        </div>
                    </div>

                    <!-- Chữ ở giữa -->
                    <div class="col-4">
                        <div class="inner-content text-center">
                            <h2>CHUẨN MỰC - SÁNG TẠO - TIÊN PHONG</h2>
                        </div>
                    </div>

                    <!-- Đăng nhập bên phải -->
                    <div class="col-4">
                        <div class="d-flex justify-content-end">
                            @if (Route::has('login'))
                            <nav class="flex flex-1 justify-end">
                                @auth
                                <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                                    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                                                @if(Auth::user()->vaitro == 'admin')
                                                <img src="{{url('assets/images/profile/user-1.jpg')}}" alt="" width="35" height="35" class="rounded-circle">
                                                @elseif(Auth::user()->vaitro == 'teacher')
                                                <img src="{{url('assets/images/profile/user-2.jpg')}}" alt="" width="35" height="35" class="rounded-circle">
                                                @elseif(Auth::user()->vaitro == 'student')
                                                <img src="{{url('assets/images/profile/user-3.jpg')}}" alt="" width="35" height="35" class="rounded-circle">
                                                @endif
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                                <div class="message-body">
                                                    <a href="{{route('profile.edit')}}" class="d-flex align-items-center gap-2 dropdown-item">
                                                        <i class="bi bi-person-circle fs-6"></i>
                                                        <p class="mb-0 fs-3">Hồ sơ cá nhân</p>
                                                    </a>
                                                    <a href="{{ route('profile.editprofile')}}" class="d-flex align-items-center gap-2 dropdown-item">
                                                        <i class="bi bi-gear fs-6"></i>
                                                        <p class="mb-0 fs-3">Tài khoản</p>
                                                    </a>
                                                    @if(Auth::user()->vaitro == 'admin')
                                                    <a href="{{route('users.index')}}" class="d-flex align-items-center gap-2 dropdown-item">
                                                        <i class="bi bi-list-task fs-6"></i>
                                                        <p class="mb-0 fs-3">Công việc</p>
                                                    </a>
                                                    @elseif(Auth::user()->vaitro == 'teacher')
                                                    <a href="{{route('researchpapers.index')}}" class="d-flex align-items-center gap-2 dropdown-item">
                                                        <i class="bi bi-list-task fs-6"></i>
                                                        <p class="mb-0 fs-3">Công việc</p>
                                                    </a>
                                                    @endif
                                                    <a href="{{ route('logout') }}" class="btn btn-outline-primary mx-3 mt-2 d-block" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        <i class="bi bi-box-arrow-right fs-6 me-1"></i>Đăng xuất
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                @else
                                <a href="{{ route('login') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    Đăng nhập
                                </a>
                                @endauth
                            </nav>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-two">
            <nav class="nav">
                <div class="container">
                    <div class="inner-item d-flex justify-content-around">
                        <div><a href="#"><i class="fa-solid fa-house"></i></a></div>
                        <div><a href="#">GIỚI THIỆU</a></div>
                        <div><a href="#">TIN TỨC & THÔNG BÁO</a></div>
                        <div><a href="#">TUYỂN SINH</a></div>
                        <div><a href="#">ĐÀO TẠO </a></div>
                        <div><a href="#">NGHIÊN CỨU</a></div>
                        <div><a href="#">ĐỐI NGOẠI</a></div>
                        <div><a href="#">VĂN BẢN</a></div>
                        <div><a href="#">SINH VIÊN</a></div>
                        <div><a href="#">LIÊN HỆ</a></div>
                    </div>
                </div>
            </nav>
            <div>
                <div class="container">
                    <div class="inner-img">
                        <img src="assets\images\newsview\web1.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="section-three container pb50">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-1">
                        <div class="inner-item">
                            <div class="inner-img">
                                <img src="assets\images\newsview\tuyen_sinh.png" alt="">
                            </div>
                            <div class="inner-title">
                                <p>Tuyển sinh</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="inner-item">
                            <div class="inner-img">
                                <img src="assets\images\newsview\65_64x40.png" alt="">
                            </div>
                            <div class="inner-title">
                                <p>65 Năm</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="inner-item">
                            <div class="inner-img">
                                <img src="assets\images\newsview\viec_lam.png" alt="">
                            </div>
                            <div class="inner-title">
                                <p>Thông tin việc làm</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="inner-item">
                            <div class="inner-img">
                                <img src="assets\images\newsview\quality.jpg" alt="">
                            </div>
                            <div class="inner-title">
                                <p>Đảm bảo chất lượng</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="inner-item">
                            <div class="inner-img">
                                <img src="assets\images\newsview\www.jpg" alt="">
                            </div>
                            <div class="inner-title">
                                <p>Tạp chí</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="inner-item">
                            <div class="inner-img">
                                <img src="assets\images\newsview\email.jpg" alt="">
                            </div>
                            <div class="inner-title">
                                <p>TLU Mail</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="inner-item">
                            <div class="inner-img">
                                <img src="assets\images\newsview\lichcongtac.jpg" alt="">
                            </div>
                            <div class="inner-title">
                                <p>Lịch công tác</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="inner-item">
                            <div class="inner-img">
                                <img src="assets\images\newsview\user.jpg" alt="">
                            </div>
                            <div class="inner-title">
                                <p>Đăng ký học</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </header>


    <hr>
    <div class="container pb50">
        <article>
            <div class="post-content">
                @yield('content')
            </div>
        </article>
    </div>

</body>
<!-- footer -->
<footer class="footer-page">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-8 text-left">
                    <h3 style="color: white;"><span id="dnn_dnnCopyright_lblCopyright" class="SkinObject">© 2025 TRƯỜNG ĐẠI HỌC THỦY LỢI</span>
                    </h3>
                </div>
                <div class="col-md-4 text-right">
                    <a href="#" class="social-icon-sm si-dark si-colored-facebook si-gray-round" style="color: white;">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="social-icon-sm si-dark si-colored-twitter si-gray-round" style="color: white;">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon-sm si-dark si-colored-linkedin si-gray-round" style="color: white;"></a>
                    <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>
        </div>
    </div><!-- /.footer-top -->
    <div class="footer-middle">
        <div class="container">
            <div id="dnn_footerPane">
                <div class="DnnModule DnnModule-DNN_HTML DnnModule-1517"><a name="1517"></a>
                    <div class="DNNContainer_noTitle">
                        <div id="dnn_ctr1517_ContentPane"><!-- Start_Module_1517 -->
                            <div id="dnn_ctr1517_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
                                <div id="dnn_ctr1517_HtmlModule_lblContent" class="Normal">
                                    <div class="row">
                                        <div class="col-md-4"><a href="#" target="_blank"><img alt="Image" src="{{ url('assets/images/newsview/TLU-map.png') }}" /> </a></div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="address">
                                                        <div style="font-size:25px;margin-bottom:15px">TRƯỜNG ĐẠI HỌC THỦY LỢI</div>

                                                        <div>Địa chỉ: 175 Tây Sơn, Đống Đa, Hà Nội</div>

                                                        <div>Điện thoại: (024) 38522201 - Fax: (024) 35633351</div>

                                                        <div>Email: phonghcth@tlu.edu.vn</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- /.footer-middle -->
</footer>
<script src="{{url('assets/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
<script src="{{url('assets/libs/simplebar/dist/simplebar.js')}}"></script>
<script src="{{url('assets/js/sidebarmenu.js')}}"></script>
<script src="{{url('assets/js/app.min.js')}}"></script>
<script src="{{url('assets/js/dashboard.js')}}"></script>
<!-- footer -->

</html>