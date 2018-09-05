@extends('admin.layout.master') 
@section('title', (isset($blog->title)) ? text($blog->title) : 'تعديل المدونة') 
@section('content')
<div class="container">
    <div class="row">

        <section class="content-header">
            <h1 class="pull-right" dir="rtl">المدونة<small>تعديل التدوينة <q>{{ text($blog->title) }}</q></small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="{{ route('blogs.index') }}">المدونة</a></li>
                <li class="active">تعديل التدوينة - {{ text($blog->title) }}</li>
            </ol>
        </section>

        <div class="col-md-12">
            
            <div class="panel panel-default">
                <div class="panel-heading" dir="rtl">تعديل التدوينة - {{ text($blog->title) }}</div>
                <div class="panel-body">

                    {!! Form::model($blog, ['route'=>['blogs.update', $blog->id], 'method'=>'PATCH', 'files'=>true, 'dir' => 'rtl']) !!}
                    
                    @include('admin.blog.form')

                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button style="width:120px;" type="submit" class="btn btn-lg btn-success">{{ __('نعديل') }}</button>
                        </div>
                    </div>
                    
                    {!! Form::close() !!}
                    <form action="{{ $root.'/admin-panal/blogs/'.$blog->id }}" method ="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" name="submit" style="width:120px;" class="btn btn-lg btn-danger">
                            {{ __('حذف') }}<i class="fa fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script type="text/javascript">
        $('.select2-multi').select2()->val({!! json_encode($blog->tags()->allRelatedIds()) !!})->trigger('change');
    </script>
@endsection