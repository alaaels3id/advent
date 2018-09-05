@extends('admin.layout.master')

@section('title', 'إضافة مدونة جديدة')

@section('content')
<div class="container">
    <div class="row">

        <section class="content-header">
            <h1 class="pull-right hidden-xs" dir="rtl">المدونة<small>إضافة تدوينة جديد</small></h1>
            <ol class="breadcrumb">
                <li class="h4"><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li class="h4"><a href="{{ route('blogs.index') }}">المدونة</a></li>
                <li class="active h4">إضافة تدوينة جديد</li>
            </ol>
        </section>

        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header" dir="rtl">إضافة تدوينة جديد</div>
                <div class="box-body">
                    {!! Form::open(['route' => 'blogs.store', 'method' => 'POST', 'files' => true, 'dir' => 'rtl']) !!}
                    
                    @include('admin.blog.form')

                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button style="width:120px;" type="submit" class="btn btn-lg btn-primary">{{ __('تدوين') }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection