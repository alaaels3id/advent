@extends('layouts.app') 

@section('title', __('cozastore.product').' | '.text($product->name, isAuthOrNot()))  

@section('content')

<!-- breadcrumb -->
<div class="container" dir="{{ condition('rtl', 'ltr') }}">
    @php
        $category = text(Category()[$product->category_id], 'en');
    @endphp
    <br><br><br>
    
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="{{ route('home') }}" class="stext-109 cl8 hov-cl1 trans-04">
            {{ __('cozastore.home') }} <i class="fa fa-angle-{{ condition('left', 'right') }} m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        
        <a href="{{ url($root.'/products/category/i/'.$product->category_id.'/'.$category) }}" class="stext-109 cl8 hov-cl1 trans-04">
            {{ text(Category()[$product->category_id], isAuthOrNot()) }} <i class="fa fa-angle-{{ condition('left', 'right') }} m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        
        <span class="stext-109 cl4">{{ text($product->name, isAuthOrNot()) }}</span>
    </div>
</div>
        
<!-- Product Detail -->
<section class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="container">

       @php $img_class = 'flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04'; @endphp
       
       @include('admin.layout.message')
        
        <div class="row">
            <div class="col-md-6 col-lg-7 p-b-30">
                <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">
                            
                        <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                        <div class="slick3 gallery-lb">

                            @foreach(getJsonImages($product->image) as $image)
                            <div class="item-slick3">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="{{ $root.'/advent/uploads/products/'.$image }}" alt="IMG-PRODUCT">
                                    <a class="{{ $img_class }}" href="{{ $root.'/advent/uploads/products/'.$image }}">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

            <div dir="{{ condition('rtl', 'ltr') }}" class="col-md-6 col-lg-5 p-b-30">
                <div class="p-r-50 p-t-5 p-lr-0-lg">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="pull-{{ condition('right', 'left') }}">{{ __('cozastore.name') }}</div>
                            <div class="pull-{{ condition('left', 'right') }}">
                                <span class="mtext-105 cl2 js-name-detail p-b-14">{{ text($product->name, isAuthOrNot()) }}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="pull-{{ condition('right', 'left') }}">{{ __('cozastore.price') }}</div>
                            <div class="pull-{{ condition('left', 'right') }}">
                                <span class="mtext-106 cl2">{{ getCurrence($product->price) }}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="pull-{{ condition('right', 'left') }}">{{ __('cozastore.discription') }}</div>
                            <p class="pull-{{ condition('left', 'right') }} stext-102 cl3 p-t-23">{{ text($product->discription, isAuthOrNot()) }}</p>
                        </li>
                        <li class="list-group-item">
                            <div class="pull-{{ condition('right', 'left') }}">{{ __('cozastore.brand') }}</div>
                            <p class="pull-{{ condition('left', 'right') }} stext-102 cl3 p-t-23">{{ $product->brand }}</p>
                        </li>
                        <li class="list-group-item">
                            <div class="pull-{{ condition('right', 'left') }}">{{ __('cozastore.tags') }}</div>
                            <div class="pull-{{ condition('left', 'right') }}">
                                <span class="stext-102 cl6 size-206">
                                    @forelse($product->tags as $tag)
                                        <a href="{{ url($root.'/tags/products/i/'.$tag->id.'/'.$tag->name) }}">
                                            <span style="border-radius: 18px; padding: 2px 20px;" class="btn btn-danger">
                                                {{ $tag->name }}
                                            </span>
                                        </a>
                                    @empty
                                        <div class="text-center">{{ __('cozastore.NoColorsForProduct') }}</div>
                                    @endforelse
                                </span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="pull-{{ condition('right', 'left') }}">{{ __('cozastore.rating') }}</div>
                            <div class="pull-{{ condition('left', 'right') }}">
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
                        </li>                        
                    </ul>
                    <div class="p-t-33 getformvalue">
                        
                        {{-- Product Sizes --}}
                        <div class="flex-w flex-r-m p-b-10">
                            <div class="size-203 flex-c-m respon6">{{ __('cozastore.size') }}</div>

                            <div dir="ltr" class="size-204 respon6-next">
                                <div class="rs1-select2 bor8 bg0">
                                    <select required class="js-select2" name="sizes">
                                        <option selected>{{ __('cozastore.chooseSize') }}</option>
                                        @forelse($product->sizes as $size)
                                            <option value="{{ $size->id }}">{{ $size->size }} {{ __('cozastore.size') }}</option>
                                        @empty
                                            <option disabled>{{ __('cozastore.NoSizes') }}</option>
                                        @endforelse
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                        </div>

                        {{-- Product Colors --}}
                        <div class="flex-w flex-r-m p-b-10">
                            <div class="size-203 flex-c-m respon6">{{ __('cozastore.theColor') }}</div>

                            <div dir="ltr" class="size-204 respon6-next">
                                <div class="rs1-select2 bor8 bg0">
                                    <select required class="js-select2" name="colors">
                                        <option selected value="">{{ __('cozastore.chooseColor') }}</option>
                                        @forelse($product->colors as $value)
                                            <option value="{{ $value->id }}">
                                                <span>{{ text($value->name, isAuthOrNot()) }}</span>
                                            </option>
                                        @empty
                                            <option disabled>{{ __('cozastore.NoColorsForProduct') }}</option>    
                                        @endforelse
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                        </div>

                        {{-- add to cart --}}
                        <div class="flex-w flex-r-m p-b-10">
                            <div dir="{{ condition('rtl', 'ltr') }}" class="size-204 flex-w flex-m respon6-next">
                                <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m"><i class="fs-16 zmdi zmdi-minus"></i></div>
                                    <input class="mtext-104 cl3 txt-center num-product" max="{{ $product->qtn }}" min="1" type="number" name="num-product" value="1">
                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m"><i class="fs-16 zmdi zmdi-plus"></i></div>
                                </div>
                                <button onclick="addProductToCart('{{ $product->id }}', '{{ text($product->name, 'en') }}', '{{ $product->price }}');" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                 {{ __('cozastore.addToCart') }}
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Share this product in Social Media -->
                    <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                        
                        <div class="flex-m bor9 p-r-10 m-r-11">
                            <a href="javascript:void(0)" class="btn-addwish-b2 dis-block pos-relative"></a>
                        </div>

                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
                           <i class="fa fa-facebook"></i>
                        </a>

                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
                            <i class="fa fa-twitter"></i>
                        </a>

                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="bor10 m-t-50 p-t-43 p-b-40" dir="{{ condition('rtl', 'ltr') }}">
            <!-- Tab01 -->
            <div class="tab01">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item p-b-10">
                        <a class="nav-link active" data-toggle="tab" href="#description" role="tab">{{ __('cozastore.discription') }}</a>
                    </li>

                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#information" role="tab">{{ __('cozastore.additionalInformation') }}</a>
                    </li>

                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">
                            {{ __('cozastore.reviews') }} ({{ $product->reviews->count() }})
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-t-43">
                    <!-- - -->
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="how-pos2 p-lr-15-md"><p class="stext-102 cl6">{{ text($product->discription, isAuthOrNot()) }}</p></div>
                    </div>

                    <!-- - -->
                    <div class="tab-pane fade" id="information" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <ul class="p-lr-28 p-lr-15-sm">

                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">{{ __('cozastore.theColor') }}</span>
                                        <span class="stext-102 cl6 size-206">
                                            @forelse($product->colors as $color)
                                                <a href="{{ url($root.'/tags/colors/i/'.$color->id.'/'.text($color->name, 'en')) }}">
                                                    <span style="border-radius: 18px; padding: 2px 20px;" class="btn btn-danger">
                                                        {{ ucfirst(text($color->name, isAuthOrNot())) }}
                                                    </span>
                                                </a>
                                            @empty
                                                <div class="text-center">{{ __('cozastore.NoColorsForProduct') }}</div>
                                            @endforelse
                                        </span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">{{ __('cozastore.tags') }}</span>
                                        <span class="stext-102 cl6 size-206">
                                            @forelse($product->tags as $tag)
                                                <a href="{{ url($root.'/tags/products/i/'.$tag->id.'/'.$tag->name) }}">
                                                    <span style="border-radius: 18px; padding: 2px 20px;" class="btn btn-danger">
                                                        {{ $tag->name }}
                                                    </span>
                                                </a>
                                            @empty
                                                <div class="text-center">{{ __('cozastore.NoTagsForProduct') }}</div>
                                            @endforelse
                                        </span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">{{ __('cozastore.sizes') }}</span>
                                        <span class="stext-102 cl6 size-206">
                                            @forelse($product->sizes as $size)
                                                <a href="{{ url($root.'/tags/sizes/i/'.$size->id.'/'.$size->size) }}">
                                                    <span style="border-radius: 18px; padding: 2px 20px;" class="btn btn-danger">{{ $size->size }}</span>
                                                </a>
                                            @empty
                                                <div class="text-center">{{ __('cozastore.NoTagsForProduct') }}</div>
                                            @endforelse
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Reviews -->
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <div class="p-b-30 m-lr-15-sm">
                                    @php
                                        $arr1 =  [
                                            'name' => 'submit',
                                            'class'=>'flex-c-m pointer stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10'
                                        ];
                                        $arr2 =  ['class' => 'size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10', 'id' => 'review'];
                                        $product_name = seoUrl(text($product->name, 'en'));

                                    @endphp

                                    @if(!empty($product->reviews))
                                    
                                    @foreach($product->reviews as $user)
                                        @php $user_review_img = $user->users->image; @endphp
                                        <!-- Review -->
                                        <div dir="{{ condition('rtl', 'ltr') }}" class="flex-w flex-t p-b-68">
                                            <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                                <img src="{{ url($root.'/advent/uploads/users/'.$user_review_img) }}" alt="AVATAR">
                                            </div>
                                            <div class="size-207">
                                                <div class="flex-w flex-sb-m p-b-17">
                                                    <span class="mtext-107 cl2 p-r-20">
                                                        {{ ucfirst($user->users->firstName).' '.$user->users->lastName }}
                                                    </span>
                                                    <span class="fs-18 cl11">
                                                        @for($i=1;$i <= 5;$i++)
                                                            @if($user->rate >= $i)
                                                                <i class="zmdi zmdi-star"></i>
                                                            @else
                                                                <i class="zmdi zmdi-star-outline"></i>
                                                            @endif
                                                        @endfor
                                                    </span>
                                                </div>

                                                <p class="stext-102 cl6">{{ $user->review }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                    @endif

                                    <!-- Add review -->
                                    {!! Form::open(['url' => '/products/i/'.$product->id.'/'.$product_name, 'class'=>'w-full', 'method'=>'POST']) !!}
                                    <h5 class="mtext-108 cl2 p-b-7"> {{ __('cozastore.addNewReview') }} </h5>

                                    <div class="flex-w flex-m p-t-50 p-b-23">
                                        <span class="stext-102 cl3 m-r-16"> {{ __('cozastore.yourRateing') }} </span>
                                        <span class="wrap-rating fs-18 cl11 pointer">
                                           <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                           <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                           <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                           <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                           <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                            <input type="number" class="dis-none" name="rate">
                                        </span>
                                    </div>

                                    <div class="row p-b-25">
                                        <div class="col-12 p-b-5">
                                            {!! Form::label('review', __('cozastore.addNewReview'), ['class' => 'stext-102 cl3']) !!}
                                            {!! Form::textarea('review', null, $arr2) !!}
                                        </div>
                                    </div>
                                    {!! Form::hidden('user_id', isset($auth) ? $auth->id : '') !!}
                                    {!! Form::hidden('product_id', $product->id) !!}
                                    {!! Form::submit(__('cozastore.submit'), $arr1) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
        <span class="stext-107 cl6 p-lr-25">{{ __('cozastore.model') }} : {{ $product->model }} </span>
        <span class="stext-107 cl6 p-lr-25">{{ __('cozastore.categories') }}: {{ $category }}</span>
        <span class="stext-107 cl6 p-lr-25">{{ __('cozastore.brand') }}: {{ $product->brand }}</span>
    </div>

</section>
@include('site.inc.model')

<!-- Related Products -->
@include('site.inc.relating')
<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15"></div>
@include('site.inc.mostreview')
@stop