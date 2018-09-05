@extends('admin.layout.master') 
@section('title', isset($faq->head) ? text($faq->head) : 'تعديل الاسئلة') 
@section('content')
<div class="container">
    <div class="row">

        <section class="content-header">
            <h1 class="pull-right" dir="rtl">الاسئلة<small>تعديل السؤال <q>{{ text($faq->head) }}</q></small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="{{ route('faqs.index') }}">السؤالات</a></li>
                <li class="active">عديل السؤال - {{ text($faq->head) }}</li>
            </ol>
        </section>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" dir="rtl">تعديل السؤال - {{ text($faq->head) }}</div>
                <div class="panel-body">

                    {!! Form::model($faq, ['route'=>['faqs.update', $faq->id], 'method'=>'PATCH', 'dir' => 'rtl']) !!}
                    
                    @include('admin.faqs.form')

                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button style="width:120px;" type="submit" class="btn btn-lg btn-success">{{ __('نعديل') }}</button>
                        </div>
                    </div>
                    
                    {!! Form::close() !!}
                    <form action="{{ $root.'/admin-panal/faqs/'.$faq->id }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input class="btn btn-danger btn-lg" type="submit" name="submit" value="حذف" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection