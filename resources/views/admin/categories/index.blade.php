@extends('admin.layout.master') 
@section('title', 'الفئات') 
@section('content')
<div class="container">
    <div class="row">
        <section class="content-header">
            <h1 class="pull-right" dir="rtl">الفئات<small>عرض جميع الفئات</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="{{ route('categories.index') }}">الفئات</a></li>
            </ol>
        </section>
        <br><br><br>
        <div class="panel panel-default">
            <div class="panel-heading" dir="rtl">جميع الفئات</div>
            <div class="panel-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('#') }}</th>
                            <th>الاسم</th>
                            <th>تعديل</th>
                            <th>حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ text($category->slug) }}</td>
                            <td><a class="btn btn-success btn-lg" href="{{ route('categories.edit', $category->id) }}">تعديل</a></td>
                            <td>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input class="btn btn-danger btn-lg" type="submit" name="submit" value="حذف" />
                                </form>
                            </td>
                        </tr>
                        @empty
                        <div class="text-center text-justify">{{ __('لا يوجد فئات حاليا') }}</div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection