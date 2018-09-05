@extends('layouts.app')

@section('title',  __('cozastore.profile'))

@section('content')
<!-- Title page -->

<br><br><br><br>

<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ $root }}/advent/images/bg-02.jpg');">
    <h2 class="ltext-105 cl0 txt-center">{{ __('cozastore.profile') }}</h2>
</section>

@php

use Carbon\Carbon;
$label = 'pull-right col-md-4 col-form-label text-md-right';
$image = GetImage($user->image, '/public/advent/uploads/users/', '/advent/uploads/users/');
$style = "border-radius:50%;margin:10px;";
$im = [
    'style' => $style,
    'width' => '200',
    'height' => '200',
    'class '=> 'img-responsive',
    'title' => __('cozastore.profile')
];
function tabs($name, $active=''){
    return 'class="nav-link '.$active.'" id="'.$name.'-tab" data-toggle="tab" role="tab" href="#'.$name.'" aria-controls="'.$name.'" aria-selected="true"';
}

@endphp

<!-- Content page -->
<section class="bg0 p-t-62 p-b-60">
    <div class="container">
        @include('admin.layout.message')
        <div class="row" dir="{{ condition('rtl', 'ltr') }}">
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        
                        {!! Html::image(($image == null) ? $user->image : $image, null, $im) !!}

                        <h3 class="text-center">{{ fullname() }}</h3>
                        
                        <p class="text-muted text-center">{{ $auth->jop }}</p>
                        
                        <ul class="list-group">
                            <li class="list-group-item">
                                <b class="pull-{{ condition('right', 'left') }}">{{ __('cozastore.myorders') }}</b>
                                <a class="pull-{{ condition('left', 'right') }}">{{ MyOrdersCount($auth->id) }}</a>
                            </li>

                            <li class="list-group-item">
                                <b class="pull-{{ condition('right', 'left') }}">{{ __('cozastore.DaneOrders') }}</b>
                                <a class="pull-{{ condition('left', 'right') }}">{{ MyDoneOrdersCount($auth->id) }}</a>
                            </li>
                            
                            <li class="list-group-item">
                                <b class="pull-{{ condition('right', 'left') }}">{{ __('cozastore.location') }}</b> 
                                <a class="pull-{{ condition('left', 'right') }}">{{ $auth->location }}</a>
                            </li>
                            
                            <li class="list-group-item">
                                <b class="pull-{{ condition('right', 'left') }}">{{ __('cozastore.userEmail') }}</b> 
                                <a class="pull-{{ condition('left', 'right') }}">{{ $auth->email }}</a>
                            </li>
                            
                            <li class="list-group-item">
                                <b class="pull-{{ condition('right', 'left') }}">{{ __('cozastore.since') }}</b> 
                                <a class="pull-{{ condition('left', 'right') }}">{{ $auth->created_at->diffForHumans() }}</a>
                            </li>

                            <li class="list-group-item">
                                <b class="pull-{{ condition('right', 'left') }}">{{ __('cozastore.about-me') }}</b>
                                <a class="pull-{{ condition('left', 'right') }}">{{ $auth->about }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul dir="{{ condition('rtl', 'ltr') }}" class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item"><a {!! tabs('home', 'active') !!}>{{ __('cozastore.home') }}</a></li>
                            <li class="nav-item"><a {!! tabs('wishlist') !!}>{{ __('cozastore.wishlists') }}</a></li>
                            <li class="nav-item"><a {!! tabs('orders') !!}>{{ __('cozastore.myorders') }}</a></li>
                            <li class="nav-item"><a {!! tabs('settings') !!}>{{ __('cozastore.settings') }}</a></li>
                        </ul>
                        
                        <div class="tab-content" id="myTabContent">
                            {{-- Home Tab --}}
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <br><br>
                                <p class="pull-{{ condition('right', 'left') }} lead text-justify" style="padding:20px;">
                                    <div class="card card-default">
                                        <div class="card-header">
                                            {{ __('cozastore.personalInformations') }}
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <span class="pull-{{ condition('right', 'left') }}">{{ __('cozastore.userEmail') }} : </span>
                                                    <span class="pull-{{ condition('left', 'right') }}">{{ $auth->email }}</span>
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="pull-{{ condition('right', 'left') }}">{{ __('cozastore.firstname') }} : </span>
                                                    <span class="pull-{{ condition('left', 'right') }}">{{ $auth->firstName }}</span>
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="pull-{{ condition('right', 'left') }}">{{ __('cozastore.lastname') }} : </span>
                                                    <span class="pull-{{ condition('left', 'right') }}">{{ $auth->lastName }}</span>
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="pull-{{ condition('right', 'left') }}">{{ __('cozastore.age') }} : </span>
                                                    <span class="pull-{{ condition('left', 'right') }}">{{ $auth->dob->age }}</span>
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="pull-{{ condition('right', 'left') }}">{{ __('cozastore.dob') }} : </span>
                                                    <span class="pull-{{ condition('left', 'right') }}">{{ Carbon::parse($auth->dob)->format('D M Y') }}</span>
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="pull-{{ condition('right', 'left') }}">{{ __('cozastore.joinusin') }} : </span>
                                                    <span class="pull-{{ condition('left', 'right') }}">
                                                        {{ Carbon::parse($auth->created_at)->format('D M Y') }}
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </p>
                            </div>
                            
                            {{-- Wishlist Tab --}}
                            <div class="tab-pane fade" id="wishlist" role="tabpanel" aria-labelledby="wishlist-tab">
                                <p class="pull-{{ condition('right', 'left') }} lead text-justify" style="padding:20px;">
                                    
                                    <span>Count : <small class="badge badge-secondary">{{ Cart::instance('wishlist')->count() }}</small></span>
                                    
                                    <table class="table-shopping-cart">
                                        <tr class="table_head">
                                            <th class="column-1">{{ __('cozastore.name') }}</th>
                                            <th class="column-2"></th>
                                            <th class="column-3">{{ __('cozastore.price') }}</th>
                                            <th class="column-4">{{ __('cozastore.delete') }}</th>
                                        </tr>
                                        
                                        @forelse(Cart::instance('wishlist')->content() as $product)

                                        <tr id="wishlist{{ $product->id }}" class="table_row">
                                            <td class="column-1">
                                                @php 
                                                    $td_image = $root.'/advent/uploads/products/'.getJsonImages($product->image)->image0 
                                                @endphp
                                                <img width="100" src="{{ $td_image }}" alt="IMG">
                                            </td>
                                            <td class="column-2">
                                                <a href="{{ url($root.'/products/i/'.$product->id.'/'.seourl(text($product->name, 'en'))) }}">
                                                    {{ text($product->name, isAuthOrNot()) }}
                                                </a>
                                            </td>
                                            <td class="column-3">{{ getCurrence($product->price) }}</td>
                                            <td class="column-4">
                                                <button onclick="removewishlist({{ $product->id }});" class="close" name="submit" type="submit" title="{{ __('cozastore.removeFromWishlist') }}">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </td>
                                        </tr>
                                        
                                        @empty
                                            <tr class="table_row text-center">
                                                <td colspan="4">
                                                    <div class="alert alert-info">{{ __('cozastore.NoWishlists') }}</div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </table>
                                </p>
                            </div>
                            
                            {{-- Orders Tab --}}
                            <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                <div class="pull-{{ condition('right', 'left') }} lead text-justify" style="padding:20px;width: 100%;">
                                    <h2 class="p-all-20">{{ __('cozastore.myorders') }}</h2>
                                    @php $orders = App\Order::where('custumer_id', intval($auth->id))->get(); @endphp
                                   <ul class="list-group">
                                    @if(count($orders) > 0)
                                        @for($i =0; $i < count($orders); $i++)
                                        @php $ord = json_decode($orders[$i]->products); @endphp
                                        <li class="list-group-item">
                                            <div style="background-color: #ddd; color: #000;padding: 5px;">
                                                <h4>{{ ('Orders .No') }}{{ $i+1 }}</h4>
                                            </div>
                                            <ul class="list-group">
                                                @for($j =0; $j < count($ord->ids); $j++)
                                                <li class="list-group-item">
                                                    Name: {{ text(GetProductsById($ord->ids[$j])->name, isAuthOrNot()) }} <br> Quantity:
                                                    {{ $ord->qty[$j] }}
                                                </li>
                                            @endfor 
                                            </ul> 
                                        </li>
                                        <div style="background-color: #717fe0; color: #ffffff; padding: 10px;">{{ getCurrence($orders[$i]->total) }}</div>
                                        @endfor
                                    @else
                                        <li class="list-group-item w-full">
                                            <div class="alert alert-dark text-center">
                                                {{ __('cozastore.NoProducts') }}
                                            </div>
                                        </li>
                                    @endif
                                   </ul>
                                </div>
                            </div>

                            {{-- Settings Tab --}}
                            <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                {{-- Update Inforation --}}
                                <div class="card">
                                    <div class="card-header">Change Personal Information</div>
                                    <div class="card-body">
                                        {!! Form::model($auth, ['route'=>['users.update', $auth->id], 'method'=>'PATCH', 'files' => true]) !!}
                                        @include('admin.users.form')
                                         <button type="submit" name="submit" class="btn btn-success btn-lg">
                                            <i class="fa fa-edit fa-1x"></i>Update
                                        </button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                {{-- Change Passowrd --}}
                                <div class="card">
                                    <div class="card-header">Change Password</div>
                                    <div class="card-body">
                                        {!! Form::open(['url' => '/home/users/PasswordChange', 'method'=>'POST']) !!}
                                        
                                        <div class="form-group row">
                                            {!! Form::label('password', 'Old Password', ['class' => $label]) !!}
                                            <div class="col-md-6">
                                                {!! Form::password('password', ['class'=>'form-control', 'required' => 'required']) !!}
                                                {!! isvalid('password', $errors) !!}
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            {!! Form::label('newpassword', 'New Password', ['class' => $label]) !!}
                                            <div class="col-md-6">
                                                {!! Form::password('newpassword', ['class'=>'form-control', 'required' => 'required']) !!}
                                                {!! isvalid('newpassword', $errors) !!}
                                            </div>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-success btn-lg">
                                            <i class="fa fa-edit fa-1x"></i>Update
                                        </button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
</section>
@stop