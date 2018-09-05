@extends('admin.layout.master')

@section('title', 'إضافة سؤال جديد')

@section('content')
<div class="container">
    <div class="row">

        <section class="content-header">
            <h1 class="pull-right" dir="rtl">الاسئلة<small>إضافة سؤال جديد</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="{{ route('faqs.index') }}">الاسئلة</a></li>
                <li class="active">إضافة سؤال جديد</li>
            </ol>
        </section>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" dir="rtl">إضافة سؤال جديد</div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'faqs.store', 'method' => 'POST', 'dir' => 'rtl']) !!}
                    
                    @include('admin.faqs.form')

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