<!-- Banner -->
@php
    $class = "block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3";
@endphp

<section class="sec-relate-product bg0 p-t-45 p-b-105">
    <div class="container">
        @include('admin.layout.message')
        <div class="p-b-45"><h3 class="ltext-106 cl5 float-r txt-center">{{ __('cozastore.sections') }}</h3></div>

        <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="slick2">
                
                @forelse(DB::table('banners')->get() as $banner)
                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                    @php $banner_name = seourl(text($banner->head, 'en')); @endphp
                    <!-- Block2 -->
                    <div class="block2">
                        <!-- Block1 -->
                        <div class="block1 wrap-pic-w">
                            <img height="250" src="{{ url($root.'/advent/uploads/banners/'.$banner->image) }}" alt="IMG-BANNER">

                            <a href="{{ url($root.'/products/category/i/'.$banner->category_id.'/'.$banner_name) }}" class="{{ $class }}">
                                <div class="block1-txt-child1 flex-col-l">
                                    <span class="block1-name ltext-102 trans-04 p-b-8">{{ text($banner->head, isAuthOrNot()) }}</span>
                                    <span class="block1-info stext-102 trans-04">{{ text($banner->body, isAuthOrNot()) }}</span>
                                </div>

                                <div class="block1-txt-child2 p-b-4 trans-05">
                                    <div class="block1-link stext-101 cl0 trans-09">{{ __('cozastore.discover') }}</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="alert full-w alert-primary text-center"><h3>{{ __('cozastore.NoBanners') }}</h3></div>
                @endforelse
            
            </div>
        </div>
    </div>
</section>