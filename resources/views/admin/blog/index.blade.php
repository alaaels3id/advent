@extends('admin.layout.master') 

@section('title', 'اﻟﻤﺪﻭﻧﺔ') 

@section('content')
<div class="container">
    <div class="row">

        <section class="content-header">
            <h1 class="pull-right" dir="rtl">اﻟﻤﺪﻭﻧﺔ<small>ﻋﺮﺽ ﺟﻤﻴﻊ اﻟﺘﺪﻭﻳﻨﺎﺕ</small></h1>
            <ol class="breadcrumb">
                <li class="h4"><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> اﻟﺮﺋﻴﺴﻴﺔ</a></li>
                <li class="h4"><a href="{{ route('blogs.index') }}">اﻟﻤﺪﻭﻧﺔ</a></li>
                <li class="active h4">ﺇﺿﺎﻓﺔ ﺗﺪﻭﻳﻨﺔ ﺟﺪﻳﺪ</li>
            </ol>
        </section>
        <br><br>
        <div class="col-md-12">
           <div class="box box-primary">
                <div class="box-header box-title" dir="rtl">ﻋﺮﺽ ﺟﻤﻴﻊ اﻟﺘﺪﻭﻳﻨﺎﺕ</div>
                <div class="box-body">
                    <table class="text-center table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اﻟﺼﻮﺭﺓ</th>
                                <th>اﻻﺳﻢ</th>
                                <th>المحتوي</th>
                                <th>صاحب التدوينة</th>
                                <th>تاريخ الرفع</th>
                                <th>تعديل/حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($posts as $blog)
                            
                            @php 
                                $post_image = GetImage($blog->image, '/public/advent/uploads/blog/', '/advent/uploads/blog/');
                                $url = url('/admin-panal/blogs/i/'.$blog->id.'/'.seourl(text($blog->title, 'en')));
                                $edit = url('/admin-panal/blogs/i/'.$blog->id.'/'.seourl(text($blog->title, 'en').'/edit'));
                                $delete = url('/admin-panal/blogs/'.$blog->id.'/destroy');
                            @endphp
                            
                            <tr style="cursor: pointer;" onclick="window.location.href='{{ $url }}'">
                                <td>{{ $blog->id }}</td>
                                <td>
                                    <a href="{{ $url }}">
                                        <img src="{{ $post_image }}" alt="{{ text($blog->title, 'en') }}" width="100" height="100">
                                    </a>
                                </td>
                                <td><a href="{{ $url }}">{{ str_limit(text($blog->title, 'en'), 50, '...') }}</a></td>
                                <td><p>{{ str_limit(text($blog->body), 160) }}</p></td>
                                <td>
                                    <a href="{{ route('admins.show', $blog->users->id) }}">
                                        {{ getFullname($blog->users->id) }}
                                    </a>
                                </td>
                                <td><i class="fa fa-clock-o"></i> {{ carbon($blog->created_at) }}</td>
                                <td>
                                    <a style="width:120px;" href="{{ $edit }}" class="btn btn-success btn-lg">تعديل</a>
                                    <a style="width:120px;" href="{{ $delete }}" class="btn btn-danger btn-lg">حذف</a>
                                </td>
                            </tr>
                           
                            @empty
                                <tr>
                                    <td colspan="7">
                                        <div class="alert alert-success text-center" role="alert">
                                            <h3>{{ __('ًﻻ ﻳﻮﺟﺪ ﺃﻱ ﻣﺪﻭﻧﺎﺕ ﺣﺎﻟﻴﺎ') }}</h3>
                                        </div>        
                                    </td>
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