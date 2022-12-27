@extends('web.layouts.app')

@section('content')
    @php
        $total = 0;
    @endphp
    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th class="p-name">Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th><i class="ti-close"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                @php
                                    $sub = $product->quantity * $product->product->price;
                                    $total += $sub;
                                @endphp
                                <tr>
                                <td class="cart-pic first-row"><img width="150" height="150" src="{{asset($product->product->main_image)}}" alt=""></td>
                                <td class="cart-title first-row">
                                    <h5>{{$product->product->name}}</h5>
                                </td>
                                <td class="p-price first-row">${{$product->product->price}}</td>
                                <td class="qua-col first-row">
                                    <div class="quantity" style="justify-content: left;">
                                        <div class="pro-qty">
                                            <input type="text" value="{{$product->quantity}}"  id="quantity{{$product->id}}" class="quantity-row">
                                        </div>
                                        <i class="fa fa-cloud-upload quantity-row" data-url="{{route('updatecart')}}" data-cart="{{$product->id}}" style="font-size: 40px;margin-left: 20px;cursor: pointer;"></i>
                                    </div>
                                </td>
                                <td class="total-price first-row">${{$sub}}</td>
                                <td class="close-td first-row remove-row" data-row="{{$product->id}}" data-url="{{route('removecart')}}"><i class="ti-close"></i></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="discount-coupon">
                                <h6>Discount Codes</h6>
                                <form action="#" class="coupon-form">
                                    <input type="text" placeholder="Enter your codes">
                                    <button type="submit" class="site-btn coupon-btn">Apply</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="cart-total">Total <span>${{$total}}</span></li>
                                </ul>
                                <a href="{{route('check')}}" class="proceed-btn">PROCEED TO CHECK OUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->



@endsection


@section('custom-css')

@endsection



@section('custom-js')
    <script>
        $(".quantity-row").click(function(){

            let id = $(this).data('cart');
            let q = $(`#quantity${id}`).val()
            let url = $(this).data('url')
            $.ajax({
                "method": "POST",
                "data" : {"quantity":q,"cart":id},
                "url": url,
                success:function (res) {

                },
                error:function (xhr,ststus,error) {
                }
            });

        });

        $(".remove-row").click(function(){

            let id = $(this).data('row');
            let url = $(this).data('url')
            let that = $(this);
            $.ajax({
                "method": "POST",
                "data" : {"cart":id},
                "url": url,
                success:function (res) {
                    that.parentsUntil('tbody').remove();
                },
                error:function (xhr,ststus,error) {
                }
            });

        });
    </script>
@endsection
