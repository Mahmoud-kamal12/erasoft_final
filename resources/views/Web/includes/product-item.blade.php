<div class="product-item">
    <div class="pi-pic">
        <img src="{{asset($product->main_image)}}" alt="">
        <div class="sale">Sale</div>
        <div class="icon">
            <i class="icon_heart_alt"></i>
        </div>
        <ul>
            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
            <li class="quick-view"><a href="{{route('product' , $product->slug)}}">+ Quick View</a></li>
            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
        </ul>
    </div>
    <div class="pi-text">
        <div class="catagory-name">{{$product->category->name}}</div>
        <a href="#">
            <h5>{{$product->name}}</h5>
        </a>
        <div class="product-price">
            ${{$product->price}}
            <span>${{$product->price}}</span>
        </div>
    </div>
</div>
