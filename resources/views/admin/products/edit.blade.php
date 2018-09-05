@extends('admin.layout.master') 

@section('title', 'المنتجات') 

@section('content')
<div class="container">
    <div class="row">

        <section class="content-header">
            <h1 class="pull-right" dir="rtl"> المنتجات <small>تعديل المنتج <q><b>{{ text($product->name) }}</b></q></small></h1>
            <ol class="breadcrumb" dir="rtl">
                <li><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="{{ route('products.index') }}"><i class="fa fa-user"></i>المنتجات</a></li>
                <li class="active">تعديل المنتج <q>{{ text($product->name) }}</q></li>
            </ol>
        </section>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" dir="rtl">{!! text($product->name).'&nbsp;تعديل المنتج ' !!}</div>
                <div class="panel-body">
                    
                    {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'PATCH', 'files' => true, 'dir' => 'rtl']) !!}

                    @include('admin.products.form')
                
                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            
                            <button type="submit" style="width:150px;" class="btn btn-success btn-lg">
                                <i class="fa fa-edit"></i> {{ __('تعديل') }}
                            </button>

                            <a style="width:150px;" class="btn btn-danger btn-lg" href="{{ url('/admin-panal/products/'.$product->id.'/destroy') }}">
                                <i class="fa fa-trash"></i>  حذف
                            </a>

                        </div>
                    </div>
                    
                    {!! Form::close() !!}
                
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('script')
    <script type="text/javascript">
        $('.select2-multi3').select2().val({!! json_encode($product->sizes()->allRelatedIds()) !!}).trigger('change');
        $('.select2-multi2').select2().val({!! json_encode($product->colors()->allRelatedIds()) !!}).trigger('change');
        $('.select2-multi').select2().val({!! json_encode($product->tags()->allRelatedIds()) !!}).trigger('change');
    </script>
@stop