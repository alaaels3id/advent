@extends('admin.layout.master') 
@section('title', 'الاعضاء') 
@section('content')
<div class="container">
    <div class="row">

        <section class="content-header">
            <h1 class="pull-right" dir="rtl">الاعضاء<small>عرض جميع الاعضاء المحذوفة</small></h1>
            <ol class="breadcrumb">
                <li class="h4"><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li class="h4"><a href="{{ route('products.index') }}">الاعضاء</a></li>
                <li class="active h4">عرض جميع الاعضاء المحذوفة</li>
            </ol>
        </section>

        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header" dir="rtl">عرض جميع الاعضاء المحذوفة</div>
                <div class="box-body">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th>{{ __('#') }}</th>
                                <th>الاسم</th>
                                <th>إستعادة</th>
                                <th>حذف نهائياً</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($trash as $trashed)
                            <tr>
                                <td>{{ $trashed->id }}</td>
                                <td>{{ $trashed->firstName.' '.$trashed->lastName }}</td>
                                <td><a href="{{ route('users.restore', $trashed->id) }}" class="btn btn-danger">إستعادة</a></td>
                                <td>
                                    <a href="{{ route('users.forcedelete', $trashed->id) }}" class="btn btn-danger" title="حذف نهائياًُ">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center h4">{{ __('لا يوجد أي محذوفات') }}</td>
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