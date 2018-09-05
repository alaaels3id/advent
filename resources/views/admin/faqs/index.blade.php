@extends('admin.layout.master') 
@section('title', 'الاسئلة الشائعة') 
@section('content')
<div class="container">
    <div class="row">
        <section class="content-header">
            <h1 class="pull-right" dir="rtl">الاسئلة الشائعة<small>عرض جميع الاسئلة الشائعة</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="{{ route('faqs.index') }}">الاسئلة الشائعة</li>
                <li class="active">عرض جميع الاسئلة الشائعة</li>
            </ol>
        </section>

        <div class="blog">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3 text-center">
                        <h2><span class="ion-minus"></span> الاسئلة الشائعة التي تم رفعها <span class="ion-minus"></span></h2>
                        <p>جميع الاسئلة الشائعة علي الرئيسية للموقع</p><br>
                    </div>
                </div>

                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading" dir="rtl">عرض جميع الاسئلة</div>
                        <div class="panel-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="info">
                                        <th>{{ __('#') }}</th>
                                        <th>السؤال</th>
                                        <th>الاجابة</th>
                                        <th>تعديل</th>
                                        <th>حذف</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($faqs as $faq)
                                    <tr>
                                        <td>{{ $faq->id }}</td>
                                        <td>{{ str_limit(text($faq->head), 30, '...') }}</td>
                                        <td>{{ str_limit(text($faq->body), 30, '...') }}</td>
                                        <td>
                                            <a class="btn btn-success btn-lg" href="{{ route('faqs.edit', $faq->id) }}">تعديل</a>
                                        </td>
                                        <td>
                                            <a href="{{ url('/admin-panal/faqs/'.$faq->id.'/destroy') }}" class="btn btn-danger btn-lg">حذف</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center">{{ __('لا يوجد أي أسئلة') }}</td>
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