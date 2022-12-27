<!doctype html>
<html lang="en">

<head>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{asset('admin/images/favicon-32x32.png')}}" type="image/png" />
    <!--plugins-->
    <link href="{{asset('admin/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


    <!-- loader-->
    <link href="{{asset('admin/css/pace.min.css')}}" rel="stylesheet" />
    <script src="{{asset('admin/js/pace.min.js')}}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{asset('admin/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/icons.css')}}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/dark-theme.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/css/semi-dark.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/css/header-colors.css')}}" />

    @yield('css-custom')
    <title>Dashboard</title>
</head>

<body>
<!--wrapper-->
<div class="wrapper">
    <!--sidebar wrapper -->
        @include('admin.includes.slider')
    <!--end sidebar wrapper -->

    <!--start header -->
        @include('admin.includes.header')
    <!--end header -->
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            @yield('content')
        </div>
    </div>
    <!--end page wrapper -->


    <!--start footer -->
        @include('admin.includes.footer')
    <!--end footer -->


</div>

<!-- Bootstrap JS -->
<script src="{{asset('admin/js/bootstrap.bundle.min.js')}}"></script>
<!--plugins-->
<script src="{{asset('admin/js/jquery.js')}}"></script>
<script src="{{asset('admin/plugins/simplebar/js/simplebar.min.js')}}"></script>
<script src="{{asset('admin/plugins/metismenu/js/metisMenu.min.js')}}"></script>
<script src="{{asset('admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
<script src="{{asset('admin/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{asset('admin/plugins/bootstrap-material-datetimepicker/js/moment.min.js')}}"></script>
<script src="{{asset('admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js')}}"></script>
<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>

<!--app JS-->
<script src="{{asset('admin/js/myscripts.js')}}"></script>


@yield('js-custom')
<script src="{{asset('admin/js/app.js')}}"></script>
</body>

</html>
