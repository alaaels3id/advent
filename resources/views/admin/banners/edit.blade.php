@extends('admin.layout.master') 
@section('title', (isset($banner->title)) ? $banner->title : 'تعديل القسم') 
@section('content')
<div class="container">
    <div class="row">

        <section class="content-header">
            <h1 class="pull-right" dir="rtl">الاقسام<small>تعديل القسم <q>{{ $banner->title }}</q></small></h1>
            <ol class="breadcrumb">
                <li class="h4"><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li class="h4"><a href="{{ route('banners.index') }}">الاقسام</a></li>
                <li class="active h4">عديل القسم - {{ $banner->title }}</li>
            </ol>
        </section>

        <div class="col-md-12" style="padding: 20px; margin: 20px;">
            <div class="box box-primary">
                <div class="box-header pull-right">تعديل القسم - {{ $banner->title }}</div>
                <div class="box-body">

                    {!! Form::model($banner, ['route'=>['banners.update', $banner->id], 'method'=>'PATCH', 'files'=>true, 'style' => 'direction:
                    rtl;']) !!}
                    
                    @include('admin.banners.form')

                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button style="width:120px;" type="submit" class="btn btn-lg btn-success">{{ __('نعديل') }}</button>
                            <a href="{{ url('/admin-panal/banners/'.$banner->id.'/destroy') }}" style="width:120px;" class="btn btn-lg btn-danger">
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