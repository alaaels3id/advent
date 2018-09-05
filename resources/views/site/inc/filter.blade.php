@php 
    $tags_class = 'pull-left flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5';
    $filter_class = 'filter-link stext-106 trans-04';
    $search = 'mtext-107 cl2 size-114 plh2 p-r-15';
@endphp
<div class="flex-w flex-sb-m p-b-52">
    <div class="flex-w flex-l-m filter-tope-group m-tb-10">
       
        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">{{ __('cozastore.allProducts') }}</button>
        
        @if(!isset($no))
            @foreach(Category() as $value)
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".{{ text($value, 'en') }}">
                    {{ text($value, isAuthOrNot()) }}
                </button>
            @endforeach
        @endif
    </div>

    <div class="flex-w flex-c-m m-tb-10">
        
        <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
            <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search" style="padding: 10px"></i>
            <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none" style="padding: 10px"></i>
            {{ __('cozastore.search') }}
        </div>
        
        <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
            <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list" style="padding: 10px"></i>
            <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none" style="padding: 10px"></i>
            {{ __('cozastore.filters') }}
        </div>
    
    </div>

    <!-- Search product -->
    <div class="dis-none panel-search w-full p-t-10 p-b-15" dir="{{ condition('rtl', 'ltr') }}">
        <div class="dropdown">
            <div class="bor8 dis-flex p-l-15">
                
                <input class="{{ $search }} search" type="text" id="myInput22" 
                onkeyup="filterFunction('myInput22', 'myDropdown22');myFunction('myDropdown22')" 
                name="search" placeholder="{{ __('cozastore.search') }} {{ __('cozastore.searchin') }}">

                <div id="myDropdown22" class="dropdown-menu w-full" style="max-height: 400px;overflow-y: scroll;">
                    @foreach(GetAllProducts() as $product)
                        <a class="dropdown-item" href="{{ url($root.'/products/i/'.$product->id.'/'.seourl(text($product->name, 'en'))) }}">
                            @php $img = getJsonImages($product->image)->image0; @endphp
                            <div>
                                <img class="thumbnail pull-{{ condition('right', 'left') }} p-all-5" src="{{ url($root.'/advent/uploads/products/'.$img) }}" width="60" height="60">
                                <span class="pull-{{ condition('right', 'left') }}">
                                    {{ text(ucfirst($product->name), isAuthOrNot()) }}
                                </span><br>
                                <label class="pull-{{ condition('right', 'left') }} badge badge-info">
                                    {{ getCurrence($product->price) }}
                                </label>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
    <!-- Filter -->
    <div class="dis-none panel-filter w-full p-t-10">
        {!! Form::open(['url' => '/products/filter/', 'method' => 'POST']) !!}
        <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
            {{-- Sorting --}}
            <div class="filter-col1 p-r-15 p-b-27">
                <div class="mtext-102 cl2 p-b-15">{{ __('cozastore.sortby') }}</div>
                <ul id="sorting">
                    <li class="p-b-6">
                        {!! Form::select('product_sortby', sortBy(), old('product_sortby'), ['class'=>'form-control']) !!}
                    </li>
                </ul>
            </div>
            @php

            @endphp
            {{-- Prices --}}
            <div class="filter-col2 p-r-15 p-b-27">
                <div class="mtext-102 cl2 p-b-15">{{ __('cozastore.priceBy') }}</div>
                <ul>
                    <li class="p-b-6">
                        {!! Form::select('product_price', pricelist(), old('product_price'), ['class'=>'form-control']) !!}
                    </li>
                </ul>
            </div>

            {{-- Colors --}}
            <div class="filter-col3 p-r-15 p-b-27">
                <div class="mtext-102 cl2 p-b-15">{{ __('cozastore.colorBy') }}</div>

                <ul>
                    <li>
                        <select name="product_color" class="form-control">
                            <option value="0">{{ __('cozastore.all') }}</option>
                            @foreach(DB::table('colors')->get() as $value)
                                <option value="{{ $value->id }}">
                                    {{ text($value->name, isAuthOrNot()) }}
                                </option>
                            @endforeach
                        </select>
                    </li>
                </ul>
            </div>

            {{-- Tags --}}
            <div class="filter-col4 p-b-27 pull-left">
                <div class="mtext-102 cl2 p-b-15">{{ __('cozastore.tags') }}</div>
                <ul>
                    <li>
                        <select name="product_tag" class="form-control">
                            <option value="0">{{ __('cozastore.all') }}</option>
                            @forelse(DB::table('tags')->get() as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </li>
                </ul>          
            </div>

            <div class="filter-col5 p-b-27 pull-left">
                <button type="submit" name="submit" class="btn btn-info btn-lg">Submit</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>