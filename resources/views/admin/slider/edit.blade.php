@extends('admin.layout.master') 
@section('title', isset($slider->title) ? text($slider->title) : 'تعديل المدونة') 
@section('content')
<div class="container">
    <div class="row">

        <section class="content-header">
            <h1 class="pull-right" dir="rtl">البنرات<small>تعديل البنر <q>{{ text($slider->title) }}</q></small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="{{ route('sliders.index') }}">البنرات</a></li>
                <li class="active">عديل البنر - {{ text($slider->title) }}</li>
            </ol>
        </section>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" dir="rtl">تعديل البنر - {{ text($slider->title) }}</div>
                <div class="panel-body">

                    {!! Form::model($slider, ['route'=>['sliders.update', $slider->id], 'method'=>'PATCH', 'files'=>true, 'dir' => 'rtl']) !!}
                    
                    @include('admin.slider.form')

                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button style="width:120px;" type="submit" class="btn btn-lg btn-success">{{ __('نعديل') }}</button>
                            <a href="{{ url('/admin-panal/sliders/'.$slider->id.'/destroy') }}" style="width:120px;" class="btn btn-lg btn-danger">
                                {{ __('حذف') }}
                            </a>
                        </div>
                    </div>
                    
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection