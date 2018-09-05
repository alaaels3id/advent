@extends('layouts.app')

@section('title', 'Dashboard')

@section('banner')
    @include('site.inc.banner')
@stop

@section('content')
    @include('site.inc.content', ['products' => $products])
@stop

