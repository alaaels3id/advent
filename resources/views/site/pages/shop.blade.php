@extends('layouts.app')

@section('title', __('cozastore.shop'))

@section('content')
    @include('site.inc.content', ['products' => $products, 'thetitle' => 'null'])
@stop