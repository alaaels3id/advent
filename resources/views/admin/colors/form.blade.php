@php
	function classes($errors, $name){
		return [
			'class' => $errors->has($name) ? ' is-invalid form-control' : 'form-control', 
			'id' => $name, 
			'required' => 'required'
		];
	}
	function GetError($errors, $name){
		($errors->has($name)) ? '<span class="invalid-feedback"><strong>'.$errors->first($name).'</strong></span>' : '';
	}
	$class = 'pull-right col-md-4 col-form-label text-md-right';
@endphp

{{-- Color Name --}}
<div class="form-group row">
	{!! Form::label('name', 'الاسم', ['class' => $class]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
    	{!! inputs('name', 'text', isset($color) ? $color->name : null) !!}
        {{ GetError($errors, 'name') }}
    </div>
</div>

{{-- Color Name --}}
<div class="form-group row">
	{!! Form::label('color', 'اللون', ['class' => $class]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        {!! Form::color("color", old('color'), classes($errors, 'color')) !!} 
        {{ GetError($errors, 'color') }}
    </div>
</div>