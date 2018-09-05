<!-- Product -->
<section class="bg0 p-t-23 p-b-140">
    <div class="container" dir="{{ condition('rtl', 'ltr') }}">
        <br><br><div class="p-b-10"><h3 class="ltext-103 cl5 pull-right">{{ __('cozastore.productOverview') }}</h3></div><br><br>
        
        @include('site.inc.filter')
        
        <div class="row isotope-grid">
            
            @include('site.inc.getproducts', ['products' => $products])
        
        </div>
        <div style="margin-{{ condition('right', 'left') }}:600px;" class="text-center">{{ $products->render() }}</div>

        @if(!isset($thetitle)) 
            <br><br><br><br><br><br>
            <div class="flex-c-m flex-w w-full p-t-45">
                @php $class_ = 'flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04'; @endphp
                <a href="{{ route('shop') }}" class="{{ $class_ }}">{{ __('cozastore.more') }}</a>
            </div>
        @endif
    </div>
</section>
@php

/* 
    SELECT `products`.*, AVG(reviews.rate) as avg, reviews.product_id 
    FROM `reviews` 
    LEFT JOIN `products` 
    ON `products`.`id` = `reviews`.`product_id` 
    GROUP BY `id` 
    HAVING avg >= 4;
*/
    $mostReviews = DB::table('reviews as r')->leftjoin('products as p', 'p.id', '=', 'r.product_id')
    ->select('p.*', DB::raw('AVG(r.rate) as avg'))->havingRaw('avg >= 4')->groupBy('id')->get();
@endphp
        
<!-- Related Products -->
<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15"></div>
@include('site.inc.related', ['related' => $mostReviews, 'thetitle' => __('cozastore.mostReviews')])
@include('site.inc.model')