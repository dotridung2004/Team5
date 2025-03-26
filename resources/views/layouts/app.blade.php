<!DOCTYPE html>
<html lang="vi">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Khoa công nghệ thông tin</title>


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
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div>
                    <div class="inner-logo">
                        <a href="{{route('newsviews.index')}}"> <img src="{{url('assets/images/logos/logo_cntt.png')}}" alt="" style="width: 300px;"></a>

                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('newsviews.index')}}">Trang chủ</a>
                        </li>
                    </ul>
                </div>
                <div>
                    @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end">
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
                        <a
                            href="{{ route('login') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Log in
                        </a>
                        @endauth
                    </nav>
                    @endif
                </div>
            </div>
        </nav>
    </header>
    <main>
        @yield('main')
    </main>

    <script src="{{url('assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
    <script src="{{url('assets/libs/simplebar/dist/simplebar.js')}}"></script>
    <script src="{{url('assets/js/sidebarmenu.js')}}"></script>
    <script src="{{url('assets/js/app.min.js')}}"></script>
    <script src="{{url('assets/js/dashboard.js')}}"></script>

</body>

</html>