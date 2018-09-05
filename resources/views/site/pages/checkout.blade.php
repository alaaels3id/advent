@extends('layouts.app')

@section('title', '|'.__('cozastore.checkout'))

@section('content')
<!-- breadcrumb -->
<br><br><br>
<div class="container" dir="{{ condition('rtl', 'ltr') }}">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="{{ route('home') }}" class="stext-109 cl8 hov-cl1 trans-04">
            {{ __('cozastore.home') }}
            <i class="fa fa-angle-{{ condition('left', 'right') }} m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        <a href="{{ route('cart.index') }}" class="stext-109 cl8 hov-cl1 trans-04">
            {{ __('cozastore.shoppingcart') }}
            <i class="fa fa-angle-{{ condition('left', 'right') }} m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        <span class="stext-109 cl4">
        	{{ __('cozastore.checkout') }}
        </span>
    </div>
</div>
<br><br><br>
<div class="container">

	<div class="row">
		
		<div class="col-md-9" dir="{{ condition('rtl', 'ltr') }}">
		    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
		        <h4 class="mtext-109 cl2 p-b-30" dir="{{ condition('rtl', 'ltr') }}">{{ __('cozastore.carttotal') }}</h4>
		        <div class="flex-w flex-t bor12 p-b-13"></div>

		        <div class="flex-w flex-t bor12 p-t-15 p-b-30">
		            <div class="size-209 p-r-18 p-r-0-sm w-full-ssm pull-left">

		                <div class="p-t-15" dir="{{ condition('rtl', 'ltr') }}">
		                	{!! Form::open(['url' => '/home/shopping-cart/checkout', 'method' => 'POST']) !!}
		                    <div style="width: 815px;" dir="ltr" class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
		                        <select required="required" class="js-select2" name="gov">
									<option value="0" disabled="disabled">{{ __('cozastore.chooseGov') }}</option>
		                            @foreach(gov() as $key => $value)
		                                <option value="{{ $key }}">{{ $value }}</option>
		                            @endforeach
								</select>
		                        <div class="dropDownSelect2"></div>
		                    </div>

		                    {!! Form::hidden('fullname', fullname()) !!}

		                    <div style="width: 815px;" class="bor8 bg0 m-b-12">
		                        <input required class="stext-111 cl8 plh3 size-111 p-lr-15" required="" type="tel" name="tel" placeholder="{{ __('cozastore.mobilePhone') }}">
		                    </div>

		                    <div style="width: 815px;" class="bor8 bg0 m-b-12">
		                        <input required class="stext-111 cl8 plh3 size-111 p-lr-15" required="" type="text" name="state" placeholder="{{ __('cozastore.city') }}">
		                    </div>

		                    <div style="width: 815px;" class="bor8 bg0 m-b-12">
		                        <input required class="stext-111 cl8 plh3 size-111 p-lr-15" required="" type="text" name="street" placeholder="{{ __('cozastore.street') }}">
		                    </div>

		                </div>
		            </div>
		        </div>

		        <div class="flex-w flex-t p-t-27 p-b-33">
		            <div class="size-208"><span class="mtext-101 cl2">{{ __('cozastore.total') }}</span></div>
		            <div class="size-209 p-t-1"><span class="mtext-110 cl2">{{ getCurrence(Cart::instance('default')->total()) }}</span></div>
		        </div>
		        <button type="submit" name="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
		        	{{ __('cozastore.orderNow') }}
		        </button>
		    </div>
		</div>
		
		<div class="col-md-3">
			<h3 class="mtext-109 cl2 p-b-30">{{ __('cozastore.yourOrder') }}</h3>
			<ul class="header-cart-wrapitem" style="{{ Cart::count() > 5 ? 'overflow-y: scroll;height: 400px;' : '' }}">
			@foreach(Cart::content() as $item)
			<li class="header-cart-item flex-w flex-t m-b-12" dir="{{ condition('rtl', 'ltr') }}">
				<div class="p-all-10">
					<img width="60" height="73.4" src="/advent/uploads/products/{{ getJsonImages($item->model->image)->image0 }}" alt="IMG">
				</div>
				<div class="header-cart-item-txt p-t-8">
					<a href="/products/i/{{ $item->model->id }}/{{ $item->name }}" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
						{{ $item->name }}
					</a>
					<span class="header-cart-item-info">{{ __('cozastore.theColor') }} : {{ GetColorById($item->options->color) }}</span>
					<span class="header-cart-item-info">{{ __('cozastore.theSize') }} : {{ GetSizeById($item->options->size) }}</span>
					<span class="header-cart-item-info">{{ $item->qty }} x {{ getCurrence($item->price) }}</span>
				</div>
			</li>
			@endforeach
			</ul>
		</div>
		{!! Form::hidden('total', Cart::instance('default')->total()) !!}
		
	{!! Form::close() !!}
	</div>
</div>
@stop