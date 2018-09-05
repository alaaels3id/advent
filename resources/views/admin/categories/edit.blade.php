@extends('admin.layout.master') 
@section('title', 'تعديل الفئات') 
@section('content')
<div class="container-fluid">
    <div class="row">
        <section class="content-header">
            <h1 class="pull-right" dir="rtl">الفئات<small>تعديل الفئات</small></h1>
            <ol class="breadcrumb">
                <li class="h4"><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li class="h4"><a href="{{ route('categories.index') }}">الفئات</a></li>
                <li class="active h4">تعديل الفئات</li>
            </ol>
        </section>
        <div class="col-md-12">
            <div class="box box-primary" dir="rtl" style="padding:20px;">
            <div class="box-body">
                {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'PATCH']) !!}
                    @include('admin.categories.form')
                    <div class="form-group row">
                        <input type="submit" style="width: 150px" name="submit" value="تعديل" class="btn btn-primary btn-lg">
                    </div> 
                {!! Form::close() !!}
            </div>
        </div>
        </div>
    </div>
</div>
@endsection