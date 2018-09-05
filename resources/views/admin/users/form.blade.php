@php
    $label = 'pull-right col-md-4 col-form-label text-md-right';
    
    function classing($name, $errors, $style = ''){
        return [
            'class' => $errors->has($name) ? ' is-invalid form-control' : 'form-control',
            'id' => $name, 'required' => 'required', 'placeholder' => ucfirst($name), 'style' => $style,
        ];
    }
    
    function isvalid($name, $errors){ if ($errors->has($name)) return '<span class="invalid-feedback"><strong>'.$errors->first($name).'</strong></span>'; }
@endphp

{{-- First Name --}}
<div class="form-group row">
    {!! Form::label('firstName', 'الإسم الاول', ['class' => $label]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        {!! isvalid('firstName', $errors) !!}
        {!! Form::text("firstName", old('firstName'), classing('firstName', $errors)) !!}
    </div>
</div>

{{-- Last Name --}}
<div class="form-group row">
    {!! Form::label('lastName', 'إسم العائلة', ['class' => $label]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        {!! isvalid('lastName', $errors) !!}
        {!! Form::text("lastName", old('lastName'), classing('lastName', $errors)) !!}
    </div>
</div>

{{-- Username --}}
<div class="form-group row">
    {!! Form::label('username', 'إسم المستخدم', ['class' => $label]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        {!! isvalid('username', $errors) !!}
        {!! Form::text("username", old('username'), classing('username', $errors)) !!} 
    </div>
</div>


{{-- DOB --}}
<div class="form-group row">
    {!! Form::label('dob', 'تاريخ الميلاد', ['class' => $label]) !!}

    <div class="col-md-6 col-xs-12 pull-right">
        {!! Form::date( 'dob', (isset($user) ? $user->dob : old('old')), [ 'class' => $errors->has('dob') ? ' is-invalid form-control'
        : 'form-control', 'id' => 'dob', 'required' => 'required' ] ) !!} 
        {!! isvalid('dob', $errors) !!}
    </div>
</div>

{{-- mobile --}}
<div class="form-group row">
    {!! Form::label('mobile', 'رقم الهاتف الجوال', ['class' => $label]) !!}

    <div class="col-md-6 col-xs-12 pull-right">
        {!! isvalid('mobile', $errors) !!}
        {!! Form::tel("mobile", old('mobile'), classing('mobile', $errors)) !!} 
    </div>
</div>

{{-- gender --}}
<div class="form-group row">
    {!! Form::label('gender', 'الجنس', ['class' => $label]) !!}

    <div class="col-md-6 col-xs-12 pull-right">
        {!! isvalid('gender', $errors) !!}
        {!! Form::select("gender", gender(), null, ['class' => $errors->has('gender') ? ' is-invalid form-control' : 'form-control',
        'id' => 'gender', 'required' => 'required']) !!} 
    </div>
</div>

{{-- Jop --}}
<div class="form-group row">
    {!! Form::label('role', 'المسمي الوظيفي', ['class' => $label]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        {!! isvalid('jop', $errors) !!}
        {!! Form::text("jop", old('jop'), classing('jop', $errors)) !!} 
    </div>
</div>

{{-- About --}}
<div class="form-group row">
    {!! Form::label('about', 'نبذة عنك', ['class' => $label]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        {!! isvalid('about', $errors) !!}
        {!! Form::textarea("about", old('about'), classing('about', $errors)) !!} 
    </div>
</div>

{{-- location --}}
<div class="form-group row">
    {!! Form::label('location', 'محل الاقامة', ['class' => $label]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        {!! isvalid('location', $errors) !!}
        {!! Form::text("location", old('location'), classing('location', $errors)) !!} 
    </div>
</div>

{{-- Email --}}
<div class="form-group row">
    {!! Form::label('email', 'البريد الإلكتروني', ['class' => $label]) !!}

    <div class="col-md-6 col-xs-12 pull-right">
        {!! isvalid('email', $errors) !!}
        {!! Form::email("email", old('email'), classing('email', $errors)) !!} 
    </div>
</div>


{{-- in case you make any edit on users data; --}}
@if(!isset($user) && !isset($admin) && !isset($auth))

{{-- Password --}}
<div class="form-group row">
    {!! Form::label('password', 'كلمة السر', ['class' => $label]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        {!! Form::password('password', ['class'=>'form-control', 'required' => 'required']) !!}
        {!! isvalid('password', $errors) !!}
    </div>
</div>

{{-- Confirm Password --}}
<div class="form-group row ">
    {!! Form::label('password-confirm', 'تاكيد كلمة السر', ['class' => $label]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        {!! Form::password('password_confirmation', ['class'=>'form-control', 'id'=>'password-confirm','required'=>'required']) !!}
    </div>
</div>

@endif
{{-- / in case you make any edit on users data; --}}
{{-- Image --}}
<div class="form-group row">
    {!! Form::label('image', 'الصورة الشخصية', ['class' => $label]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        <input id="image" type="file" class="form-control" name="image" value=""> 
        {!! isvalid('image', $errors) !!}
        @if(isset($user)) 
            @if($user->image != '')
                <img style="margin: 10px;" src="{{ $root.'/advent/uploads/users/'.$user->image }}" width="260" height="260" /> 
            @endif 
        @endif
    </div>
    <div class="clearfix"></div>
</div>