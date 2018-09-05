@extends('admin.layout.master') 
@section('title', 'الاقسام') 
@section('content')
<div class="container">
    <div class="row">
        <section class="content-header">
            <h1 class="pull-right" dir="rtl">الاقسام<small>عرض جميع الاقسام</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="{{ route('sliders.index') }}">الاقسام</a></li>
                <li class="active">عرض جميع الاقسام</li>
            </ol>
        </section>

        <div class="blog">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3 text-center">
                        <h2><span class="ion-minus"></span> الاقسام التي تم رفعها <span class="ion-minus"></span></h2>
                        <p>جميع الاقسام علي الرئيسية للموقع</p><br>
                    </div>
                </div>

                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading" dir="rtl">عرض جميع الاقسام</div>
                        <div class="panel-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="info">
                                        <th>{{ __('#') }}</th>
                                        <th>العنوان</th>
                                        <th>المحتوي</th>
                                        <th>الصورة</th>
                                        <th>تعديل</th>
                                        <th>حذف</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($banners as $banner)
                                    @php 
                                        $banner_image = GetImage($banner->image, '/public/advent/uploads/banners/', '/advent/uploads/banners/'); 
                                    @endphp
                                    <tr>
                                        <td>{{ $banner->id }}</td>
                                        <td>{{ text($banner->head, 'ar') }}</td>
                                        <td>{{ text($banner->body, 'ar') }}</td>
                                        <td><img src="{{ $banner_image }}" alt="{{ text($banner->head, 'ar') }}" width="150" height="50"></td>
                                        <td><a class="btn btn-success btn-lg" href="{{ route('banners.edit', $banner->id) }}">تعديل</a></td>
                                        <td>
                                            <form action="{{ $root.'/admin-panal/banners/'.$banner->id }}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <input class="btn btn-danger btn-lg" type="submit" name="submit" value="حذف" />
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center">{{ __('لا يوجد أي أقسام') }}</td>
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