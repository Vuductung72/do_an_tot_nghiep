<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from mophy.dexignzone.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Jan 2023 10:46:18 GMT -->
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
    @yield('title')
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link href="{{ asset('admins/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('admins/vendor/chartist/css/chartist.min.css') }}" rel="stylesheet">
	<!-- Vectormap -->
    <link href="{{ asset('admins/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admins/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admins/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('admins/vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">

    @stack('css')

	<script src="{{ asset('global/plugins/sweetalert2@11.js') }}"></script>
	
</head>
<body>

	{{-- check alerts of web  --}}
    @include('admin.components.alerts')

    {{-- check erorrs of web  --}}
    @include('admin.components.errors')
    {{-- header --}}

    <!--Preloader start-->
    {{-- <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div> --}}
    <!--Preloader end-->

    <!--    Main wrapper start
    -->
    <div id="main-wrapper">

        @include(' admin.layouts.includes.header')

        @include('admin.layouts.includes.siderbar')        
		
		<!--Content body start-->
        <div class="content-body">
            @yield('content')
        </div>
        <!--Content body end-->

        @include('admin.layouts.includes.footer')

		<!--Support ticket button start-->

        <!--Support ticket button end-->

    </div>
    <!--Main wrapper end-->

    <!--Scripts-->
    <!-- Required vendors -->
    <script src="{{ asset('admins/vendor/global/global.min.js') }}"></script>
	<script src="{{ asset('admins/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
	<script src="{{ asset('admins/vendor/chart.js/Chart.bundle.min.js') }}"></script>
	<script src="{{ asset('admins/vendor/owl-carousel/owl.carousel.js') }}"></script>		
	
	<!-- Chart piety plugin files -->
    <script src="{{ asset('admins/vendor/peity/jquery.peity.min.js') }}"></script>
	
	<!-- Apex Chart -->
	<script src="{{ asset('admins/vendor/apexchart/apexchart.js') }}"></script>
	
	<!-- Dashboard 1 -->
	<script src="{{ asset('admins/js/dashboard/dashboard-1.js') }}"></script>

	
	
    <script src="{{ asset('admins/js/custom.min.js') }}"></script>
	<script src="{{ asset('admins/js/deznav-init.js') }}"></script>
	<!-- Jquery Validation -->
    <script src="{{ asset('admins/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <!-- Form validate init -->
    <script src="{{ asset('admins/js/plugins-init/jquery.validate-init.js') }}"></script>

    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code table lists',
            toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
    </script>

    @stack('scripts')

	
</body>

<!-- Mirrored from mophy.dexignzone.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Jan 2023 10:46:39 GMT -->
</html>