@php
    $cla = $errors->has('colors') ? ' is-invalid form-control select2-multi2' : 'form-control select2-multi2';
    $style = 'padding:10px;margin:0px auto';
    $label = 'pull-right col-md-4 col-form-label text-md-right';
    
    function classing($name, $errors){
        return [
            'class'=>$errors->has($name) ? ' is-invalid form-control' : 'form-control',
            'id' => $name,
            'required' => 'required',
            'placeholder' => ucfirst($name),
        ];
    }
    
    function isvalid($name, $errors){
        if ($errors->has($name)) return '<span class="invalid-feedback"><strong>'.$errors->first($name).'</strong></span>';
    }
@endphp

{{-- Name --}}
<div class="form-group row">
    {!! Form::label('name', 'إسم المنتج', ['class' => $label]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        {!! inputs('name', 'text', isset($product) ? $product->name : null) !!}
        {!! isvalid('name', $errors) !!}
    </div>
</div>

{{-- price --}}
<div class="form-group row">
    {!! Form::label('price', 'السعر', ['class' => $label]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        {!! Form::text("price", old('price'), classing('price', $errors)) !!} 
        {!! isvalid('price', $errors) !!}
    </div>
</div>

{{-- model --}}
<div class="form-group row">
    {!! Form::label('model', 'المديل', ['class' => $label]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        {!! Form::text("model", old('model'), classing('model', $errors)) !!} 
        {!! isvalid('model', $errors) !!}
    </div>
</div>

{{-- brand --}}
<div class="form-group row">
    {!! Form::label('brand', 'البراند', ['class' => $label]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        {!! Form::text("brand", old('brand'), classing('brand', $errors)) !!}
        {!! isvalid('brand', $errors) !!}
    </div>
</div>

{{-- Qtn --}}
<div class="form-group row">
    {!! Form::label('qtn', 'الكمية', ['class' => $label]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        {!! Form::number("qtn", isset($product) ? intval($product->qtn) : old('qtn'), classing('qtn', $errors)) !!} 
        {!! isvalid('qtn', $errors) !!}
    </div>
</div>

{{-- category_id --}}
<div class="form-group row">
    {!! Form::label('category_id', 'الفئة المستهدفة', ['class' => $label]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        <select required id="category_id" name="category_id" class="{{ $errors->has('category_id') ? ' is-invalid form-control' : 'form-control' }}">
            @foreach(Category() as $key => $value)
                <option value="{{ $key }}">{{ text($value) }}</option>
            @endforeach
        </select>
        {!! isvalid('category_id', $errors) !!}
    </div>
</div>

{{-- Tags --}}
<div class="form-group row">
    {!! Form::label('tags', 'الكلمات الدلالية', ['class' => $label]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        {!! Form::select("tags[]", tags(), null, ['class' => $errors->has('tags') ? ' is-invalid form-control select2-multi' : 'form-control select2-multi', 'multiple' => 'multiple']) !!} 
        {!! isvalid('tags', $errors) !!}
    </div>
</div>

{{-- sizes --}}
<div class="form-group row">
    {!! Form::label('sizes', 'المقاسات', ['class' => $label]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        {!! Form::select("sizes[]", sizes(), null, ['class' => $errors->has('sizes') ? ' is-invalid form-control select2-multi' : 'form-control select2-multi', 'multiple' => 'multiple']) !!} 
        {!! isvalid('sizes', $errors) !!}
    </div>
</div>

{{-- colors --}}
<div class="form-group row">
    {!! Form::label('colors', 'اللون', ['class' => $label]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        <select class="{{ $cla }}" multiple="multiple" id="colors" name="colors[]">
            @foreach(ProductColors() as $key => $value)
                <option value="{{ $key }}">{{ text($value) }}</option>
            @endforeach
        </select>
        {!! isvalid('colors', $errors) !!}
    </div>
</div>

{{-- status --}}
<div class="form-group row">
    {!! Form::label('status', 'الحالة', ['class' => $label]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        {!! Form::select("status", status(), null, classing('status', $errors)) !!} 
        {!! isvalid('status', $errors) !!}
    </div>
</div>

{{--  discription  --}}
<div class="form-group row">
    {!! Form::label('discription', 'الوصف', ['class' => $label]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        {!! inputs('discription', 'textarea', isset($product) ? $product->discription : null) !!}
       {!! isvalid('discription', $errors) !!}
    </div>
</div>

{{-- Image --}}
<div class="form-group row">
    {!! Form::label('image', 'صورة المنتج', ['class' => $label]) !!}
    <div class="col-md-6 col-xs-12 pull-right">
        {!! Form::file('image[]', ['class'=>'form-control', 'id' => 'image', 'multiple' => 'true']) !!}
        {!! isvalid('image', $errors) !!}
        @if(isset($product)) 
            @if($product->image != '')
                @foreach(getJsonImages($product->image) as $image)
                    <img style="{{ $style }}" src="{{ $root.'/advent/uploads/products/'.$image }}" width="260" height="200" />
                @endforeach
            @endif 
        @endif
    </div>
</div>