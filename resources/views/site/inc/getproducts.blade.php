
@forelse($products as $product)

@php 
    $classes = 'block2-btn showmodel flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1';
    $product_name = seoUrl(text($product->name, 'en'));
    $img0 = $root.'/advent/uploads/products/'.getJsonImages($product->image)->image0;
@endphp

<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ text(Category()[$product->category_id], 'en') }}">  
    <!-- Block2 -->
    <div class="block2">
        <div class="block2-pic hov-img0">
            @if(getJsonImages($product->image) != null)
                <img height="411" src="{{ $img0 }}" alt="IMG-PRODUCT">
            @endif
            <a href="javascript:void(0)" data-qty="{{ $product->qtn }}" 
                data-value="{{ getCurrence() }}" data-id="{{ $product->id }}" data-name="{{ text($product->name, 'en') }}" data-price="{{ $product->price }}" class="{{ $classes }}">{{ __('cozastore.quickview') }}
            </a>
        </div>

        <div class="block2-txt flex-w flex-t p-t-14">
            {{-- Name And Price --}}
            <div class="block2-txt-child1 flex-col-l">
                <a href="{{ url($root.'/products/i/'.$product->id.'/'.$product_name) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                    {{ text($product->name, isAuthOrNot()) }}
                </a>
                <span class="stext-105 cl3">
                    {{ getCurrence($product->price) }}
                </span>
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
        </div>
    </div>
</div>

@empty            
<div class="alert text-center alert-info" style="margin:0px auto;margin-bottom: 50px;">
    <h3>{{ __('cozastore.NoProducts') }}</h3>
</div>
@endforelse