@extends('admin.layout.master') 

@section('title', 'الاعضاء') 

@section('content')

<section class="content-header">
    <h1 class="pull-right" dir="rtl">الاعضاء<small>تعديل العضو <q>{{ $user->firstName }}</q></small></h1>
    <ol class="breadcrumb">
        <li class="h4"><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="h4"><a href="{{ route('users.index') }}">الاعضاء</a></li>
        <li class="active h4">{{ $user->firstName }}</li>
    </ol>
</section>

<br><br>

<section style="padding: 20px; margin: 20px;">
    <div class="box box-primary">
        <div class="box-header" dir="rtl">{!! __($user->firstName.' '.'تعديل بيانات العضو ') !!}</div>
        <div class="box-body">
        {!! Form::model($user, ['route'=>['users.update', $user->id], 'method'=>'PATCH', 'files' => true, 'dir' => 'rtl']) !!}

            @include('admin.users.form')
        
            <div class="form-group row mb-0">
                <div class="col-md-12 col-xs-12">
                    <button type="submit" style="width:150px;" class="btn btn-success btn-lg"><i class="fa fa-edit"></i>{{ __('تعديل') }}</button>
                    @if($user->role != 1)
                        <a style="width:150px;" href="{{ url('/admin-panal/users/'.$user->id.'/destroy') }}" class="btn btn-danger btn-lg">
                            <i class="fa fa-trash-o"></i> حذف
                        </a>
                    @endif
                </div>
            </div>
        
        {!! Form::close() !!}
        </div>
    </div>
                
    <div class="box box-danger">
        <div class="box-header" dir="rtl">{{ __('تغير كلمة المرور') }}</div>
        <div class="box-body">
            {!! Form::open(['url' => '/admin-panal/users/PasswordChange', 'method' => 'POST', 'dir' => 'rtl']) !!}
            <div class="form-group row">
                <label for="password" class="pull-right col-md-4 col-form-label text-md-right">{{ __('كلمة المرور') }}</label>
            
                <div class="col-md-6 col-xs-12 pull-right">
                    {!! Form::hidden('user_id', $user->id) !!}
                    {!! Form::password('password', ['class'=>'form-control', 'required'=>'required']) !!}
                    @if($errors->has('password'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('password') }}</strong></span> 
                    @endif
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-12 col-xs-12">
                    <button type="submit" style="width:150px;" class="btn btn-success btn-lg">
                        <i class="fa fa-edit"></i> {{ __('تغير كلمة المرور ') }}
                    </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection