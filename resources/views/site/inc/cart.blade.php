<!-- Cart -->
<div class="wrap-header-cart js-panel-cart">
	<div class="s-full js-hide-cart"></div>

	<div class="header-cart flex-col-l p-l-65 p-r-25">
		<div class="header-cart-title flex-w flex-sb-m p-b-8">
			<span class="mtext-103 cl2">{{ __('cozastore.yourCart') }}</span>

			<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
				<i class="zmdi zmdi-close"></i>
			</div>
		</div>
		
		<div class="w-full header-cart-content flex-w js-pscroll">
			<ul class="cartShowModel header-cart-wrapitem w-full">

			</ul>
		</div>
		<div class="w-full">
			<div dir="{{ condition('rtl', 'ltr') }}" class="header-cart-total w-full p-tb-40">
				{{ __('cozastore.total') }} : <span class="getTotal"></span>
			</div>

			<div class="header-cart-buttons flex-w w-full">
				<a href="{{ route('cart.index') }}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
					{{ __('cozastore.viewCart') }}
				</a>

				<button onclick="checkout();" class="checkout flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
					{{ __('cozastore.checkOut') }}
				</button>
			</div>
		</div>
	</div>
</div>