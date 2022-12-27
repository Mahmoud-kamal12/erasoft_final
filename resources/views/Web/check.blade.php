@extends('web.layouts.app')

@section('content')

    @php
        $total = 0;
    @endphp

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
            <form action="{{route('checkout')}}" method="POST" id="check-form" class="checkout-form">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-lg-6">
                        <h4>Biiling Details</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="last"> Name<span>*</span></label>
                                    <input type="text" id="last" name="name">
                                </div>
                                <div class="col-lg-12">
                                    <label for="cun">Country<span>*</span></label>
                                    <input type="text" id="cun" name="country">
                                </div>
                                <div class="col-lg-12">
                                    <label for="street">Street Address<span>*</span></label>
                                    <input type="text" id="street" class="street-first" name="address">
                                </div>
                                <div class="col-lg-12">
                                    <label for="zip">Postcode / ZIP (optional)</label>
                                    <input type="text" id="zip" name="zip">
                                </div>
                                <div class="col-lg-12">
                                    <label for="town">Town / City<span>*</span></label>
                                    <input type="text" id="town" name="city">
                                </div>
                                <div class="col-lg-6">
                                    <label for="email">Email Address<span>*</span></label>
                                    <input type="text" id="email" name="email">
                                </div>
                                <div class="col-lg-6">
                                    <label for="phone">Phone<span>*</span></label>
                                    <input type="text" id="phone" name="phone">
                                </div>
                            </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="place-order">
                            <h4>Your Order</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Product <span>Total</span></li>
                                    @foreach($products as $product)
                                        @php
                                            $sub = $product->quantity * $product->product->price;
                                            $total += $sub;
                                        @endphp

                                        <li class="fw-normal">{{$product->product->name}} x {{$product->quantity}} <span>${{$sub}}</span></li>
                                    @endforeach

                                    <li class="total-price">Total <span>${{$total}}</span></li>
                                </ul>
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Cheque Payment
                                            <input type="radio" id="pc-check" name="payment" value="cash" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            Paypal
                                            <input type="radio" id="pc-paypal" name="payment" value="paypal" disabled>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn" id="check-btn">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Shopping Cart Section End -->


@endsection


@section('custom-css')

@endsection



@section('custom-js')
    <script>
        $(".check-btn").click(function() {
            $('check-form').submit();
        });
    </script>
@endsection
