@extends('admin.layout.master') 
@section('title', 'إضافة فئة جديدة') 
@section('content')
<div class="container-fluid">
    <div class="row">
        <section class="content-header">
            <h1 class="pull-right" dir="rtl"> الفئات <small>إضافة فئة جديدة</small></h1>
            <ol class="breadcrumb">
                <li class="h4"><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li class="h4"><a href="{{ route('categories.index') }}">الفئات</a></li>
                <li class="active h4">إضافة فئة جديدة</li>
            </ol>
        </section>
        <div class="col-md-12">
            <div class="box box-primary" dir="rtl">
                <div class="box-body" style="padding: 20px;">
                    {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
                        @include('admin.categories.form')
                        <div class="form-group row">
                            <input style="width: 150px;" type="submit" name="submit" value="إضافة" class="btn btn-primary btn-lg">
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection