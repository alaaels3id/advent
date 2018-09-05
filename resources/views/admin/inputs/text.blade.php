@php
    $array = [
        'class' => $errors->has($name.$lang) ? ' is-invalid form-control' : 'form-control', 
        'required' => 'required',
        'placeholder' => $name.' - '.$lang,
    ];
@endphp
{!! 
    Form::text($name.$lang, ($value != null) ? (text($value, $lang)) : (null), $array) 
!!}