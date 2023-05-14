<!DOCTYPE html>
    <html lang="en" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="admin, dashboard" />
        <meta name="author" content="DexignZone" />
        <meta name="robots" content="index, follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="MOPHY : Payment Admin Dashboard  Bootstrap 5 Template" />
        <meta property="og:title" content="MOPHY : Payment Admin Dashboard  Bootstrap 5 Template" />
        <meta property="og:description" content="MOPHY : Payment Admin Dashboard  Bootstrap 5 Template" />
        <meta property="og:image" content="social-image.png"/>
        <meta name="format-detection" content="telephone=no">
        <title>Đăng nhập</title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
        <link href="{{ asset("admins/css/style.css") }}" rel="stylesheet">
        
        <script src="{{ asset('global/plugins/sweetalert2@11.js') }}"></script>
    </head>

    <body class="h-100">
        {{-- check alerts of web  --}}
        @include('admin.components.alerts')

        {{-- check erorrs of web  --}}
        @include('admin.components.errors')

        <div class="authincation h-100">
            <div class="container h-100">
                <div class="row justify-content-center h-100 align-items-center">
                    <div class="col-md-6">
                        <div class="authincation-content">
                            <div class="row no-gutters">
                                <div class="col-xl-12">
                                    <div class="auth-form">
                                        <h4 class="text-center mb-4 text-white">Đăng nhập tài khoản nhân viên</h4>
                                        <form action="" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label class="mb-1 text-white"><strong>Email</strong></label>
                                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                                @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-1 text-white"><strong>Mật khẩu</strong></label>
                                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                                @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn bg-white text-primary btn-block">Đăng nhập</button>
                                            </div>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--**********************************
            Scripts
        ***********************************-->
        <!-- Required vendors -->
        <script src="{{ asset("admins/vendor/global/global.min.js ") }}"></script>
        <script src="{{ asset("admins/vendor/bootstrap-select/dist/js/bootstrap-select.min.js ") }}"></script>
        <script src="{{ asset("admins/js/custom.min.js ") }}"></script>
        <script src="{{ asset("admins/js/deznav-init.js ") }}"></script>

    </body>


    <!-- Mirrored from mophy.dexignzone.com/xhtml/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Jan 2023 10:46:48 GMT -->
</html>