@extends('layouts.app')

@section('title', __('cozastore.blog'))

@section('content')

<!-- breadcrumb -->
<div class="container" dir="{{ condition('rtl', 'ltr') }}">
    <br><br><br><br>
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg pull-{{ condition('right', 'left') }}">
        <a href="javascript:void(0);" class="stext-109 cl8 hov-cl1 trans-04">
            <i class="fa fa-angle-{{ condition('left', 'right') }} m-l-9 m-r-10" aria-hidden="true"></i>
            {{ isset($tag) ? $tag : '' }}
        </a>
    </div>
</div>

<!-- Content page -->
<section class="bg0 p-t-62 p-b-60" dir="{{ condition('rtl', 'ltr') }}">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9 p-b-80">
                <table class="table text-center table-hover">

                    <thead>
                        <tr>
                            <th>Name</th>
                        </tr>
                    </thead>

                    <!-- item blog -->
                    @forelse($blog as $blogs)

                    @php 
                        $image = SetImage($blogs->image, 'blog'); 
                        $blog_name = seourl(text($blogs->title, 'en'));
                    @endphp

                    <tr>
                        <td style="cursor: pointer;" onclick="window.location.href='{{ url($root.'/blog/i/'.$blogs->id.'/'.$blog_name) }}'">
                            <span>{{ ucfirst(text($blogs->title, isAuthOrNot())) }}</span>
                            <img src="{{ $image }}" alt="IMG-BLOG" class="pull-{{ condition('right', 'left') }} p-all-5" height="50" width="100">
                        </td>
                    </tr>

                    @empty
                    <tr><td colspan="1"><div class="alert alert-primary text-center" role="alert"><h3>{{ __('cozastore.NoBlogs') }}</h3></div></td></tr>
                    @endforelse
                </table>
                <!-- Pagination -->
                <div class="text-center flex-l-m flex-w w-full p-t-10 m-lr--7">{{ $blog->appends(Request::except('page'))->render() }}</div>

            </div>

            <div class="col-md-4 col-lg-3 p-b-80">@include('site.inc.sidemenu')</div>
        </div>
    </div>
</section>

@endsection

{{-- <div class="p-b-63">
    
    

    <div class="p-t-32" dir="{{ condition('rtl', 'ltr') }}">
        
        <h4 class="p-b-15">
            <a href="{{ url($root.'/blog/i/'.$blogs->id.'/'.$blog_name) }}" class="ltext-108 cl2 hov-cl1 trans-04">
                {{ text($blogs->title, isAuthOrNot()) }}
            </a>
        </h4>
        
        <p class="cl6 text-justify">{{ text($blogs->body, isAuthOrNot()) }}</p>
        <span>{{ __('cozastore.comments') }} ({{ $blogs->comment->count() }})</span>

    </div>
</div> --}}