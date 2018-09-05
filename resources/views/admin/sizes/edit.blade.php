@extends('admin.layout.master') 
@section('title', 'تعديل المقاسات') 
@section('content')
<div class="container">
    <div class="row">
        <section class="content-header">
            <h1 class="pull-right" dir="rtl">المقاسات<small>تعديل المقاسات</small></h1>
            <ol class="breadcrumb" style="direction: rtl;">
                <li><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="{{ route('sizes.index') }}">المقاسات</a></li>
                <li class="active">عديل اللون</li>
            </ol>
        </section>
        <div class="panel panal-default" dir="rtl" style="padding:20px;">
            <div class="panal-heading" dir="rtl">تعديل اللون</div>
            <div class="panel-body">
                {!! Form::model($size, ['route' => ['sizes.update', $size->id], 'method' => 'PATCH']) !!}
                    @include('admin.sizes.form')
                    <div class="form-group row">
                        <input type="submit" name="submit" value="تعديل" class="btn btn-primary btn-lg">
                    </div> 
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection