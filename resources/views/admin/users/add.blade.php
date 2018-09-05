@extends('admin.layout.master')

@section('title', 'الاعضاء')

@section('content')
<div class="container">
    <div class="row">
        
        <section class="content-header">
            <h1 class="pull-right" dir="rtl">الاعضاء<small>إضافة عضو جديد</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="{{ route('users.index') }}">الاعضاء</a></li>
                <li class="active">إضافة عضو جديد</li>
            </ol>
        </section>
        
        <div class="col-md-12 col-xs-12" style="padding: 20px; margin: 20px;">
            <div class="box box-primary">
                <div class="box-body">
                {!! Form::open(['route' => 'users.store', 'method' => 'POST', 'files' => true, 'dir' => 'rtl']) !!}
                
                    @include('admin.users.form', ['admin' => 'sma'])
                
                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button style="width:120px;" name="submit" type="submit" class="btn btn-lg btn-primary">{{ __('تسجيل') }}</button>
                        </div>
                    </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection