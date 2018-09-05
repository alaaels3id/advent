@extends('admin.layout.master') 

@section('title', 'الطلبات') 

@section('content')
<div class="container-fluid">
    <div class="row">

        <section class="content-header">
            <h1 class="pull-right" dir="rtl">الطلبات<small>عرض جميع الطلبات المكتملة</small></h1>
            <ol class="breadcrumb">
                <li class="h4"><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li class="h4"><a href="{{ route('orders.index') }}">الطلبات</a></li>
                <li class="active h4">عرض جميع الطلبات التي تم تسليمها</li>
            </ol>
        </section>

        <br><br>

        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-body">
                    <table class="table table-bordered table-hover text-center" style="margin-bottom: 10px;">
                        <thead class="h4">
                            <tr>
                                <th>{{ __('#') }}</th>
                                <th>إسم العميل</th>
                                <th>عدد المنتجات</th>
                                <th>الاجمالي</th>
                                <th>إستعادة</th>
                                <th>حذف نهائياً</th>
                            </tr>
                        </thead>
                        <tbody class="h4">
                            @forelse($trash as $trashed)
                            @php
                                $ord = json_decode($trashed->products);
                            @endphp
                            <tr>
                                <td>{{ $trashed->id }}</td>
                                <td>{{ ucfirst(getOrderedUser($trashed->custumer_id)->firstName).' '.ucfirst(getOrderedUser($trashed->custumer_id)->lastName) }}</td>
                                <td>{{ count($ord->ids) }}</td>
                                <td>{{ getCurrence($trashed->total) }}</td>
                                <td><a href="{{ route('orders.restore', $trashed->id) }}" class="btn btn-danger">إستعادة</a></td>
                                <td>
                                    <a href="{{ route('orders.forcedelete', $trashed->id) }}" class="btn btn-danger" title="حذف نهائياًُ">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center h2"><b>{{ __('لا يوجد طلبات') }}</b></td>
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