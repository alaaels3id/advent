{{-- Slider title --}}
<div class="form-group row">
    <label for="title" class="pull-right col-md-4 col-form-label text-md-right">{{ __('العنوان الرئيسيي') }}</label>
    <div class="col-md-6 col-xs-12 pull-right">
        {!! inputs('title', 'text', isset($slider) ? $slider->title : null) !!}
        @if ($errors->has('title'))<span class="invalid-feedback"><strong>{{ $errors->first('title') }}</strong></span> @endif
    </div>
</div>

{{-- Slider Subtitle --}}
<div class="form-group row">
    <label for="subtitle" class="pull-right col-md-4 col-form-label text-md-right">{{ __('عنوان جانبي') }}</label>
    <div class="col-md-6 col-xs-12 pull-right">
        {!! inputs('subtitle', 'text', isset($slider) ? $slider->subtitle : null) !!}
        @if ($errors->has('subtitle'))<span class="invalid-feedback"><strong>{{ $errors->first('subtitle') }}</strong></span> @endif
    </div>
</div>

{{-- Slider Image --}}
<div class="form-group row">
    <label for="image" class="pull-right col-md-4 col-form-label text-md-right">{{ __('صورة البنر') }}</label>

    <div class="col-md-6 col-xs-12 pull-right">
        <input id="image" type="file" class="form-control" name="image" value=""> 
        @if ($errors->has('image'))<span class="invalid-feedback"><strong>{{ $errors->first('image') }}</strong></span>@endif
    </div>
    
    <div class="col-md-6 col-xs-12 pull-right">
        @if(isset($slider)) 
            @if($slider->image != '')
                <img style="margin: 10px;" src="{{ $root.'/advent/uploads/slider/'.$slider->image }}" width="100" /> 
            @endif 
        @endif
    </div>
    
    <div class="clearfix"></div>
</div>