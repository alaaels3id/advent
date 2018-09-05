@extends('admin.layout.master') 
@section('title', 'إضافة مقاس جديد') 
@section('content')
<div class="container">
    <div class="row">
        
        <section class="content-header">
            <h1 class="pull-right" dir="rtl">المقاسات<small>إضافة مقاس جديد</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="{{ route('sizes.index') }}">المقاسات</a></li>
                <li class="active">إضافة مقاس جديد</li>
            </ol>
        </section>
        
        <div class="panel panel-default" dir="rtl">
            <div class="panel-heading" dir="rtl">إضافة مقاس جديدة</div>
            <div class="panel-body">
                {!! Form::open(['route' => 'sizes.store', 'method' => 'POST', 'style'=>'padding:20px;']) !!}
                @include('admin.sizes.form')
                <div class="form-group row">
                    {!! Form::submit('إضافة', ['class'=>'btn btn-primary btn-lg']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
</div>
@endsection