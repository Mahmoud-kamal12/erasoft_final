<!-- Partner Logo Section Begin -->
<div class="partner-logo">
    <div class="container">
        <div class="logo-carousel owl-carousel">
            @foreach($setting->partnerbar as $partner)
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="{{asset($partner)}}" alt="">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Partner Logo Section End -->
