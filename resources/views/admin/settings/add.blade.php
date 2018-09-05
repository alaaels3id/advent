@extends('admin.layout.master') 
@section('title', 'اضافة اعداد جديد') 
@section('content')

<div class="container">
    <div class="row">
        <section class="content-header">
            <h1 class="pull-right" dir="rtl">الاعدادات<small>اضافة اعداد جديد للموقع</small></h1>
            <ol class="breadcrumb">
                <li class="h4"><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li class="h4"><a href="{{ route('settings') }}">الإعدادات</a></li>
                <li class="active h4"><a href="{{ route('settings.create') }}">إضافة إعداد جديد</a></li>
            </ol>
        </section>
        <div class="col-md-12">
            <div class="box box-primary" dir="rtl">
                <div class="box-header">إضافة إعداد جديد</div>
                <div class="box-body" dir="ltr">
                    {!! Form::open(['route' => 'settings.addnewset', 'method' => 'POST', 'dir'=>'rtl']) !!} 
                    
                    <div class="form-group row">
                        <label for="name" class="col-md-2 pull-right col-form-label text-md-right">اسم الاعداد</label>
                        <div class="col-md-10">
                            {!! Form::text('name', null, ['class' => 'form-control']) !!} 
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="value" class="col-md-2 pull-right col-form-label text-md-right">قيمة الحقل</label>
                        <div class="col-md-10">
                            {!! inputs('value', 'textarea') !!}
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="slug" class="col-md-2 pull-right col-form-label text-md-right">اسم الحقل</label>
                        <div class="col-md-10">
                            {!! Form::text('slug', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="type" class="col-md-2 pull-right col-form-label text-md-right">نوع حقل الادخال</label>
                        <div class="col-md-10">
                            {!! Form::select('type', textboxtype(), null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            {!! Form::button(Html::tag('i', '', ['class' => 'fa fa-save']).'إضافة', ['class' => 'btn btn-app pull-right', 'type' => 'submit']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection