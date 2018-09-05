@extends('admin.layout.master') 

@section('title', 'المدونة') 

@section('content')
<div class="container-fluid">
    <div class="row">

        <section class="content-header">
            <h1 class="pull-right" dir="rtl">المدونة<small>عرض جميع التدوينات</small></h1>
            <ol class="breadcrumb">
                <li class="h4"><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li class="h4"><a href="{{ route('blogs.index') }}">المدونة</a></li>
                <li class="active h4">عرض جميع المدونات المحذوفة</li>
            </ol>
        </section>

        <br><br>

        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header" dir="rtl">عرض جميع المدونات المحذوفة</div>
                <div class="box-body">
                    <table class="table table-bordered table-hover text-center">
                        <thead><tr><th>{{ __('#') }}</th><th>العنوات</th><th>إستعادة</th><th>حذف نهائياً</th></tr></thead>
                        <tbody>
                            @forelse($trash as $trashed)
                            <tr>
                                <td>{{ $trashed->id }}</td>
                                <td>{{ text($trashed->title) }}</td>
                                <td><a href="{{ route('blogs.restore', $trashed->id) }}" class="btn btn-danger">إستعادة</a></td>
                                <td>
                                    <a href="{{ route('blogs.forcedelete', $trashed->id) }}" class="btn btn-danger" title="حذف نهائياًُ">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">{{ __('لا يوجد أي محذوفات') }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <br><br>
                </div>
            </div>
        </div>

    </div>
</div>
@stop