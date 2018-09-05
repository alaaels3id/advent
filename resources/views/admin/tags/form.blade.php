{{-- Blog Tag Name --}}
<div class="form-group row">
    <label for="name" class="pull-right col-md-4 col-form-label text-md-right">{{ __('الاسم') }}</label>

    <div class="col-md-6 col-xs-12 pull-right">

        {!! Form::text("name", old('name'), ['class' => $errors->has('name') ? ' is-invalid form-control' : 'form-control', 'id'
        => 'name', 'required' => 'required']) !!} 
        @if ($errors->has('name'))<span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>@endif
    </div>
</div>