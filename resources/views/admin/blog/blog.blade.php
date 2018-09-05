@extends('admin.layout.master') 

@section('title', isset($blog->title) ? (text($blog->title)) : 'المدونة') 

@section('content')

@php 
    $image = SetImage($blog->image, 'blog'); 
    $image_user = GetImage($blog->users->image, '/public/advent/uploads/users/', '/advent/uploads/users/');
@endphp

<section class="content-header">
    <h1 class="pull-right" dir="rtl">المدونة<small>التدوينة {{ text($blog->title) }}</small></h1>
    <ol class="breadcrumb">
        <li class="h4"><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="h4"><a href="{{ route('blogs.index') }}">المدونة</a></li>
        <li class="active h4">التدوينة {{ text($blog->title) }}</li>
    </ol>
</section>

<section class="container" dir="rtl">
    <div class="row">
        <div class="col-md-8 col-md-offset-4">
            <div class="box box-primary">
                <div class="box-header" dir="rtl">العنوان : {{ text($blog->title) }}</div>
                <div class="box-body">
                    
                    <img class="img-responsive thumbnail" src="{{ $image }}" alt="IMG-BLOG">

                    <div class="flex-col-c-m size-123 bg9 how-pos5">
                        <span>{{ carbon($blog->created_at) }}</span>
                    </div>
            
                    <div style="padding-top: 32px;">
                        <h4 style="padding-bottom: 15px;">
                            <a href="{{ url('/admin-panal/blogs/i/'.$blog->id.'/'.seourl(text($blog->title, 'en'))) }}" class="pull-right">
                                {{ text($blog->title) }}
                            </a>
                        </h4>
                        <br>
                        <p class="stext-117 cl6 text-justify">{{ text($blog->body) }}</p>
                        <div class="flex-w flex-sb-m p-t-18 pull-right">
                            <span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
                                <span>
                                    <span class="cl4">بواسطة | </span> {{ ucfirst($blog->users->firstName) }} | 
                                </span>
                                <span>
                                    <strong>
                                        {{ $blog->tags->count() }}
                                        @foreach($blog->tags as $tag)
                                            <a href="{{ url($tag->name) }}" class="btn btn-default">{{ $tag->name }}</a>
                                        @endforeach
                                    </strong>
                                    <span class="cl12 m-l-4 m-r-6">|</span>
                                </span>
                                <span>التعليقات {{ '('.$blog->comment->count().')' }}</span>
                            </span>
                        </div>
                        <br><br><br>
                    </div>
                    
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-unstyled">
                                @forelse($blog->comment as $comment)
                                @php $fullname = $comment->user->firstName.' '.$comment->user->lastName; @endphp
                                <li class="list-group-item">
                                    <ul class="list-unstyled">
                                        <li><img class="pull-right" width="65" height="65" src="{{ $image_user }}"></li>
                                        <li style="padding-right: 76px;"><span class="user_name">{{ ucfirst($fullname) }}</span></li>
                                        <li style="padding-right: 76px;"><span>{{ $comment->body }}</span></li>
                                        <li style="padding-right: 76px;"><small>منذ :  {{ $comment->created_at->diffForHumans() }}</small></li>
                                    </ul>
                                </li>
                                @empty
                                <li class="list-group-item text-center"><span>{{ __('لا يوجد أي تعليقات') }}</span></li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="pull-right">
                        @php 
                            $edit = url('/admin-panal/blogs/i/'.$blog->id.'/'.seourl(text($blog->title, 'en').'/edit'));
                            $delete = url('/admin-panal/blogs/'.$blog->id.'/destroy');
                        @endphp
                        <a style="width:120px;" href="{{ $edit }}" class="btn btn-success btn-lg">تعديل</a>
                        <a style="width:120px;" href="{{ $delete }}" class="btn btn-danger btn-lg">حذف</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection