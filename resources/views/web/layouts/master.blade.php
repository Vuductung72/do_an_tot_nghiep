<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from infolook.net/tf_preview/profil/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Jan 2023 09:32:09 GMT -->
<head>

    <!-- meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Profil - Personal Portfolio Html5 Template">
    <meta name="keywords" content="onepage, personal, portfolio, html5, template, responsive, creative">
    <meta name="author" content="web_bean">
    <!-- Site title -->
    @yield('title')
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="">

    <!-- Bootstrap css -->
    <link href="{{asset('web/assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Normalizer css -->
    <link href="{{ asset('web/assets/css/normalize.css') }}" rel="stylesheet">

    <!-- Owl Carousel css -->
    <link href=" {{asset('web/assets/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href=" {{asset('web/assets/css/owl.transitions.css')}}" rel="stylesheet">

     <!--Font Awesome css -->
     <link href="{{ asset('web/assets/fontawesome-free-6.2.1-web/css/all.min.css') }}" rel="stylesheet">

    <!-- Site css -->
    <link href=" {{asset('web/assets/css/style.css')}}" rel="stylesheet">

    @stack('css')
	<script src="{{ asset('global/plugins/sweetalert2@11.js') }}"></script>

</head>

<body>
    {{-- check alerts of web  --}}
    @include('admin.components.alerts')

    {{-- check erorrs of web  --}}
    @include('admin.components.errors')
    

    @include('web.layouts.includes.header')
    <!-- Navigation area starts -->
    
    <!-- Navigation area ends -->

    <!-- Slider area starts -->
    
    <!-- Slider area ends -->

    <!-- About area starts -->
    <div class="content">
        @yield('content')
    </div>
    
    <!-- Footer area starts -->
    @include('web.layouts.includes.footer')
    <!-- Footer area ends -->



    <!-- Latest jQuery -->
    <script src="{{asset('web/assets/js/jquery.min.js')}}"></script>

    <!-- Bootstrap js-->
    <script src="{{asset('web/assets/js/bootstrap.min.js')}}"></script>

    <!-- Owl Carousel js -->
    <script src="{{asset('web/assets/js/owl.carousel.min.js')}}"></script>

    <!-- Main js-->
    <script src="{{asset('web/assets/js/main_script.js')}}"></script>

    @stack('scripts')


</body>

<!-- Mirrored from infolook.net/tf_preview/profil/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Jan 2023 09:32:16 GMT -->
</html>