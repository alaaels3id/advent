<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! Html::style('advent/vendor/bootstrap/css/bootstrap.min.css') !!}

    {!! Html::favicon('/advent/images/icons/favicon.png') !!}

    {!! Html::style('advent/fonts/font-awesome-4.7.0/css/font-awesome.min.css') !!}

    {!! Html::style('advent/fonts/iconic/css/material-design-iconic-font.min.css') !!}

    {!! Html::style('advent/fonts/linearicons-v1.0.0/icon-font.min.css') !!}

    {!! Html::style('advent/vendor/animate/animate.css') !!}

    {!! Html::style('advent/vendor/css-hamburgers/hamburgers.min.css') !!}

    {!! Html::style('advent/vendor/animsition/css/animsition.min.css') !!}

    {!! Html::style('advent/vendor/select2/select2.min.css') !!}

    {!! Html::style('advent/vendor/daterangepicker/daterangepicker.css') !!}

    {!! Html::style('advent/vendor/slick/slick.css') !!}

    {!! Html::style('advent/vendor/MagnificPopup/magnific-popup.css') !!}

    {!! Html::style('advent/vendor/perfect-scrollbar/perfect-scrollbar.css') !!}

    {!! Html::style('advent/css/util.css') !!}

    {!! Html::style('advent/css/main.css') !!}
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container" dir="rtl">
    @php
    $email_class = ['class' => $errors->has('email') ? ' is-invalid form-control' : 'form-control', 'id' => 'email', 'autocomplete' => 'off'];
    @endphp
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2" style="margin: 100px;">
            <div class="card">
                <div class="card-header">{{ __('تسجيل الدخول للموقع') }}</div>

                <div class="card-body">
                    <form action="{{ route('login') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label text-md-right">{{ __('البريد الإلكتروني') }}</label>

                            <div class="col-md-10">
                                {!! Form::email('email', old('email'), $email_class) !!}
                                @if($errors->has('email'))
                                <span class="invalid-feedback"><strong>
                                    {{ $errors->first('email') }}</strong>
                                </span> 
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('passowrd', 'كلمة المرور', ['class'=>'col-md-2 col-form-label text-md-right']) !!}
                            <div class="col-md-10">
                                {!! Form::password('password', ['class'=>$errors->has('password') ? 'form-control is-invalid' : 'form-control']) !!}
                                @if($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    {!! Form::checkbox('remember', 0, old( 'remember') ?? 'checked', ['class'=>'pull-right']) !!}
                                    <p class="p-r-180">{{ __('تذكرني') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary pull-right">{{ __('تسجيل الدخول') }}</button>

                                <a class="btn btn-link pull-right" href="{{ route('password.request') }}">
                                    {{ __('هل نسيت كلمة المرور ؟') }}
                                </a>
                                <a class="btn btn-link pull-right" href="{{ route('register') }}">
                                    {{ ('تسجيل عضوية جديدة') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@include('site.inc.javascript')
</html>
