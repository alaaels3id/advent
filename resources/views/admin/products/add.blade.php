@extends('admin.layout.master')

@section('title', 'إضافة منتج جديد')

@section('content')
<div class="container">
    <div class="row">
        
        <section class="content-header">
            <h1 class="pull-right" dir="rtl">المنتجات<small>إضافة منتج جديد</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="{{ route('products.index') }}">المنتجات</a></li>
                <li class="active">إضافة منتج جديد</li>
            </ol>
        </section>
        
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" dir="rtl">إضافة منتج جديد</div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'products.index', 'method' => 'POST', 'files' => true, 'dir' => 'rtl']) !!}
                    
                        @include('admin.products.form')
                    
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                {!! Form::button('إضافة', ['class' => 'btn btn-lg btn-primary', 'type' => 'submit', 'style' => 'width:120px;']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop