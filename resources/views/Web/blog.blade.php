@extends('web.layouts.app')

@section('content')
    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 order-1 order-lg-2">
                    <div class="row">
                        @foreach($blogs as $blog)
                        <div class="col-lg-6 col-sm-6">
                            <div class="blog-item">
                                <div class="bi-pic">
                                    <img src="{{$blog->image}}" alt="">
                                </div>
                                <div class="bi-text">
                                    <a href="#">
                                        <h4>{{$blog->title}}</h4>
                                    </a>

                                    <p> <span> {{\Carbon\Carbon::parse($blog->date)->format('M d, Y')}}</span></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-lg-12">
                            <div class="loading-more d-flex justify-content-center">
                                {{$blogs->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection


@section('custom-css')
@endsection



@section('custom-js')
@endsection
