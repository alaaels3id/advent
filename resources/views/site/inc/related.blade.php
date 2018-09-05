<section class="sec-relate-product bg0 p-t-45 p-b-105">
    <div class="container">
        
        <div class="p-b-45"><h3 class="ltext-106 cl5 txt-center">{{ $thetitle }}</h3></div>

        <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="slick2">
                @include('site.inc.getproducts', ['products' => $related])
            </div>
        </div>
    </div>
</section>