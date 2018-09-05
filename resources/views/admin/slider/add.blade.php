@extends('admin.layout.master')

@section('title', 'إضافة بنر جديد')

@section('content')
<div class="container">
    <div class="row">

        <section class="content-header">
            <h1 class="pull-right" dir="rtl">البنرات<small>إضافة بنر جديد</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="{{ route('sliders.index') }}">البنرات</a></li>
                <li class="active">إضافة بنر جديد</li>
            </ol>
        </section>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" dir="rtl">إضافة بنر جديد</div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'sliders.store', 'method' => 'POST', 'files' => true, 'dir' => 'rtl']) !!}
                    
                    @include('admin.slider.form')

                    <div class="form-group row mb-0">
                        <div class="col-md-12">
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