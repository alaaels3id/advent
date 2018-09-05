{{-- Faq head --}}
<div class="form-group row">
    <label for="head" class="pull-right col-md-4 col-form-label text-md-right">{{ __('السؤال') }}</label>
    <div class="col-md-6 col-xs-12 pull-right">
        {!! inputs('head', 'text', isset($faq) ? $faq->head : null) !!}
        @if ($errors->has('head'))<span class="invalid-feedback"><strong>{{ $errors->first('head') }}</strong></span> @endif
    </div>
</div>

{{-- Faq Type --}}
<div class="form-group row">
    <label for="type" class="pull-right col-md-4 col-form-label text-md-right">{{ __('النوع') }}</label>
    <div class="col-md-6 col-xs-12 pull-right">
        {!! Form::select('type', FaqsTyps(), null, ['class' => 'form-control']) !!}
        @if ($errors->has('type'))<span class="invalid-feedback"><strong>{{ $errors->first('type') }}</strong></span> @endif
    </div>
</div>

{{-- Faq Body --}}
<div class="form-group row">
    <label for="body" class="pull-right col-md-4 col-form-label text-md-right">{{ __('الإجابة') }}</label>
    <div class="col-md-6 col-xs-12 pull-right">
        {!! inputs('body', 'textarea', isset($faq) ? $faq->body : null) !!}
        @if ($errors->has('body'))<span class="invalid-feedback"><strong>{{ $errors->first('body') }}</strong></span> @endif
    </div>
</div>