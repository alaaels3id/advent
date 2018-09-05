{{-- 'co_name','co_email','co_subject','co_message','co_view','co_type' --}}
@php
    $label = 'col-md-4 pull-right col-form-label text-md-right';
    $image = GetImage($contact->image, '/public/advent/uploads/users/', '/advent/uploads/users/');
    function haserror($name, $errors){
        if($errors->has($name)){ return '<span class="invalid-feedback"><strong>'.$errors->first($name).'</strong></span>'; }
    }
    function errors($errors, $name, $option=[0=>'', 1=>'']){
        return ['class' => $errors->has($name) ? 'form-control is-invalid' : 'form-control', 'required' => 'required', $option[0] => $option[1]];
    }
@endphp

{{-- contact image --}}
<div class="form-group row">
    <label for="image" class="{{ $label }}">{{ __('صورة المرسل') }}</label>
    <div class="col-md-6 col-xs-12 pull-right">
        <img src="{{ empty($image) ? '/advent/uploads/no_image.jpg' : 'err' }}" class="img-responsive thumbnail" alt="{{ $contact->image }}">
    </div>
</div>

{{--  Contact name  --}}
<div class="form-group row">
    {!! Form::label('co_name', 'إسم المرسل', ['class' => $label]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        {!! Form::text('co_name', null, errors($errors, 'co_name')) !!}
        {!! haserror('co_name', $errors) !!}
    </div>
</div>

{{-- Contact email --}}
<div class="form-group row">
    {!! Form::label('co_email', 'البريد الالكتروني', ['class' => $label]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        {!! Form::email('co_email', null, errors($errors, 'co_email')) !!}
        {!! haserror('co_email', $errors) !!}
    </div>
</div>

{{-- Contact subject --}}
<div class="form-group row">
    {!! Form::label('co_subject', 'الموضوع', ['class' => $label]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        {!! Form::text('co_subject', null, errors($errors, 'co_subject')) !!}
        {!! haserror('co_subject', $errors) !!}
    </div>
</div>

{{-- Contact type --}}
<div class="form-group row">
    {!! Form::label('co_type', 'النوع', ['class' => $label]) !!}
    <div class="col-md-6 col-xs-12 pull-right">        
        {!! Form::select('co_type', contacts(), null, errors($errors, 'co_type')) !!}
        {!! haserror('co_type', $errors) !!}
    </div>
</div>

{{--  contact message  --}}
<div class="form-group row">
    {!! Form::label('co_message', 'الرسالة', ['class' => $label]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        {!! Form::textarea('co_message', null, errors($errors, 'co_message', ['rows', '9'])) !!}
        {!! haserror('co_message', $errors) !!}
    </div>
</div>