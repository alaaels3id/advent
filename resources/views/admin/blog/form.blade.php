{{-- Blog title --}}
<div class="form-group row">
    <label for="title" class="pull-right col-md-4 col-form-label text-md-right">{{ __('العنوان') }}</label>

    <div class="col-md-6 col-xs-12 pull-right">

        {!! inputs('title', 'text', isset($blog) ? $blog->title : null) !!}
        
        @if ($errors->has('title'))<span class="invalid-feedback"><strong>{{ $errors->first('title') }}</strong></span> @endif
    </div>
</div>

{{-- Blog Tags --}}
<div class="form-group row">
    <label for="tags" class="pull-right col-md-4 col-form-label text-md-right">{{ __('الكلمات الدلالية') }}</label>

    <div class="col-md-6 col-xs-12 pull-right">
        {!! Form::select("tags[]", tags(), null, ['class' => $errors->has('tags') ? ' is-invalid form-control select2-multi' : 'form-control select2-multi', 'multiple' => 'multiple']) !!} 
        @if ($errors->has('tags'))<span class="invalid-feedback"><strong>{{ $errors->first('tags') }}</strong></span> @endif
    </div>
</div>

{{-- Blog Body --}}
<div class="form-group row">
    <label for="body" class="pull-right col-md-4 col-form-label text-md-right">{{ __('التدوينة') }}</label>

    <div class="col-md-6 col-xs-12 pull-right">
        {!! inputs('body', 'textarea', isset($blog) ? $blog->body : null) !!}
        @if ($errors->has('body'))<span class="invalid-feedback"><strong>{{ $errors->first('body') }}</strong></span> @endif
    </div>
</div>


 {{-- Blog Image --}}
<div class="form-group row">
    <label for="image" class="pull-right col-md-4 col-form-label text-md-right">{{ __('صورة المنشور') }}</label>

    <div class="col-md-6 col-xs-12 pull-right">
        <input id="image" type="file" class="form-control" name="image" value=""> 
        @if ($errors->has('image'))<span class="invalid-feedback"><strong>{{ $errors->first('image') }}</strong></span>@endif
    </div>
    <div class="col-md-6 col-xs-12 pull-right">
        @if(isset($blog)) 
            @if($blog->image != '')
                <img style="margin: 10px;" src="{{ $root.'/advent/uploads/blog/'.$blog->image }}" width="100" /> 
            @endif 
        @endif
    </div>
    <div class="clearfix"></div>
</div>