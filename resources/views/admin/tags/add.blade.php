@extends('admin.layout.master') 
@section('title', 'إضافة كلمة دلالية') 
@section('content')
<div class="container">
    <div class="row">
        <section class="content-header">
            <h1 class="pull-right" dir="rtl">الكلمات الدلالية<small>إضافة الكلمة الدلالية</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="{{ route('tags.index') }}">الكلمات الدلالية</a></li>
                <li class="active">إضافة كلمة دلالية جديدة</li>
            </ol>
        </section>
        <div class="panel panel-default">
            <div class="panel-heading" dir="rtl">إضافة كلمة دلالية جديدة</div>
            <div class="panel-body">
                {!! Form::open(['route' => 'tags.store', 'method' => 'POST', 'dir' => 'rtl']) !!}
                    @include('admin.tags.form')
                    <div class="form-group row">
                        <input style="width: 150px;margin: 10px;" type="submit" name="submit" value="إضافة" class="btn btn-primary btn-lg">
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection