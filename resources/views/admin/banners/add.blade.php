@extends('admin.layout.master') 
@section('title', 'إضافة قسم جديد') 
@section('content')
<div class="container">
    <div class="row">

        <section class="content-header">
            <h1 class="pull-right" dir="rtl">الاقسام<small>إضافة قسم جديد</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="{{ route('banners.index') }}">الاقسام</a></li>
                <li class="active">إضافة قسم جديد</li>
            </ol>
        </section>

        <div class="col-md-12" style="padding: 20px; margin: 20px;">
            <div class="box box-primary">
                <div class="box-header" dir="rtl">إضافة قسم جديد</div><br><br>
                <div class="box-body">
                    {!! Form::open(['route' => 'banners.store', 'method' => 'POST', 'files' => true, 'dir' => 'rtl']) !!}
                    
                    @include('admin.banners.form')

                    <div class="form-group row mb-0">
                        <div class="col-md-12 col-xs-12">
                            <button style="width:120px;" type="submit" class="btn btn-lg btn-primary">{{ __('حفظ') }}</button>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection