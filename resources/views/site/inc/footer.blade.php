<!-- Footer -->
<footer class="bg3 p-t-75 p-b-32">
    <div class="container">
        <div class="row">
            @php $class = 'stext-107 cl7 hov-cl1 trans-04'; @endphp
            @php $social = 'fs-18 cl7 hov-cl1 trans-04 m-r-16'; @endphp
            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">{{ __('cozastore.sections') }}</h4>
                <ul>
                    @forelse(Category() as $key => $value)
                    <li class="p-b-10">
                        <a href="{{ url('/products/category/i/'.$key.'/'.text($value, 'en')) }}" class="{{ $class }}">
                            {{ ucfirst(text($value, isAuthOrNot())) }}
                        </a>
                    </li>
                    @empty
                        <li>
                            <div class="text-center">{{ __('cozastore.NoCategories') }}</div>
                        </li>
                    @endforelse
                </ul>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">{{ __('cozastore.help') }}</h4>
                <ul>
                    <li class="p-b-10"><a href="{{ route('cart.index') }}" class="{{ $class }}">{{ __('cozastore.track') }}</a></li>
                    <li class="p-b-10"><a href="#" class="{{ $class }}">{{ __('cozastore.giveback') }}</a></li>
                    <li class="p-b-10"><a href="{{ route('shop') }}" class="{{ $class }}">{{ __('cozastore.shop') }}</a></li>
                    <li class="p-b-10"><a href="{{ route('faqs') }}" class="{{ $class }}">{{ __('cozastore.faqs') }}</a></li>
                </ul>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">{{ __('cozastore.keepconected') }}</h4>
                <p class="stext-107 cl7 size-201 text-justify">{{ text(GetSettings('siteSmallDis'), isAuthOrNot()) }}</p>

                <div class="p-t-27">
                    <a href="{{ GetSettings('facebook') }}" class="{{ $social }}"><i class="fa fa-facebook"></i></a>
                    <a href="{{ GetSettings('instagram') }}" class="{{ $social }}"><i class="fa fa-instagram"></i></a>
                    <a href="{{ GetSettings('pinterest') }}" class="{{ $social }}"><i class="fa fa-pinterest-p"></i></a>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">{{ __('cozastore.newslatter') }}</h4>
                <form>
                    <div class="wrap-input1 w-full p-b-4">
                        <input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
                        <div class="focus-input1 trans-04"></div>
                    </div>
                    <div class="p-t-18">
                        <button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                            {{ __('cozastore.subscribe') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="p-t-40">
            <p class="stext-107 cl6 txt-center">{{ __('cozastore.copyrights').' '.date('Y') }}</p>
        </div>
    </div>
</footer>

<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
    <span class="symbol-btn-back-to-top">
        <i class="zmdi zmdi-chevron-up"></i>
    </span>
</div>
                        
@include('site.inc.javascript')