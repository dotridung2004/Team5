<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Khoa công nghệ thông tin</title>
    <link rel="shortcut icon" type="image/png" href="{{url('assets/images/logos/dhtl.png')}}" />
    <link rel="stylesheet" href="{{url('assets/css/styles.min.css')}}" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="{{url('assets/images/logos/logo_cntt.png')}}" alt="" style="width: 300px;">
                                </a>


                                <!-- Session Status -->
                                @if (session('status'))
                                <div class="container">
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        {{ session('status') }}
                                        <button class="btn-close" aria-label="close" data-bs-dismiss="alert"></button>
                                    </div>
                                </div>
                                @endif

                                <form method="POST" action="{{ route('password.store') }}">
                                    @csrf

                                    <!-- Password Reset Token -->
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                    <!-- Email Address -->

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{old('email', $request->email)}}" autofocus autocomplete="username">
                                        @if ($errors->has('email'))
                                        <div class="text-danger mt-2">
                                            {{ $errors->first('email') }}
                                        </div>
                                        @endif
                                    </div>


                                    <!-- Password -->
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Mật khẩu</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            autocomplete="current-password">
                                        @if ($errors->has('password'))
                                        <div class="text-danger mt-2">
                                            {{ $errors->first('password') }}
                                        </div>
                                        @endif
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="mb-4">
                                        <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                                            autocomplete="new-password">
                                        @if ($errors->has('password_confirmation'))
                                        <div class="text-danger mt-2">
                                            {{ $errors->first('password_confirmation') }}
                                        </div>
                                        @endif
                                    </div>


                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Đặt lại mật khẩu</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{url('assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>