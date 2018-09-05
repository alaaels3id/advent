@extends('admin.layout.master') 
@section('title', 'المقاسات') 
@section('content')
<div class="container">
    <div class="row">
        <section class="content-header">
            <h1 class="pull-right" dir="rtl">المقاسات<small>عرض جميع المقاسات</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="{{ route('sizes.index') }}">المقاسات</a></li>
            </ol>
        </section>
        <br><br><br>
        <div class="panel panel-default">
            <div class="panel-heading" dir="rtl">جدول المقاسات</div>
            <div class="panel-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('#') }}</th>
                            <th>المقاس</th>
                            <th>تعديل</th>
                            <th>حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sizes as $size)
                        <tr>
                            <td>{{ $size->id }}</td>
                            <td>{{ $size->size }}</td>
                            <td><a class="btn btn-success btn-lg" href="{{ route('sizes.edit', $size->id) }}">تعديل</a></td>
                            <td><a class="btn btn-danger btn-lg" href="{{ url('/admin-panal/sizes/'.$size->id.'/destroy') }}">حذف</a></td>
                        </tr>
                        @empty
                        <div class="text-center text-justify">{{ __('لا يوجد اي ألوان حالياً') }}</div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection