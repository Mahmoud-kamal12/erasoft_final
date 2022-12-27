<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashion Template">
    <meta name="keywords" content="Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fashion</title>
    <meta name="csrf-token" content="{!!  csrf_token() !!}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('web/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web/css/themify-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web/css/style.css')}}" type="text/css">
    @yield('custom-css')
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

@include('web.includes.header')

@yield('content')

@include('web.includes.partner')

@include('web.includes.footer')

<!-- Js Plugins -->
<script src="{{asset('web/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('web/js/bootstrap.min.js')}}"></script>
<script src="{{asset('web/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('web/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('web/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('web/js/jquery.zoom.min.js')}}"></script>
<script src="{{asset('web/js/jquery.dd.min.js')}}"></script>
<script src="{{asset('web/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('web/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('web/js/main.js')}}"></script>
<script>
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),}});
</script>
@yield('custom-js')

</body>

</html>
