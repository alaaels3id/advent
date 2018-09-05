@extends('layouts.app') 

@section('title', __('cozastore.blog'))

@section('style')
    <style>
        .user_name{ font-size:14px; font-weight: bold; } 
        .media{ border-bottom: 1px dotted #ccc; }
    </style>
@stop 

@section('content')

    <!-- breadcrumb -->
    <div class="container" dir="{{ condition('rtl', 'ltr') }}">
        <br><br><br><br>
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg pull-{{ condition('right', 'left') }}">
            
            <a href="{{ route('home') }}" class="stext-109 cl8 hov-cl1 trans-04">
                {{ __('cozastore.home') }}
                <i class="fa fa-angle-{{ condition('left', 'right') }} m-l-9 m-r-10" aria-hidden="true"></i>
            </a>
            
            <a href="{{ route('blog') }}" class="stext-109 cl8 hov-cl1 trans-04">
                {{ __('cozastore.blog') }}
                <i class="fa fa-angle-{{ condition('left', 'right') }} m-l-9 m-r-10" aria-hidden="true"></i>
            </a>
            <span class="stext-109 cl4">{{ text($blog->title, isAuthOrNot()) }}</span>
        </div>
    </div>
    <br>
    
    @php
        $image = GetImage($blog->image, '/public/advent/uploads/blog/', '/advent/uploads/blog/');
        $image_user = GetImage($blog->users->image, '/public/advent/uploads/users/', '/advent/uploads/users/');
        $blog_name = seourl(text($blog->title, 'en'));
        $url = url($root.'/blog/i/'.$blog->id.'/'.$blog_name);
    @endphp
    
    <!-- Content page -->
    <section class="bg0 p-t-52 p-b-20">
        <div class="container" dir="{{ condition('rtl', 'ltr') }}">
            <div class="row">
                <div class="col-md-8 col-lg-9 p-b-80">
                    <div class="p-r-45 p-r-0-lg">

                        <div class="wrap-pic-w how-pos5-parent">
                            <img src="{{ $image }}" alt="IMG-BLOG">
                            <div class="flex-col-c-m size-123 bg9 how-pos5">
                                <span class="ltext-107 cl2 txt-center">{{ $blog->created_at->day }}</span>
                                <span class="stext-109 cl3 txt-center">{{ \Carbon\Carbon::parse($blog->created_at)->format('M Y') }}</span>
                            </div>
                        </div>
    
                        <div class="p-t-32" dir="{{ condition('rtl', 'ltr') }}">
                            <h4 class="p-b-15">
                                <a href="{{ url($root.'/blog/i/'.$blog->id.'/'.$blog_name) }}" class="ltext-108 cl2 hov-cl1 trans-04 float-{{ condition('r', 'l') }}">
                                    {{ text($blog->title, isAuthOrNot()) }}
                                </a>
                            </h4>
                            <br>
                            <p class="stext-117 cl6 text-justify">{{ text($blog->body, isAuthOrNot())}}</p>

                            <div class="flex-w flex-sb-m p-t-18 ">
                                <span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
                                    <span>
                                        <span class="cl4">{{ __('cozastore.PostedBy') }} | </span> {{ ucfirst($blog->users->firstName) }} |<span class="cl12 m-l-4 m-r-6"></span>
                                            @foreach($blog->tags as $tag)
                                                <a href="{{ url($root.'/tags/blog/i/'.$tag->id.'/'.$tag->name) }}">
                                                    <span style="border-radius: 18px; padding: 2px 20px;" class="btn btn-danger">{{ $tag->name }}</span>
                                                </a>
                                            @endforeach
                                            <span class="cl12 m-l-4 m-r-6">|</span>
                                        <span>{{ __('cozastore.comments') }} : {{ $blog->comment->count() }}</span>
                                    </span>
                                </span>
                            </div>
                            
                            <br><br><br>
                        </div>
                        
                        <br><br>
                        
                        {{--  Comment  --}}
                        <div class="p-t-40" dir="{{ condition('rtl', 'ltr') }}">
                            <h5 class="mtext-113 cl2 p-b-12">{{ __('cozastore.LeaveComment') }}</h5><br><br>
                            {!! Form::open(['url' => '/blog/i/'.$blog->id.'/'.$blog_name, 'method' => 'POST', 'dir' => 'rtl','style' => 'padding:10px;']) !!}
                            
                            <div dir="{{ condition('rtl', 'ltr') }}" class="bor19 m-b-20">
                                <textarea class="mtext-105 cl10 plh3 size-124 p-lr-18 p-tb-15" name="cmt" 
                                    placeholder="{{ __('cozastore.WriteComment') }}"></textarea>
                            </div>
                            
                            <button type="submit" 
                                class="flex-c-m pull-{{ condition('right', 'left') }} stext-101 cl0 size-125 bg3 bor2 hov-btn3 p-lr-15 trans-04">
                                {{ __('cozastore.comment') }}
                            </button>

                            {!! Form::close() !!}
                            <br><br>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-unstyled">
                                @forelse($blog->comment as $comment) 
                                
                                @php $fullname = $comment->user->firstName.' '.$comment->user->lastName; @endphp
                                
                                <li class="list-group-item">
                                    <ul class="list-unstyled">
                                        <li>
                                            <img class="p-all-5 pull-{{ condition('right', 'left') }}" width="65" height="65" src="{{ $image_user }}">
                                        </li>
                                        <li class="p-r-76"><span class="user_name">{{ ucfirst($fullname) }}</span></li>
                                        <li class="p-r-76"><span>{{ $comment->body }}</span></li>
                                        <li class="p-r-76">
                                            <i class="fa fa-clock-o"></i>
                                            <small>{{ __('cozastore.On') }} :  {{ $comment->created_at->diffForHumans() }}</small>
                                        </li>
                                    </ul>
                                </li>
                                
                                @empty
                                
                                <li><span class="text-center">{{ __('cozastore.NoComments') }}</span></li>
                                
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-4 col-lg-3 p-b-80">
                    @include('site.inc.sidemenu')
                </div>
            </div>
        </div>
    </section>
@stop