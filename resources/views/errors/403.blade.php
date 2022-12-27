<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{asset('admin/images/favicon-32x32.png')}}" type="image/png" />
    <!-- loader-->
    <link href="{{asset('admin/css/pace.min.css')}}" rel="stylesheet" />
    <script src="{{asset('admin/js/pace.min.js')}}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{asset('admin/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/icons.css')}}" rel="stylesheet">
    <title>Error 403 </title>
</head>

<body>
<!-- wrapper -->
<div class="wrapper">
    <div class="error-404 d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="card py-5">
                <div class="row g-0">
                    <div class="col col-xl-12 text-center">
                        <div class="card-body p-4 text-center">
                            <h1 class="display-1" style="font-size: 150px"><span class="text-primary">4</span><span class="text-danger">0</span><span class="text-success">3</span></h1>
                            <h2 class="font-weight-bold display-4">Forbidden</h2>
                            <div class="mt-5"> <a href="{{url('/')}}" class="btn btn-primary btn-lg px-md-5 radius-30">Go Home</a>
                                <a href="{{url()->previous()}}" class="btn btn-outline-dark btn-lg ms-3 px-md-5 radius-30">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
</div>
<!-- end wrapper -->
<!-- Bootstrap JS -->
<script src="{{asset('admin/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>
