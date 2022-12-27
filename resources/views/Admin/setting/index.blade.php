@extends('admin.layouts.app')

@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">User Profile</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="#"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('admin.profile.update' ,$admin->id)}}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="{{asset('admin/images/avatars/avatar-2.png')}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                    <div class="mt-3">
                                        <label>
                                        Name :    <input class="user_name" name="name" value="{{$admin->name}}" />
                                        </label>

                                        <label>
                                        Email :    <input class="user_name mt-3" name="user_email" value="{{$admin->email}}" />
                                        </label>

                                    </div>
                                </div>
                                <h5 class='text-center mt-5 font-weight-bold text-danger'>General Setting</h5>
                                <ul class="list-group list-group-flush">

                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Twitter</h6>
                                        <label>
                                            <input name="twitter" class="text-secondary site_link" value="{{$setting?->twitter  ?? 'twitter' }}" />
                                        </label>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Instagram</h6>
                                        <label>
                                            <input name="instagram" class="text-secondary site_link" value="{{$setting?->instagram ?? 'instagram' }}" />
                                        </label>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Facebook</h6>
                                        <label>
                                            <input name="facebook" class="text-secondary site_link" value="{{$setting?->facebook ?? 'facebook' }}" />
                                        </label>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">E-Mail</h6>
                                        <label>
                                            <input name="email" class="text-secondary site_link" value="{{$setting?->email ?? 'email' }}" />
                                        </label>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Address</h6>
                                        <label>
                                            <input name="address" class="text-secondary site_link" value="{{$setting?->address ?? 'address' }}" />
                                        </label>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Phone</h6>
                                        <label>
                                            <input name="phone" class="text-secondary site_link" value="{{$setting?->phone ?? 'phone' }}" />
                                        </label>
                                    </li>


                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Subject</h6>
                                        <label>
                                            <input name="subject" class="text-secondary site_link" value="{{$setting?->subject ?? 'subject' }}" />
                                        </label>
                                    </li>


                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Contact Us</h6>
                                        <label>
                                            <input name="contact_us" class="text-secondary site_link" value="{{$setting?->contact_us ?? 'contact_us' }}" />
                                        </label>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Web Logo </h6>
                                        <label>
                                            <input class="form-control" type="file" id="formFile" name="logo" style="width: 109px;">
                                        </label>
                                    </li>

                                </ul>

                                <div class="row mt-5 text-center">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary mt-2">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('admin.profile.changepass' ,$admin->id)}}" method="post">
                                @method('POST')
                                @csrf
                                <h5 class=" mb-4 text-center">Change Password</h5>

                                <div class="row mb-3">

                                    <div class="col-sm-12 text-secondary">
                                        <input type="text" name="old_password" class="form-control" placeholder="Old Password"/>
                                    </div>
                                </div>

                                <div class="row mb-3">

                                    <div class="col-sm-12 text-secondary">
                                        <input type="text" name="password" class="form-control" placeholder="New Password" />
                                    </div>
                                </div>

                                <div class="row mb-3">

                                    <div class="col-sm-12 text-secondary">
                                        <input type="text" name="password_confirmation" class="form-control" placeholder="Confirm Password" />
                                    </div>
                                </div>

                                <div class="row mt-3 text-center">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary mt-2">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                <div class="col-lg-8">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <form action="{{route('admin.profile.deal')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="card-body">

                                        <h5 class=" mb-4 text-center">Deal Details</h5>

                                        <div class="row mb-3">
                                            <div class="col-sm-2">
                                                <h6 class="mb-0">Title</h6>
                                            </div>
                                            <div class="col-sm-10 text-secondary">
                                                <input type="text" name="title" class="form-control" value="{{$setting?->deal['title']}}" />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-2">
                                                <h6 class="mb-0">Description</h6>
                                            </div>
                                            <div class="col-sm-10 text-secondary">
                                                <input type="text" name="description" class="form-control" value="{{$setting?->deal['description']}}" />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-2">
                                                <h6 class="mb-0">Price</h6>
                                            </div>
                                            <div class="col-sm-4 text-secondary">
                                                <input type="number" name="price" class="form-control" value="{{$setting?->deal['price']}}" min="0" step="0.01"/>
                                            </div>

                                            <div class="col-sm-2">
                                                <h6 class="mb-0">Enable Deal</h6>
                                            </div>
                                            <div class="col-sm-4 text-secondary">
                                                <select name="status" class="single-select">
                                                    <option value="1" @if($setting?->deal['status']) selected @endif>Enable</option>
                                                    <option value="0" @if(!$setting?->deal['status']) selected @endif>Disable</option>
                                                </select>

                                            </div>


                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-2">
                                                <h6 class="mb-0">Until</h6>
                                            </div>
                                            <div class="col-sm-10 text-secondary">
                                                <input name="until" value="{{$setting?->deal['until']}}" class="result form-control" type="text" id="date-time" placeholder="Date Picker...">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-2">
                                                <h6 class="mb-0">Product</h6>
                                            </div>
                                            <div class="col-sm-10 text-secondary">
                                                <select name="product_id" class="single-select">
                                                    <option value="" selected disabled>Select Product</option>
                                                    @foreach($products as $product)
                                                        <option value="{{$product->id}}" @if($setting?->deal['product_id'] == $product->id) selected @endif >{{$product->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-2">
                                                <h6 class="mb-0">Cover</h6>
                                            </div>
                                            <div class="col-sm-10 text-secondary">
                                                <input class="form-control" type="file" id="formFile" name="cover">
                                            </div>
                                        </div>


                                        <div class="row text-center">
                                            <div class="col-sm-12 text-center text-secondary">
                                                <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <form action="{{route('admin.profile.faqs')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="card-body">

                                        <h5 class=" mb-4 text-center">faqs</h5>
                                        <button type="button" class="btn btn-primary mb-4 text-center" id="add_faq">+</button>

                                        @if(count($setting?->faqs))
                                            <div id="faqs_body">
                                                @foreach($setting?->faqs as $index => $faq)
                                                    @php
                                                        $index -= 100000;
                                                    @endphp

                                                        <div class="row mb-3">
                                                            <div class="col-sm-2">
                                                                <h6 class="mb-0">Questions</h6>
                                                            </div>
                                                            <div class="col-sm-10 text-secondary">
                                                                <input type="text" name="faqs[{{$index}}][faq_q]" class="form-control" value="{{$faq['faq_q']}}" />
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <div class="col-sm-2">
                                                                <h6 class="mb-0">Answers</h6>
                                                            </div>
                                                            <div class="col-sm-10 text-secondary">
                                                                <input type="text" name="faqs[{{$index}}][faq_a]" class="form-control" value="{{$faq['faq_a']}}" />
                                                            </div>
                                                        </div>

                                                        <hr class="mt-2">
                                                @endforeach
                                            </div>

                                        @else
                                            <div id="faqs_body">

                                            </div>
                                        @endif
                                        <div class="row text-center">
                                            <div class="col-sm-12 text-center text-secondary">
                                                <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <form action="{{route('admin.profile.insta')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="card-body">
                                        <h5 class=" mb-4 text-center">Instagram Bar </h5>
                                        <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Instagram Bar Photos</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input class="form-control" type="file" name="images[]" id="formFileMultiple" multiple>
                                                </div>
                                            </div>
                                        <div class="row text-center">
                                            <div class="col-sm-12 text-center text-secondary">
                                                <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <form action="{{route('admin.profile.partner')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="card-body">
                                        <h5 class=" mb-4 text-center">Partner Bar </h5>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Partner Bar Photos</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input class="form-control" type="file" name="images[]" id="formFileMultiple" multiple>
                                            </div>
                                        </div>
                                        <div class="row text-center">
                                            <div class="col-sm-12 text-center text-secondary">
                                                <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <form action="{{route('admin.profile.header')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="card-body">

                                        <h5 class=" mb-4 text-center">Headers</h5>
                                        <button type="button" class="btn btn-primary mb-4 text-center" id="add_header">+</button>

                                        @if($setting?->header)
                                            <div id="header_body">
                                                @foreach($setting?->header as $index => $header)
                                                @php
                                                    $index -= 100000;
                                                @endphp
                                                    <div class="row mb-3">
                                                        <div class="col-sm-2">
                                                            <h6 class="mb-0">Title</h6>
                                                        </div>
                                                        <div class="col-sm-10 text-secondary">
                                                            <input type="text" name="headers[{{$index}}][title]" class="form-control" value="{{$header['title']}}" />
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-sm-2">
                                                            <h6 class="mb-0">Hint</h6>
                                                        </div>
                                                        <div class="col-sm-10 text-secondary">
                                                            <input type="text" name="headers[{{$index}}][hint]" class="form-control" value="{{$header['hint']}}" />
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-sm-2">
                                                            <h6 class="mb-0">Sale</h6>
                                                        </div>
                                                        <div class="col-sm-10 text-secondary">
                                                            <input type="number" name="headers[{{$index}}][sale]" class="form-control" value="{{$header['sale']}}" />
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-sm-2">
                                                            <h6 class="mb-0">Description</h6>
                                                        </div>
                                                        <div class="col-sm-10 text-secondary">
                                                            <input type="text" name="headers[{{$index}}][description]" class="form-control" value="{{$header['description']}}" />
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-sm-2">
                                                            <h6 class="mb-0">Cover</h6>
                                                        </div>
                                                        <div class="col-sm-10 text-secondary">
                                                            <input class="form-control" type="file" id="formFile" name="headers[{{$index}}][cover]">
                                                        </div>
                                                    </div>

                                                    <hr class="my-2">



                                            @endforeach
                                            </div>
                                        @else
                                            <div id="header_body">


                                            </div>
                                        @endif
                                        <div class="row text-center">
                                            <div class="col-sm-12 text-center text-secondary">
                                                <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

@section('css-custom')
    <style>
        .user_name{
            margin: 0 auto;
            text-align: center;
            border: none;
            outline: none;
            border-bottom: inset;
            font-size: 19px;
        }
        .site_link{
            text-align: right;
            margin: 0;
            border: none;
            outline: none;
            border-bottom: inset;
            float: right;
        }
    </style>
@endsection

@section('js-custom')
    <script>
        var i = 100000;

        $(document).on('click' , '#add_faq' , function (e){
            e.preventDefault();
            let line = i === 100000 ? '' : '<hr class="my-2">';

            $("#faqs_body").append(`

                ${line}

                <div class="row mb-3">
                    <div class="col-sm-2">
                        <h6 class="mb-0">Questions</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                        <input type="text" name="faqs[${i}][faq_q]" class="form-control" value="" />
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-2">
                        <h6 class="mb-0">Answers</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                        <input type="text" name="faqs[${i}][faq_a]" class="form-control" value="" />
                    </div>
                </div>

            `);
            i++
        })

        $(document).on('click' , '#add_header' , function (e){
            e.preventDefault();
                let line = i === 100000 ? '' : '<hr class="my-2">';

            $("#header_body").append(`

                ${line}

                <div class="row mb-3">
                    <div class="col-sm-2">
                        <h6 class="mb-0">Title</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                        <input type="text" name="headers[${i}][title]" class="form-control" value="" />
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-2">
                        <h6 class="mb-0">Hint</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                        <input type="text" name="headers[${i}][hint]" class="form-control" value="" />
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-2">
                        <h6 class="mb-0">Sale</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                        <input type="number" name="headers[${i}][sale]" class="form-control" value="" />
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-2">
                        <h6 class="mb-0">Description</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                        <input type="text" name="headers[${i}][description]" class="form-control" value="" />
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-2">
                        <h6 class="mb-0">Cover</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                        <input class="form-control" type="file" id="formFile2" name="headers[${i}][cover]">
                    </div>
                </div>

            `);
            i++
        })


    </script>
@endsection
