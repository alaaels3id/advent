@extends('admin.layout.master') 
@section('title', 'تعديل الكلمة الدلالية') 
@section('content')
<div class="container">
    <div class="row">
        <section class="content-header">
            <h1 class="pull-right" dir="rtl">الكلمات الدلالية<small>تعديل الكلمة الدلالية</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="{{ route('tags.index') }}">الكلمات الدلالية</a></li>
                <li class="active">إضافة كلمة دلالية جديدة</li>
            </ol>
        </section>
        <div class="panel panel-default" dir="rtl">
            <div class="panel-heading h2">إضافة كلمة دلالية جديدة</div>
            <div class="panel-body">
                {!! Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PATCH', 'style'=>'padding:20px;']) !!}
                    @include('admin.tags.form')
                    <div class="form-group row">
                        <input type="submit" name="submit" value="تعديل" class="btn btn-primary btn-lg">
                    </div> 
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection