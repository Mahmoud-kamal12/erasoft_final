@extends('web.layouts.app')

@section('content')


    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="filter-widget">
                        <h4 class="fw-title">Categories</h4>
                        <ul class="filter-catagories">
                            @foreach($categories as $category)
                                <li><a href="?category={{$category->slug}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="{{asset($product->main_image)}}" alt="">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    @foreach($product->images as $mage)
                                        <div class="pt " data-imgbigurl="{{asset($mage)}}"><img
                                                src="{{asset($mage)}}" alt=""></div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <h3>{{$product->name}}</h3>
                                    <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                                </div>
                                <div class="pd-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span>(5)</span>
                                </div>

                                <div class="pd-desc">
                                    <p>{{$product->short_description}}</p>
                                    <h4>${{$product->price}} <span>${{$product->price}}</span></h4>
                                </div>
                                <div class="quantity">
                                    @if(auth()->guard('web')->user())
                                        <form action="{{route('addtocart' , $product->id)}}" method="POST">
                                            @method('POST')
                                            @csrf
                                            <div class="pro-qty">
                                                <input type="number" min="1" max="{{$product->quantity}}" value="1" name="quantity">
                                            </div>
                                            <button type="submit" class="primary-btn pd-cart">Add To Cart</button>
                                        </form>
                                    @else
                                        <div class="pro-qty">
                                            <input type="number" min="1" max="{{$product->quantity}}" value="1" name="quantity">
                                        </div>
                                        <a href="{{route('loginForm')}}" class="primary-btn pd-cart" >Add To Cart</a>
                                    @endif
                                </div>

                                <ul class="pd-tags">
                                    <li><span>CATEGORY</span>{{$product->category->name}}</li>
                                </ul>
                                <div class="pd-share">
                                    <div class="p-code">Sku : {{$product->quantity}}</div>
                                    <div class="pd-social">
                                        <a href="#"><i class="ti-facebook"></i></a>
                                        <a href="#"><i class="ti-twitter-alt"></i></a>
                                        <a href="#"><i class="ti-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-tab">

                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#tab-DESCRIPTION" role="tab">DESCRIPTION</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-SPECIFICATIONS" role="tab">SPECIFICATIONS</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-Reviews" role="tab">Customer Reviews (02)</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-DESCRIPTION" role="tabpanel">
                                    <div class="product-content">
                                        <div class="row">
                                            {!! $product->long_description !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-SPECIFICATIONS" role="tabpanel">
                                    <div class="specification-table">
                                        <table>
                                            @foreach($product->specifications as $specification )
                                                <tr>
                                                    <td class="p-catagory">{{$specification['key']}}</td>
                                                    <td>
                                                        {{$specification['value']}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-Reviews" role="tabpanel">
                                    <div class="customer-review-option">
                                        <h4>{{$reviews->total()}} Comments</h4>
                                        <div class="comment-option">
                                            @foreach($reviews as $review)
                                                <div class="co-item">
                                                    <div class="avatar-pic">
                                                        <img src="{{asset('web/img/product-single/avatar-1.png')}}" alt="">
                                                    </div>
                                                    <div class="avatar-text">
                                                        <div class="at-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <h5>{{$review->user->name}} <span>{{\Carbon\Carbon::parse($review->created_at)->format('d M Y')}}</span></h5>
                                                        <div class="at-reply">{{$review->body}}</div>
                                                    </div>
                                                </div>

                                            @endforeach
                                        </div>
                                        <div class="leave-comment">
                                            <h4>Leave A Comment</h4>
                                            <form action="#" class="comment-form">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <textarea placeholder="Messages" name="body"></textarea>
                                                        <button type="submit" class="site-btn">Send message</button>
                                                    </div>
                                                </div>
                                            </form>

                                            <div class="d-flex justify-content-center">
                                                {{$reviews->links()}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Related Products Section End -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($product->category->products->take(4) as $oneProduct)
                    <div class="col-lg-3 col-sm-6">
                        @include('Web.includes.product-item' , ['product' => $oneProduct])
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Related Products Section End -->



@endsection


@section('custom-css')

@endsection



@section('custom-js')

@endsection
