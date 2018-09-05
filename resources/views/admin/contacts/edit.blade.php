@extends('admin.layout.master') 

@section('title', 'الرسائل') 

@section('content')
<div class="container">
    <div class="row">
        <section class="content-header">
            <h1 class="pull-right" dir="rtl">الرسائل<small>تعديل الرسائل</small></h1>
            <ol class="breadcrumb">
                <li class="h4"><a href="route('admin-panal')"><i class="fa fa-dashboard"></i>الرئيسية </a></li>
                <li class="h4"><a href="{{ route('contacts.index') }}"> الرسائل</a></li>
                <li class="active h4">تعديل الرسالة</li>
            </ol>
        </section>

        <div class="col-md-12" style="margin:5px;">
            <div class="box box-default">
                <div class="box-header" dir="rtl">{!! __('تعديل بيانات الرسالة') !!}</div>
                <div class="box-body">
                    {!! Form::model($contact, ['route'=>['contacts.update', $contact->id], 'method' => 'PATCH', 'dir'=>'rtl']) !!}
                        
                        @include('admin.contacts.form')
                    
                        <div class="form-group row">
                            <div class="col-md-12 pull-right">
                                <button type="submit" style="width:150px;" class="btn btn-success btn-lg">
                                    <i class="fa fa-edit"></i>{{ __('تعديل') }}
                                </button>
                                <button 
                                    onclick="window.location.href='{{ url($root.'/admin-panal/contacts/'.$contact->id.'/destroy') }}'" 
                                    type="button" style="width:150px;" 
                                    class="btn btn-danger btn-lg">
                                    <i class="fa fa-trash"></i>&nbsp;{{ __('حذف') }}
                                </button>
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
</div>
@stop