@extends('layouts.app')

@section('title', 'عربة التسوق')

@section('content')

<!-- breadcrumb -->
<br><br><br>
<div class="container" dir="{{ condition('rtl', 'ltr') }}">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="{{ route('home') }}" class="stext-109 cl8 hov-cl1 trans-04">
            {{ __('cozastore.home') }}
            <i class="fa fa-angle-{{ condition('left', 'right') }} m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        <span class="stext-109 cl4">{{ __('cozastore.shoppingcart') }}</span>
    </div>
</div>
<br><br><br>
        
<!-- Shoping Cart -->
<div class="container">
    <div class="row">
        <div class="col-md-12">    
            <div class="wrap-table-shopping-cart">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">{{ __('cozastore.image') }}</th>
                            <th scope="col">{{ __('cozastore.name') }}</th>
                            <th scope="col">{{ __('cozastore.price') }}</th>
                            <th scope="col">{{ __('cozastore.qty') }}</th>
                            <th scope="col">{{ __('cozastore.total') }}</th>
                            <th scope="col">{{ __('cozastore.wishlist') }}</th>
                        </tr>
                    </thead>
                    <tbody class="tab1">
                        @forelse(Cart::content() as $item)
                        <tr class="row{{ $item->rowId }}">
                            <th scope="row">
                                <div onclick="removeProductFromCart('{{ $item->rowId }}');" class="how-itemcart1">
                                    <img src="{{ $root.'/advent/uploads/products/'.getJsonImages($item->model->image)->image0 }}" alt="IMG">
                                </div>
                            </th>
                            <td>{{ text($item->model->name, isAuthOrNot()) }}</td>
                            <td>{{ getCurrence($item->model->price) }}</td>
                            <td>
                                <div class="wrap-num-product flex-w">
                                    <div onclick="down('{{ $item->rowId }}');" class="down{{ $item->rowId }} btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                    </div>

                                    <input class="mtext-104 cl3 txt-center num-product" min="1" readonly max="{{ $item->model->qtn }}" type="number" name="num-product1" value="{{ $item->qty }}">

                                    <div onclick="up('{{ $item->rowId }}');" class="up{{ $item->rowId }} btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                    </div>
                                </div>
                            </td>
                            <td id="{{ $item->qty }}">{{ getCurrence($item->total) }}</td>
                            <td>
                                {!! Form::open(['url' => '/cart/addToWishlist/', 'method' => 'POST']) !!}
                                {!! Form::hidden('rowId', $item->rowId) !!}
                                <button class="btn btn-primary" name="submit" type="submit">
                                    {!! Html::tag('i', '', ['class' => 'fa fa-heart fa-1x']) !!}
                                </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6"><div class="alert alert-primary txt-center">{{ __('cozastore.NoItems') }}</div></td>
                        </tr> 
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <br><br>
            
            <h2>{{ __('cozastore.wishlists') }}</h2>
            <br><br>


            <div class="wrap-table-shopping-cart">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">{{ __('cozastore.image') }}</th>
                            <th scope="col">{{ __('cozastore.name') }}</th>
                            <th scope="col">{{ __('cozastore.price') }}</th>
                            <th scope="col">{{ __('cozastore.addToCart') }}</th>
                        </tr>
                    </thead>
                    <tbody class="tab2">
                        @forelse(Cart::instance('wishlist')->content() as $item)

                        <tr class="row{{ $item->rowId }}">
                            <td scope="row">
                                <div onclick="removeProductFromWishlist('{{ $item->rowId }}');" class="how-itemcart1">
                                    <img src="{{ $root.'/advent/uploads/products/'.getJsonImages($item->model->image)->image0 }}" alt="IMG">
                                </div>
                            </td>
                            <td>{{ text($item->model->name, isAuthOrNot()) }}</td>
                            <td>{{ getCurrence($item->model->price) }}</td>
                            <td>
                                <button onclick="moveToCart('{{ $item->rowId }}');" class="btn btn-primary">
                                    <i class="fa fa-cart-plus fa-2x"></i>
                                </button>
                            </td>
                        </tr>
                        
                        @empty
                        
                        <tr>
                            <td colspan="4">
                                <div class="alert alert-primary txt-center">{{ __('cozastore.NoItems') }}</div>
                            </td>
                        </tr>  
                        
                        @endforelse
                    </tbody>
                </table>
            </div>
            <br><br><br>
        </div>
    </div>
</div>
@stop