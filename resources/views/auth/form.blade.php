@php
    $class = 'pull-right col-md-4 col-form-label text-md-right';
    function classing($name, $errors){
        return ['class'=>$errors->has($name) ? ' is-invalid form-control' : 'form-control','id' => $name,'required' => 'required'];
    }
    function isvalid($name, $errors){
        if ($errors->has($name)){
            return '<span class="invalid-feedback"><strong>'.$errors->first($name).'</strong></span>';
        }
    }
    //isset($info) ? dd($info['name']) : 'no';
@endphp

{{-- First Name --}}
<div class="form-group row">
    {!! Form::label('firstName', 'الإسم الاول', ['class' => $class]) !!}
    <div class="col-md-6 col-xs-12 pull-right">

        {!! Form::text("firstName", isset($info) ? $info['name'] : old('firstName'), classing('firstName', $errors)) !!} 
        {{ isvalid('firstName', $errors) }}
    </div>
</div>

{{-- Last Name --}}
<div class="form-group row">
    {!! Form::label('lastName', 'سم العائلة', ['class' => $class]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        {!! Form::text("lastName", old('lastName'), classing('lastName', $errors)) !!}
        {{ isvalid('lastName', $errors) }}
    </div>
</div>

{{-- Username --}}
<div class="form-group row">
    <label for="username" class="{{ $class }}">{{ __('اسم الامستخدم') }}</label>

    <div class="col-md-6 col-xs-12 pull-right">
        {!! Form::text("username", old('username'), classing('username', $errors)) !!} 

        {{ isvalid('username', $errors) }}
    </div>
</div>

{{-- DOB --}}
<div class="form-group row">
    <label for="dob" class="{{ $class }}">{{ __('تاريخ الميلاد') }}</label>

    <div class="col-md-6 col-xs-12 pull-right">
        {!! Form::date( 'dob', (isset($user) ? $user->dob : old('dob')), classing('dob', $errors)) !!} 
        {{ isvalid('dob', $errors) }}
    </div>
</div>

{{-- mobile --}}
<div class="form-group row">
    <label for="mobile" class="{{ $class }}">{{ __('رقم الهاتف الجوال') }}</label>
    <div class="col-md-6 col-xs-12 pull-right">
        {!! Form::text("mobile", old('mobile'), classing('mobile', $errors)) !!} 
        {{ isvalid('mobile', $errors) }}
    </div>
</div>

{{-- gender --}}
<div class="form-group row">
    {!! Form::label('gender', 'الجنس', ['class' => $class]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        {!! Form::select("gender", gender(), null, classing('gender', $errors)) !!} 
        {{ isvalid('gender', $errors) }}
    </div>
</div>

{{-- Jop --}}
<div class="form-group row">
    {!! Form::label('jop', 'المسمي الوظيفي', ['class' => $class]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        {!! Form::text("jop", old('jop'), classing('jop', $errors)) !!} 
        {{ isvalid('jop', $errors) }}
    </div>
</div>

{{-- location --}}
<div class="form-group row">
    {!! Form::label('localtion', 'محل الاقامة', ['class'=>$class]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        {!! Form::text("location", old('location'), classing('location', $errors)) !!} 
        {{ isvalid('location', $errors) }}
    </div>
</div>

{{-- Email --}}
<div class="form-group row">
    {!! Form::label('email', 'البريد الإلكتروني', ['class'=>$class]) !!}
    <div class="col-md-6 col-xs-12 pull-right" style="{{ isset($info) ? 'background-color: aliceblue;' : '' }}">
        {!! Form::email("email", isset($info) ? $info['email'] : old('email'), classing('email', $errors)) !!} 
        {{ isvalid('email', $errors) }}
    </div>
</div>

{{-- Password --}}
<div class="form-group row">
    {!! Form::label('password', 'كلمة السر', ['class'=> $class]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        {!! Form::password('password', ['class'=>'form-control', 'required'=>'required']) !!} 
        {{ isvalid('password', $errors) }}
    </div>
</div>

{{-- Confirm Password --}}
<div class="form-group row ">
    {!! Form::label('password-confirm', 'تاكيد كلمة السر', ['class' => $class]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        {!! Form::password('password_confirmation', ['class'=>'form-control', 'required'=>'required']) !!}
    </div>
</div>