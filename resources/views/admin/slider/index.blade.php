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
                <li class="active">عرض جميع البنرات</li>
            </ol>
        </section>

        <div class="blog">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2><span class="ion-minus"></span> البنرات التي تم رفعها <span class="ion-minus"></span></h2>
                        <p>جميع البنرات علي الرئيسية للموقع</p><br>
                    </div>
                </div>

                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading" dir="rtl">عرض جميع البنرات</div>
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
                                    @forelse($sliders as $slider)
                                    @php 
                                        $banner_image = GetImage($slider->image, '/public/advent/uploads/slider/', '/advent/uploads/slider/'); 
                                    @endphp
                                    <tr>
                                        <td>{{ $slider->id }}</td>
                                        <td>{{ text($slider->title) }}</td>
                                        <td>{{ text($slider->subtitle) }}</td>
                                        <td><img src="{{ $banner_image }}" alt="{{ text($slider->title) }}" width="150" height="50"></td>
                                        <td><a class="btn btn-success btn-lg" href="{{ route('sliders.edit', $slider->id) }}">تعديل</a></td>
                                        <td>
                                            <form action="{{ $root.'/admin-panal/sliders/'.$slider->id }}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <input class="btn btn-danger btn-lg" type="submit" name="submit" value="حذف" />
                                            </form>
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
        </div>
    </div>
</div>
</div>
@endsection