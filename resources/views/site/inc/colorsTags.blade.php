@extends('layouts.app')

@section('title', 'Colors Tags')

@section('content')
    @include('site.inc.content', ['products' => $products, 'no' => 'no'])
@stop

