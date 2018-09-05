@extends('layouts.app')

@section('title', __('cozastore.register'))

@section('content')
<div class="container" dir="rtl">
    <div class="row justify-content-center">
        <div class="col-md-12 col-xs-12 col-lg-12 col-md-offset-2" style="margin: 40px;">
            <div class="card">
                <div class="card-header">{{ __('تسجيل عضوية جديدة') }}</div>
                <div class="card-body">
                    {!! Form::open(['route' => 'register', 'method' => 'POST', 'dir' => 'rtl']) !!}
                    
                    @include('auth.form')

                    {{-- submit--}}
                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button style="width:150px;" type="submit" class="btn btn-primary btn-lg">{{ __('تسجيل') }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop
