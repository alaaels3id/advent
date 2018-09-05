{{-- Category Name --}}
@php
	$class = $errors->has('name') ? ' is-invalid form-control' : 'form-control';
@endphp
<div class="form-group row">
    <label for="name" class="pull-right col-md-4 col-form-label text-md-right">{{ __('الاسم') }}</label>

    <div class="col-md-6 col-xs-12 pull-right">
        {!! Form::text("name", old('name'), ['class' => $class, 'id' => 'name', 'required' => 'required']) !!} 
        @if ($errors->has('name'))<span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>@endif
    </div>
</div>

{{-- type --}}
<div class="form-group row">
    <label for="type" class="pull-right col-md-4 col-form-label text-md-right">{{ __('النوع') }}</label>

    <div class="col-md-6 col-xs-12 pull-right">
        {!! Form::select("type", ProductType(), null, ['class' => $errors->has('type') ? ' is-invalid form-control' : 'form-control',
        'id' => 'type', 'required' => 'required']) !!}
        
        @if ($errors->has('type'))<span class="invalid-feedback"><strong>{{ $errors->first('type') }}</strong></span>@endif
    </div>
</div>

{{-- Slug --}}
<div class="form-group row">
    <label for="slug" class="pull-right col-md-4 col-form-label text-md-right">{{ __('العنوان') }}</label>

    <div class="col-md-6 col-xs-12 pull-right">
        {!! inputs('slug', 'text',(isset($category) ? $category->slug : null)) !!} 
        @if ($errors->has('slug'))<span class="invalid-feedback"><strong>{{ $errors->first('slug') }}</strong></span>@endif
    </div>
</div>