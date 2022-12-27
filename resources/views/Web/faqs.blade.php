@extends('web.layouts.app')

@section('content')

    <!-- Faq Section Begin -->
    <div class="faq-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="faq-accordin">
                        <div class="accordion" id="accordionExample">
                            @php $test = true; @endphp
                            @foreach($setting->faqs as $index => $faq)
                                <div class="card">
                                <div class="card-heading @if($test) active @endif">
                                    <a class="@if($test) active @endif" data-toggle="collapse" data-target="#collapseOne{{$index}}">
                                        {{$faq['faq_q']}}
                                    </a>
                                </div>
                                <div id="collapseOne{{$index}}" class="collapse @if($test) show @endif" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>{{$faq['faq_a']}}</p>
                                    </div>
                                </div>
                            </div>
                                @php $test = false; @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Faq Section End -->



@endsection


@section('custom-css')

@endsection



@section('custom-js')

@endsection
