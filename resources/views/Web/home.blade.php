@extends('web.layouts.app')

@section('content')

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            @foreach($setting->header as $index => $header)
                <div class="single-hero-items set-bg" data-setbg="{{asset($header['cover'])}}">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5">
                                <span>{{$header['hint']}}</span>
                                <h1>{{$header['title']}}</h1>
                                <p>{{$header['description']}}</p>
                                <a href="#" class="primary-btn">Shop Now</a>
                            </div>
                        </div>
                        <div class="off-card">
                            <h2>Sale <span>{{$header['sale']}}%</span></h2>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
        @foreach($categories as $category)
            @if($category->enable)
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="{{asset($category->cover)}}" alt="">
                        <div class="inner-text">
                            <h4>{{$category->name}}</h4>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
            </div>
        </div>
    </div>
    <!-- Banner Section End -->
@foreach($categories as $index => $category)
    @if($category->products->count() > 0)
        @if($index % 2 ===0)
            <!-- Women Banner Section Begin -->
            <section class="women-banner spad">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="product-large set-bg" data-setbg="{{asset($category->slider_image)}}">
                                <h2>{{$category->name}}</h2>
                                <a href="#">Discover More</a>
                            </div>
                        </div>
                        <div class="col-lg-8 offset-lg-1">
                            <div class="filter-control">
                                <ul>
                                    <li class="active">Best Seller</li>
                                </ul>
                            </div>
                            <div class="product-slider owl-carousel">
                                @foreach($category->products->take(10) as $product)
                                    @include('Web.includes.product-item' , ['product' => $product])
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Women Banner Section End -->
        @else
            <!-- Man Banner Section Begin -->
            <section class="man-banner spad">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="filter-control">
                                <ul>
                                    <li class="active">Best Seller</li>
                                </ul>
                            </div>
                            <div class="product-slider owl-carousel">
                                @foreach($category->products->take(10) as $product)
                                    @include('Web.includes.product-item' , ['product' => $product])
                                @endforeach

                            </div>
                        </div>
                        <div class="col-lg-3 offset-lg-1">
                            <div class="product-large set-bg m-large" data-setbg="{{asset($category->slider_image)}}">
                                <h2>{{$category->name}}</h2>
                                <a href="#">Discover More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Man Banner Section End -->
        @endif

    @endif

@endforeach



    <!-- Deal Of The Week Section Begin-->
    @if(\Carbon\Carbon::parse($setting?->deal['until'])->greaterThan(\Carbon\Carbon::now()) && $setting?->deal['status'])
        <section class="deal-of-week set-bg spad mb-5" data-setbg="{{$setting?->deal['cover']}}">
            <div class="container">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h2>{{$setting?->deal['title']}}</h2>
                        <p>{{$setting?->deal['description']}}</p>
                        <div class="product-price">
                            ${{$setting?->deal['price']}}
                            <span>/ {{$setting?->deal['product_id']}} @productname($setting?->deal['product_id'])</span>
                        </div>
                    </div>
                    <div class="countdown-timer" id="countdown" data-date="{{\Carbon\Carbon::parse($setting?->deal['until'])->format('Y/m/d H:m:s')}}">
                        <div class="cd-item">
                            <span>20</span>
                            <p>Days</p>
                        </div>
                        <div class="cd-item">
                            <span>10</span>
                            <p>Hrs</p>
                        </div>
                        <div class="cd-item">
                            <span>50</span>
                            <p>Mins</p>
                        </div>
                        <div class="cd-item">
                            <span>40</span>
                            <p>Secs</p>
                        </div>
                    </div>
                    <a href="#" class="primary-btn">Shop Now</a>
                </div>
            </div>
        </section>
    @endif
    <!-- Deal Of The Week Section End -->


    <!-- Instagram Section Begin -->
    <div class="instagram-photo">
        @foreach($setting->instagrambar as $insta)
        <div class="insta-item set-bg" data-setbg="{{asset($insta)}}">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        @endforeach
    </div>
    <!-- Instagram Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach(\App\Models\Blog::all()->take(3)->random()->get() as $blog)
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="{{asset($blog->image)}}" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    {{\Carbon\Carbon::parse($blog->date)->format('M d, Y')}}
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    {{$blog->reviews->count()}}
                                </div>
                            </div>
                            <a href="#">
                                <h4>{{$blog->title}}k</h4>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="{{asset('web/img/icon-1.png')}}" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Free Shipping</h6>
                                <p>For all order over 99$</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="{{asset('web/img/icon-2.png')}}" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Delivery On Time</h6>
                                <p>If good have prolems</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="{{asset('web/img/icon-1.png')}}" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Secure Payment</h6>
                                <p>100% secure payment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->

@endsection
