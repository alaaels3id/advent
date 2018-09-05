@extends('layouts.app')

@section('title', __('cozastore.contactUs'))

@section('content')

<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ $root }}/advent/images/bg-01.jpg');">
    <h2 class="ltext-105 cl0 txt-center">{{ __('cozastore.contactUs') }}</h2>
</section>
    
@php
    $class = "stext-111 cl2 plh3 size-116 p-l-62 p-r-30";
    $class1 = "stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25";
    $class2 = "flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer";
    $contact_us = ['class' => $class, 'placeholder' => __('cozastore.userEmail'), 'requird' => 'requird'];
    $subject = ['class' => $class, 'placeholder' => __('cozastore.messageSub'), 'requird' => 'requird'];
@endphp
    
<!-- Content page -->
<section class="bg0 p-t-104 p-b-116" dir="{{ condition('rtl', 'ltr') }}">
    <div class="container">
        @include('admin.layout.message')
        <div class="flex-w flex-tr">
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">

                {!! Form::open(['route' => 'contact-us', 'method' => 'POST']) !!}
                    <h4 class="mtext-105 cl2 txt-center p-b-30">{{ __('cozastore.sendMessage') }}</h4>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        {!! Form::email('co_email', isset($auth) ? $auth->email : '', $contact_us) !!}
                        <img class="how-pos4 pointer-none" required src="{{ $root }}/advent/images/icons/icon-email.png" alt="ICON">
                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        {!! Form::hidden('co_name', isset($auth) ? $auth->firstName.' '.$auth->lastName : '') !!}
                        {!! Form::hidden('image', isset($auth) ? $auth->image : '') !!}
                        {!! Form::text('co_subject', null, $subject) !!}
                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <select class="{{ $class }}" required name="co_type">
                            <option disabled selected>{{ __('cozastore.chooseMessageType') }}</option>
                            @foreach(contacts() as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="bor8 m-b-30">
                        {!! Form::textarea('co_message', null, ['class' => $class1, 'placeholder' => __('cozastore.Message'), 'required'=>'required']) !!}
                    </div>
                    {!! Form::submit(__('cozastore.send'), ['class' => $class2]) !!}
                {{ Form::close() }}
            </div>

            <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211 pull-right"><span class="lnr lnr-map-marker"></span></span>
                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2 pull-right">{{ __('cozastore.address') }}</span>
                        <p class="stext-115 cl6 size-213 p-t-18 pull-right">{{ GetSettings('siteSmallDis', isAuthOrNot(), 1) }}</p>
                    </div>
                </div>

                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211 pull-right"><span class="lnr lnr-phone-handset"></span></span>
                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2 pull-right">{{ __('cozastore.mobilePhone') }}</span>
                        <p class="stext-115 cl1 size-213 p-t-18 pull-right" dir="{{ condition('rtl', 'ltr') }}">
                            {{ GetSettings('mobile', isAuthOrNot(), 0) }}
                        </p>
                    </div>
                </div>

                <div class="flex-w w-full">
                    <span class="fs-18 cl5 txt-center size-211 pull-right"><span class="lnr lnr-envelope"></span></span>
                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2 pull-right">{{ __('cozastore.ourMail') }}</span>
                        <p class="stext-115 cl1 size-213 p-t-18 pull-right">{{ GetSettings('mail', isAuthOrNot(), 0) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map -->
<div class="map">
    <div class="size-303" id="google_map" data-map-x="30.691446" data-map-y="30.886787" 
    data-pin="{{ $root }}/advent/images/icons/pin.png" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div>
</div>

@endsection

@section('script')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
    {{ Html::script('advent/js/map-custom.js') }}
@endsection