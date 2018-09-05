@extends('layouts.app')

@section('title', __('cozastore.blog'))

@section('content')
<br><br>
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ $root }}/advent/images/bg-02.jpg');">
    <h2 class="ltext-105 cl0 txt-center">{{ __('cozastore.blog') }}</h2>
</section>

<!-- breadcrumb -->
<div class="container" dir="{{ condition('rtl', 'ltr') }}">
    <br><br><br><br>
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg pull-{{ condition('right', 'left') }}">
        <a href="{{ route('home') }}" class="stext-109 cl8 hov-cl1 trans-04">
            <i class="fa fa-angle-{{ condition('left', 'right') }} m-l-9 m-r-10" aria-hidden="true"></i>
            {{ __('cozastore.home') }}
        </a>
    </div>
</div>

<!-- Content page -->
<section class="bg0 p-t-62 p-b-60" dir="{{ condition('rtl', 'ltr') }}">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9 p-b-80">
                
                <div class="p-r-45 p-r-0-lg">
                    
                    <!-- item blog -->
                    @forelse($blog as $blogs)

                    @php 
                        $image = GetImage($blogs->image, '/public/advent/uploads/blog/', '/advent/uploads/blog/');
                        $blog_name = seourl(text($blogs->title, 'en'));
                    @endphp
                    
                    <div class="p-b-63">
                        <a href="{{ url($root.'/blog/i/'.$blogs->id.'/'.$blog_name) }}" class="hov-img0 how-pos5-parent">
                            <img src="{{ $image }}" alt="IMG-BLOG" height="500">

                            <div class="flex-col-c-m size-123 bg9 how-pos5">
                                <span class="ltext-107 cl2 txt-center">{{ $blogs->created_at->day }}</span>
                                <span class="stext-109 cl3 txt-center">{{ $blogs->created_at->format('M Y') }}</span>
                            </div>
                        </a>

                        <div class="p-t-32" dir="{{ condition('rtl', 'ltr') }}">
                            <h4 class="p-b-15">
                                <a href="{{ url($root.'/blog/i/'.$blogs->id.'/'.$blog_name) }}" class="ltext-108 cl2 hov-cl1 trans-04">
                                    {{ text($blogs->title, isAuthOrNot()) }}
                                </a>
                            </h4><br>
                            <p class="cl6 text-justify">{{ text($blogs->body, isAuthOrNot()) }}</p>

                            <div class="flex-w flex-sb-m p-t-18">
                                <span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
                                    <span>
                                        <span class="cl4">{{ __('cozastore.PostedBy') }} | </span> 
                                        {{ ucfirst($blogs->users->firstName) }} |
                                        <span class="cl12 m-l-4 m-r-6"></span>
                                        @foreach($blogs->tags as $tag)
                                            <a href="{{ url($root.'/tags/blog/i/'.$tag->id.'/'.$tag->name) }}">
                                                <span style="border-radius: 18px; padding: 2px 20px;" class="btn btn-danger">{{ $tag->name }}</span> 
                                            </a>
                                        @endforeach
                                        <span class="cl12 m-l-4 m-r-6">|</span>
                                    </span>
                                    <span>{{ __('cozastore.comments') }} ({{ $blogs->comment->count() }})</span>
                                </span>
                                <a href="{{ url($root.'/blog/i/'.$blogs->id.'/'.$blog_name) }}" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">{{ __('cozastore.more') }}
									<i class="fa fa-long-arrow-{{ condition('left', 'right') }} m-l-9"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    @empty
                        <div class="alert alert-primary text-center" role="alert"><h3>{{ __('cozastore.NoBlogs') }}</h3></div>
                    @endforelse

                    <!-- Pagination -->
                    <div class="flex-l-m flex-w w-full p-t-10 m-lr--7" style="margin-{{ condition('right', 'left') }}: 494px;">
                        {{ $blog->appends(Request::except('page'))->render() }}
                    </div>
                </div>

            </div>

            <div class="col-md-4 col-lg-3 p-b-80">@include('site.inc.sidemenu')</div>
        </div>
    </div>
</section>

@stop