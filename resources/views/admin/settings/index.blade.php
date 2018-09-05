@extends('admin.layout.master') 

@section('title', 'التعديل علي اعدادات الموقع') 

@section('content')

<div class="container">
    <div class="row">
        <section class="content-header">
            <h1 class="pull-right" dir="rtl"> الاعدادات <small>تعديل اعدادات العامة للموقع</small></h1>
            <ol class="breadcrumb">
                <li class="h4"><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li class="active h4"> الاعدادات</li>
            </ol>
        </section>
        <div class="col-md-12">
            <div class="box box-primary" dir="rtl">
                <div class="box-body">
                    {!! Form::open(['route' => 'settings', 'method' => 'POST', 'files'=>true, 'dir'=>'rtl']) !!}
                    @forelse($settings as $set)
                        @php 
                            $image = GetImage($set->value, '/public/advent/uploads/', '/advent/uploads/'); 
                        @endphp
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 pull-right col-form-label text-md-right">{{ ucfirst(__($set->slug)) }}</label>
                            <div class="col-md-8">
                                
                                {{-- this code for normal textbox --}}
                                @if($set->type == 0)
                                {!! Form::text($set->name, $set->value, ['class' => 'form-control']) !!}
                                {{-- This code for file input type --}}
                                @elseif($set->type == 2)
                                    
                                    @if($set->value != '')
                                        <img src="{{ $image }}" alt="Image" style="margin:20px 0px;" width="150">
                                    @endif
                                    
                                    <br><code style="margin:10px 0px;">{{ $set->value }}</code>
                                    <input type="file" name="{{ $set->name }}" class="form-control" style="margin:10px 0px;"><br>
                                
                                @else
                                    {!! inputs($set->name, 'textarea', $set->value) !!}
                                @endif
                            </div>
                        </div>
                    @empty
                        <h3>لا يوجد أي إعدادات متاحة حالياً</h3>
                    @endforelse
                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" name="submit" class="btn btn-app"><i class="fa fa-save"></i>{{ ('حفظ') }}</button>
                            <a href="{{ url($root.'/admin-panal/settings/create') }}" class="btn btn-app"><i class="fa fa-plus"></i>{{ __('إضافة إعداد جديد') }}</a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection