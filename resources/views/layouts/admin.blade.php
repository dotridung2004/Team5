<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Khoa công nghệ thông tin</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" type="image/png" href="{{url('assets/images/logos/dhtl.png')}}" />
    <link rel="stylesheet" href="{{url('assets/css/styles.min.css')}}" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="{{route('newsviews.index')}}" class="text-nowrap logo-img">
                        <img src="{{url('assets/images/logos/logo_cntt.png')}}" alt="" style="width: 228px;" />
                    </a>

                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <span class="hide-menu">Thành phần</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('newsviews.index')}}" aria-expanded="false">
                                <span>
                                    <i class="bi bi-house-door-fill fs-6"></i>
                                </span>
                                <span class="hide-menu">Trang chủ</span>
                            </a>
                        </li>
                        <!-- <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('dashboard')}}" aria-expanded="false">
                                <span>
                                    <i class="bi bi-speedometer2 fs-6"></i>
                                </span>
                                <span class="hide-menu">Bảng điều khiển</span>
                            </a>
                        </li> -->
                        <li class="nav-small-cap">
                            <i class="bi bi-gear-fill nav-small-cap-icon fs-6"></i>
                            <span class="hide-menu">Quản lý</span>
                        </li>
                        <li class="sidebar-item">

                            <a class="sidebar-link" href="{{route('users.index')}}" aria-expanded="false">

                                <span>
                                    <i class="bi bi-people-fill fs-6"></i>
                                </span>
                                <span class="hide-menu">Tài khoản</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('news.index')}}" aria-expanded="false">
                                <span>
                                    <i class="bi bi-newspaper fs-6"></i>
                                </span>
                                <span class="hide-menu">Tin tức</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('documents.index')}}" aria-expanded="false">
                                <span>
                                    <i class="bi bi-file-earmark-text fs-6"></i>
                                </span>
                                <span class="hide-menu">Tài liệu</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('feedbacks.index')}}" aria-expanded="false">
                                <span>
                                    <i class="bi bi-chat-fill fs-6"></i>
                                </span>
                                <span class="hide-menu">Phản hồi</span>
                            </a>
                        </li>


                    </ul>
                </nav>

                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <h3>@yield('title')</h3>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{url('assets/images/profile/user-1.jpg')}}" alt="" width="35" height="35" class="rounded-circle">
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
                                        <a href="{{ route('logout') }}" class="btn btn-outline-primary mx-3 mt-2 d-block"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
                </nav>
            </header>
            <!--  Header End -->
            @yield('main')
        </div>
    </div>

    <script src="{{url('assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
    <script src="{{url('assets/libs/simplebar/dist/simplebar.js')}}"></script>
    <script src="{{url('assets/js/sidebarmenu.js')}}"></script>
    <script src="{{url('assets/js/app.min.js')}}"></script>
    <script src="{{url('assets/js/dashboard.js')}}"></script>

</body>

</html>