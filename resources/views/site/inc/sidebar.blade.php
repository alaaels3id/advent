<!-- Slider -->
<section class="section-slide">
    <div class="wrap-slick1">
        <div class="slick1">
            @forelse(GetSliders() as $slider)
           
            @php
                $image = GetImage($slider->image, '/public/advent/uploads/slider/', '/advent/uploads/slider/');
            @endphp
            
            <div class="item-slick1" style="background-image: url({{ $image }});">
                <div class="container h-full">
                    <div dir="{{ condition('rtl', 'ltr') }}" class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                            <span class="ltext-101 cl2 respon2">{{ text($slider->title, isAuthOrNot()) }}</span>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                            <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">{{ text($slider->subtitle, isAuthOrNot()) }}</h2>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                            <a href="{{ route('shop') }}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                {{ __('cozastore.shopNow') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <div class="text-center">{{ __('cozastore.NoSliders') }}</div>
            @endforelse

        </div>
    </div>
</section>