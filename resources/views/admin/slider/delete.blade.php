@extends('admin.layout.master') 
@section('title', 'البنرات') 
@section('content')
<div class="container">
    <div class="row">

        <section class="content-header">
            <h1 class="pull-right" dir="rtl">البنرات<small>عرض جميع البنرات</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="{{ route('sliders.index') }}">البنرات</a></li>
                <li class="active">عرض جميع البنرات المحذوفة</li>
            </ol>
        </section>

        <div class="blog">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3 text-center">
                        <h2><span class="ion-minus"></span>البنرات<span class="ion-minus"></span></h2>
                        <p>جميع البنرات علي الرئيسية للموقع</p><br>
                    </div>
                </div>

                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading" dir="rtl">عرض جميع البنرات المحذوفة</div>
                        <div class="panel-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="info">
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
                                        <td>{{ text($trashed->title) }}</td>
                                        <td><a href="{{ route('sliders.restore', $trashed->id) }}" class="btn btn-danger">إستعادة</a></td>
                                        <td>
                                            <a href="{{ route('sliders.forcedelete', $trashed->id) }}" class="btn btn-danger" title="حذف نهائياًُ">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center">{{ __('لا يوجد أي محذوفات') }}</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection