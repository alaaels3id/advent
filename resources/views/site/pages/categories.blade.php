@extends('layouts.app')

@section('title', __('cozastore.categories'))

@section('content')

<!-- Product -->
<section class="bg0 p-t-23 p-b-140">
    <div class="container" dir="{{ condition('rtl', 'ltr') }}">
        <br><br><div class="p-b-10"><h3 class="ltext-103 cl5 pull-right">{{ __('cozastore.productOverview') }}</h3></div><br><br>
        
        @include('site.inc.filter', ['no' => 'No'])
        
        <div class="row isotope-grid">
            @forelse($products as $product)
                @php $product_name = seourl(text($product->name, 'en')); @endphp
                @php $classes = 'block2-btn showmodel flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1'; @endphp
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ text(Category()[$product->category_id], 'en') }}">
                    <!-- Block2 -->
                    <div class="block2">
                        
                        <div class="block2-pic hov-img0">
                            <img width="255" height="350" src="{{ $root }}/advent/uploads/products/{{ getJsonImages($product->image)->image0 }}" alt="IMG-PRODUCT">

                            <a href="javascript:void(0)" data-value="{{ GetSettings('siteCurrence', isAuthOrNot()) }}" data-id="{{ $product->id }}" class="{{ $classes }}">
                                {{ __('cozastore.quickview') }}
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="{{ url($root.'/products/i/'.$product->id.'/'.$product_name) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{ text($product->name, isAuthOrNot()) }}
                                </a>
                                <span class="stext-105 cl3">{{ getCurrence($product->price) }}</span>
                                
                                @php
                                    $avg = GetAvg('reviews', 'product_id', $product->id, 'rate');
                                    $count = GetCount('reviews', 'product_id', $product->id, 'user_id');
                                @endphp
                                
                                @if(!empty($avg))
                                    <span class="fs-18 cl11">
                                        @for($i=1; $i <= 5; $i++)
                                            @if($avg >= $i)
                                                <i class="zmdi zmdi-star"></i>
                                            @else
                                                <i class="zmdi zmdi-star-outline"></i>
                                            @endif
                                        @endfor
                                        ({{ $count }})
                                    </span>
                                @else
                                    <span class="fs-18 cl11">
                                        @for($i=1; $i <= 5; $i++)
                                            <i class="zmdi zmdi-star-outline"></i>
                                        @endfor
                                        ({{ $count }})
                                    </span>
                                @endif
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    {!! wishlistButtonSet($product->id) !!}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert text-center alert-info" style="margin:0px auto;margin-bottom: 50px;"><h3>{{ __('cozastore.NoProducts') }}</h3></div>
            @endforelse
        </div> 
    	<div style="{{ condition('margin-right:600px;', 'margin-left:600px;') }}" class="text-center">
            {{ $products->appends(Request::except('page'))->render() }}
        </div>
    </div>
</section>
@include('site.inc.model')
@stop