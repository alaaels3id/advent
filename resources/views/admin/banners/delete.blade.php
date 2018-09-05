@extends('admin.layout.master') 
@section('title', 'الاقسام') 
@section('content')
<div class="container-fluid">
    <div class="row">

        <section class="content-header">
            <h1 class="pull-right" dir="rtl">الاقسام<small>عرض جميع الاقسام</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="{{ route('banners.index') }}">الاقسام</a></li>
                <li class="active">عرض جميع الاقسام المحذوفة</li>
            </ol>
        </section>

        <br><br>

        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header" dir="rtl">عرض جميع الاقسام المحذوفة</div>
                <div class="box-body">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th>{{ __('#') }}</th>
                                <th>العنوات</th>
                                <th>إستعادة</th>
                                <th>حذف نهائياًُ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($trash as $trashed)
                            <tr>
                                <td>{{ $trashed->id }}</td>
                                <td>{{ text($trashed->head) }}</td>
                                <td><a href="{{ route('banners.restore', $trashed->id) }}" class="btn btn-danger">إستعادة</a></td>
                                <td>
                                    <a href="{{ route('banners.forcedelete', $trashed->id) }}" class="btn btn-danger" title="حذف نهائياًُ">
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
@endsection