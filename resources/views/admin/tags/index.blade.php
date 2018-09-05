@extends('admin.layout.master') 
@section('title', 'الكلمات الدلالية') 
@section('content')
<div class="container">
    <div class="row">
        
        <section class="content-header">
            <h1 class="pull-right" dir="rtl">الكلمات الدلالية<small>عرض جميع الكلمات الدلالية</small></h1>
            <ol class="breadcrumb">
                <li class="h4"><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li class="h4"><a href="{{ route('tags.index') }}">الكلمات الدلالية</a></li>
            </ol>
        </section>
        
        <br><br><br>
        
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header h4" dir="rtl">جدول الكلمات الدلالية</div>
                <div class="box-body">
                    <table class="table table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th>{{ __('#') }}</th>
                                <th>الاسم</th>
                                <th>تعديل/حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tags as $tag)
                            <tr>
                                <td>{{ $tag->id }}</td>
                                <td><h4>{{ $tag->name }}</h4></td>
                                <td>
                                    <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-success btn-lg">تعديل</a>
                                    <a href="{{ route('tags.destroy', $tag->id) }}" class="btn btn-danger btn-lg">حذف</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3">
                                    <div class="text-center text-justify">{{ __('لا يوجد اي كلمات دلالية حالياً') }}</div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop