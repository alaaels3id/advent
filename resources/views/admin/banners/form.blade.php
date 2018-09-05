{{-- Banner head --}}
<div class="form-group row">
    <label for="head" class="pull-right col-md-4 col-form-label text-md-right">{{ __('العنوان الرئيسيي') }}</label>
    <div class="col-md-6 col-xs-12 pull-right">
        {!! inputs('head', 'text', isset($banner) ? $banner->head : null) !!} 
        @if ($errors->has('head'))<span class="invalid-feedback"><strong>{{ $errors->first('head') }}</strong></span>@endif
    </div>
</div>

{{-- Banner body --}}
<div class="form-group row">
    <label for="body" class="pull-right col-md-4 col-form-label text-md-right">{{ __('المحتوي') }}</label>
    <div class="col-md-6 col-xs-12 pull-right">
        {!! inputs('body', 'text', isset($banner) ? $banner->body : null) !!}
        @if ($errors->has('body'))<span class="invalid-feedback"><strong>{{ $errors->first('body') }}</strong></span>@endif
    </div>
</div>

{{-- category_id --}}
<div class="form-group row">
    <label for="category_id" class="pull-right col-md-4 col-form-label text-md-right">{{ __('الفئة') }}</label>

    <div class="col-md-6 col-xs-12 pull-right">
        <select required id="category_id" name="category_id" class="{{ $errors->has('category_id') ? ' is-invalid form-control' : 'form-control' }}">
            @foreach(Category() as $key => $value)
                <option value="{{ $key }}">{{ text($value) }}</option>
            @endforeach
        </select>
        @if ($errors->has('category_id'))<span class="invalid-feedback"><strong>{{ $errors->first('category_id') }}</strong></span>@endif
    </div>
</div>

{{-- Banner Image --}}
<div class="form-group row">
    <label for="image" class="pull-right col-md-4 col-form-label text-md-right">{{ __('صورة القسم') }}</label>

    <div class="col-md-6 col-xs-12 pull-right">
        <input id="image" type="file" class="form-control" name="image" value=""> 
        @if ($errors->has('image'))<span class="invalid-feedback"><strong>{{ $errors->first('image') }}</strong></span>@endif
    </div>

    <div class="col-md-6 col-xs-12 pull-right">
        @if(isset($banner)) 
            @if($banner->image != '')
                <img style="margin: 10px;" src="{{ $root.'/advent/uploads/banners/'.$banner->image }}" width="100" /> 
            @endif 
        @endif
    </div>

    <div class="clearfix"></div>
</div>