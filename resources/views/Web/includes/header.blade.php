<!-- Header Section Begin -->
<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="ht-left">
                <div class="mail-service">
                    <i class="fa fa-envelope"></i>
                    {{$setting->email}}
                </div>
                <div class="phone-service">
                    <i class=" fa fa-phone"></i>
                    {{$setting->phone}}
                </div>
            </div>
            <div class="ht-right">
                @if(auth()->guard('web')->user())
                    <a href="{{route('logout')}}" class="login-panel"><i class="fa fa-sign-out"></i>Logout</a>
                @else
                    <a href="{{route('loginForm')}}" class="login-panel"><i class="fa fa-user"></i>Login</a>
                @endif

                <div class="lan-selector">
                    <select class="language_drop" name="countries" id="countries" style="width:300px;">
                        <option value='yt' data-image="{{asset('web/img/flag-1.jpg')}}" data-imagecss="flag yt"
                                data-title="English">English</option>
                    </select>
                </div>
                <div class="top-social">
                    <a href="{{$setting->facebook}}"><i class="ti-facebook"></i></a>
                    <a href="{{$setting->twitter}}"><i class="ti-twitter-alt"></i></a>
                    <a href="{{$setting->instagram}}"><i class="ti-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="">
                            <img src="{{asset($setting->logo)}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="advanced-search">
                        <div class="input-group">
                            <input type="text" placeholder="What do you need?">
                            <button type="button"><i class="ti-search"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 text-right col-md-3">
                    @if(auth()->guard('web')->user())
                    <ul class="nav-right">
                        <li class="heart-icon">
                            <a href="#">
                                <i class="icon_heart_alt"></i>
                                <span>1</span>
                            </a>
                        </li>
                        <li class="cart-icon">
                            <a href="{{route('cart')}}">
                                <i class="icon_bag_alt"></i>
                                <span>3</span>
                            </a>
                        </li>
                        <li class="cart-price">$150.00</li>
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="nav-item">
        <div class="container">
            <div class="nav-depart">
                <div class="depart-btn">
                    <i class="ti-menu"></i>
                    <span>All Categories</span>
                    <ul class="depart-hover">
                        @foreach($categories as $category)
                            <li class="active"><a href="{{route('shop')}}?category={{$category->slug}}">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <nav class="nav-menu mobile-menu">
                <ul>
                    <li class="@if($page == '' or $page == 'home') active @endif"><a href="{{route('home')}}">Home</a></li>
                    <li class="@if($page == 'shop') active @endif"><a  href="{{route('shop')}}">Shop</a></li>
                    <li><a class="@if($page == 'blog') active @endif" href="{{route('blog')}}">Blog</a></li>
                    <li><a class="@if($page == 'faqs') active @endif" href="{{route('faqs')}}">FAQs</a></li>
                    <li><a class="@if($page == 'contact') active @endif" href="{{route('contact')}}">Contact</a></li>

                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>
<!-- Header End -->
