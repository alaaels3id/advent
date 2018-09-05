@php
    $array = [
        'class' => $errors->has($name.$lang) ? ' is-invalid form-control' : 'form-control', 
        'required' => 'required',
        'placeholder' => $name.' - '.$lang,
        'style' => 'resize:none;',
        'rows' => '5',
    ];
@endphp
{!! 
    Form::textarea($name.$lang, ($value != null) ? (text($value, $lang)) : (null), $array) 
!!}