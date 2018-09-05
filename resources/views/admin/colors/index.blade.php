@extends('admin.layout.master') 
@section('title', 'الالوان') 
@section('content')
<div class="container">
    <div class="row">
        <section class="content-header">
            <h1 class="pull-right" dir="rtl">الالوان<small>عرض جميع الالوان</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="{{ route('colors.index') }}">الالوان</li>
            </ol>
        </section>
        <br><br><br>
        <div class="panel panel-default">
            <div class="panel-heading" dir="rtl">جدول الالوان</div>
            <div class="panel-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="info">
                            <th>{{ __('#') }}</th>
                            <th>العنوان الرئيسيي</th>
                            <th>العنوان الجانبي</th>
                            <th>الصورة</th>
                            <th>تعديل</th>
                            <th>حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($colors as $color)
                        <tr>
                            <td>{{ $color->id }}</td>
                            <td>{{ text($color->name) }}</td>
                            <td><span style="margin: 20px 10px 10px 10px; padding: 10px; color: {{ $color->color == '#ffffff' ? '#000' : '#fff' }}; background-color: {{ $color->color }}">{{ text($color->name, 'en') }}</span></td>
                            <td><a class="btn btn-success btn-lg" href="{{ route('colors.edit', $color->id) }}">تعديل</a></td>
                            <td>
                                <a class="btn btn-danger btn-lg" href="{{ url('/admin-panal/colors/'.$color->id.'/destroy') }}">حذف</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center">{{ __('لا يوجد أي بنرات') }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop