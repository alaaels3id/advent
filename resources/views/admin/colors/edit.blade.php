@extends('admin.layout.master') 
@section('title', 'الالوان')  
@section('content')
<div class="container">
    <div class="row">
        <section class="content-header">
            <h1 class="pull-right" dir="rtl">الالوان<small>{{ text($color->name, 'en') }}</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="{{ route('colors.index') }}">الالوان</a></li>
                <li class="active">تعديل الللون</li>
            </ol>
        </section>
        <div class="panel panel-default" dir="rtl">
            <div class="panel-heading h2">إضافة  لونجديدة</div>
            <div class="panel-body">
                {!! Form::model($color, ['route' => ['colors.update', $color->id], 'method' => 'PATCH', 'style'=>'padding:20px;']) !!}
                    @include('admin.colors.form')
                    <div class="form-group row">
                        <input type="submit" name="submit" value="تعديل" class="btn btn-primary btn-lg">
                    </div> 
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection