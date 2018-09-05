{{-- size Name --}}
@php
	$array = [
        'class' => $errors->has('size') ? ' is-invalid form-control' : 'form-control', 
        'required' => 'required',
    ];
@endphp
<div class="form-group row">
    <label for="size" class="pull-right col-md-4 col-form-label text-md-right">{{ __('الاسم') }}</label>

    <div class="col-md-6 col-xs-12 pull-right">
    	{!! Form::text('size', null, $array) !!}
        @if ($errors->has('size'))<span class="invalid-feedback"><strong>{{ $errors->first('size') }}</strong></span>@endif
    </div>
</div>