@extends('layouts.app')

@section('title', __('cozastore.welcome'))

@section('slider')
    @include('site.inc.sidebar')
@endsection

@section('banner')
    @include('site.inc.banner')
@endsection

@section('content')
    @include('site.inc.content', ['products' => $products])
@endsection
