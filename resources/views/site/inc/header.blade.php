<!-- Header -->
<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">{{ text(GetSettings('siteoffer'), isAuthOrNot()) }}</div>

                <div class="right-top-bar flex-w h-full">
                    <a href="{{ route('faqs') }}" title="{{ __('cozastore.faqs') }}" class="flex-c-m trans-04 p-lr-25">
                        {{ __('cozastore.faqs') }}
                    </a> 

                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('home') }}" title="{{ __('cozastore.home') }}" class="flex-c-m trans-04 p-lr-25">
                                {{ __('cozastore.home') }}
                            </a>
                            
                            <a title="{{ fullname().' Account' }}" href="{{ route('home.profile', $auth->username) }}" class="flex-c-m trans-04 p-lr-25">
                                {{ __('cozastore.my-account') }}
                            </a>
                        @else
                        <a href="{{ route('login') }}" title="{{ __('cozastore.login') }}" class="flex-c-m trans-04 p-lr-25">
                            {{ __('cozastore.login') }}
                        </a>
                        
                        <a href="{{ route('register') }}" title="{{ __('cozastore.register') }}" class="flex-c-m trans-04 p-lr-25">
                            {{ __('cozastore.register') }}
                        </a> 
                        @endauth 
                    @endif
                    
                    @auth
                    <a href="{{ (isAuthOrNot() == 'ar') ? url($root.'/change/lang/en') : url($root.'/change/lang/ar') }}" class="flex-c-m trans-04 p-lr-25">
                        {{ isAuthOrNot() == 'ar' ? 'EN' : 'العربية' }}
                    </a>
                    @endauth
                    <a href="javascript:void(0)" class="flex-c-m trans-04 p-lr-25">
                        {{ __('cozastore.currence') }} :  {{ getCurrence() }}
                    </a>
                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">

                <!-- Logo desktop -->
                <a title="{{ __('cozastore.home') }}" href="{{ $root }}" class="logo">
                    <img src="{{ $root }}/advent/images/icons/logo-01.png" alt="{{ __('cozastore.home') }}">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        
                        <li class="{{ SetActive('home') }}">
                            <a title="{{ __('cozastore.home') }}" href="{{ route('home') }}">{{ __('cozastore.home') }}</a>
                        </li>
                        
                        <li class="{{ SetActive('shop') }}">
                            <a title="{{ __('cozastore.shop') }}" href="{{ route('shop') }}">{{ __('cozastore.shop') }}</a>
                        </li>
                        
                        <li class="{{ SetActive('blog') }}">
                            <a title="{{ __('cozastore.blog') }}" href="{{ route('blog') }}">{{ __('cozastore.blog') }}</a>
                        </li>
                        
                        <li class="{{ SetActive('about-us') }}">
                            <a title="{{ __('cozastore.about-us') }}" href="{{ route('about-us') }}">{{ __('cozastore.about-us') }}</a>
                        </li>
                        
                        <li class="{{ SetActive('contact-us') }}">
                            <a title="{{ __('cozastore.contact-us') }}" href="{{ route('contact-us') }}">{{ __('cozastore.contact-us') }}</a>
                        </li>
                        
                        @auth
                        <li>                                                            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                            <a onclick="event.preventDefault();document.getElementById('logout-form').submit();" title="{{ __('cozastore.logout') }}" href="{{ route('logout') }}">{{ __('cozastore.logout') }}</a>
                        </li>
                        @endauth
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>
                    
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart cartdatanotify" data-notify="{{ count(Cart::instance('default')->content()) }}">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                    <a href="javascript:void(0)" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 datanotifycount icon-header-noti" data-notify="{{ count(Cart::instance('wishlist')->content()) }}">
                        <i class="zmdi zmdi-favorite-outline"></i>
                    </a>
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile" dir="{{ condition('ltr', 'rtl') }}">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a class="pull-right" title="{{ __('cozastore.home') }}" href="{{ route('home') }}">
                <img src="{{ $root }}/advent/images/icons/logo-01.png" alt="{{ __('cozastore.home') }}">
            </a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart cartdatanotify" data-notify="{{ count(Cart::instance('default')->content()) }}">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>

            <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 datanotifycount icon-header-noti" data-notify="{{ count(Cart::instance('wishlist')->content()) }}">
                <i class="zmdi zmdi-favorite-outline"></i>
            </a>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div class="menu-mobile" dir="{{ condition('ltr', 'rtl') }}">
        <ul class="topbar-mobile">
            <li><div class="left-top-bar hidden-xs hidden-sm">{{ text(GetSettings('siteoffer'), isAuthOrNot()) }}</div></li>
            <li>
                <div class="right-top-bar flex-w h-full">
                    
                    <a href="{{ route('faqs') }}" class="flex-c-m p-lr-10 trans-04">
                        {{ __('cozastore.faqs') }}
                    </a>
                    
                    @auth
                    
                        <a href="{{ route('home.profile', $auth->username) }}" class="flex-c-m p-lr-10 trans-04">
                            {{ __('cozastore.my-account') }}
                        </a>
                    
                    @endauth
                        <a href="{{ (isAuthOrNot() == 'ar') ? url('/change/lang/en') : url('/change/lang/ar') }}" class="flex-c-m p-lr-10 trans-04">
                            {{ isAuthOrNot() == 'ar' ? 'EN' : 'AR' }}
                        </a>
                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        {{ __('cozastore.currence') }} :  {{ text(GetSettings('siteCurrence'), isAuthOrNot()) }}
                    </a>
                </div>
            </li>
        </ul>

        <ul class="main-menu-m">
            
            <li class="{{ SetActive('home') }}">
                <a title="{{ __('cozastore.home') }}" href="{{ route('home') }}">
                    {{ __('cozastore.home') }}
                </a>
            </li>
            
            <li class="{{ SetActive('shop') }}">
                <a title="{{ __('cozastore.shop') }}" href="{{ route('shop') }}">
                    {{ __('cozastore.shop') }}
                </a>
            </li>
            
            <li class="{{ SetActive('blog') }}">
                <a title="{{ __('cozastore.blog') }}" href="{{ route('blog') }}">
                    {{ __('cozastore.blog') }}
                </a>
            </li>
            
            <li class="{{ SetActive('about-us') }}">
                <a title="{{ __('cozastore.about-us') }}" href="{{ route('about-us') }}">
                    {{ __('cozastore.about-us') }}
                </a>
            </li>
            
            <li class="{{ SetActive('contact-us') }}">
                <a title="{{ __('cozastore.contact-us') }}" href="{{ route('contact-us') }}">
                    {{ __('cozastore.contact-us') }}
                </a>
            </li>
        </ul>
    </div>
    
    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div dir="{{ condition('rtl', 'ltr') }}" class="container-search-header">
            
            @php 
                $class = 'flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search'; 
                $onkeyup = "filterFunction('myInput1', 'myDropdown1');myFunction('myDropdown1')";
                $placeholder = __('cozastore.search').' '.__('cozastore.products').' ...';
            @endphp
            
            <button onclick="closefunc('myDropdown1')" title="{{ __('cozastore.close') }}" class="{{ $class }}">
                <img src="{{ $root }}/advent/images/icons/icon-close2.png" alt="{{ __('cozastore.close') }}">
            </button>
            
            <div class="dropdown">
                <form class="wrap-search-header flex-w p-l-15">
                    
                    <button class="flex-c-m trans-04"><i class="zmdi zmdi-search"></i></button>
                    
                    <input class="plh3" id="myInput1" onkeyup="{{ $onkeyup }}" type="text" name="search1" placeholder="{{ $placeholder }}">
                    <div id="myDropdown1" class="dropdown-menu w-full" style="max-height: 400px;overflow-y: scroll;">
                        @foreach(GetAllProducts() as $product)
                            <a class="dropdown-item" href="{{ $product->id }}">
                                {{ text(ucfirst($product->name), isAuthOrNot()) }}
                            </a>
                        @endforeach
                    </div>
                </form>
            </div>
        
        </div>
    </div>
    
</header>
@php
    if(!Request::is('/')){
         echo '<br/><br/>';
    }
@endphp

<script type="text/javascript">
    function closefunc(dropdown) { document.getElementById(dropdown).classList.toggle("hidden"); }
</script>