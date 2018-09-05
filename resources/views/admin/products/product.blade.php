@extends('admin.layout.master') 
@section('title', 'المنتجات') 
@section('content')
<section class="content-header">
    <h1 class="pull-right" dir="rtl">المنتجات<small>صفحة المنتج {{ text($product->name, 'en') }}</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin-panal') }}">الرئيسية</a></li>
        <li><a href="{{ route('products.index') }}">المنتجات</a></li>
        <li class="active">{{ text($product->name, 'en') }}</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12" dir="rtl">
            <div class="panel panel-primary">
            	
            	<div class="panel-heading">{{ text($product->name, 'en') }}</div>
            	@php 
            		$avg = GetAvg('reviews', 'product_id', $product->id, 'rate');
            		$admin = $product->users[0]; 
            	@endphp
            	
            	<div class="panel-body" style="font-size: 20px;">
            		<div class="row">
            			<div class="col-md-9">
		                    <ul class="list-group">
		                    	<li class="list-group-item">
		                    		إسم المنتج : <span class="pull-left">{{ text($product->name, 'en') }}</span>
		                    	</li>
		                    	<li class="list-group-item">
		                    		وصف المنتج : <span class="pull-left">{{ text($product->discription) }}</span>
		                    	</li>
		                    	<li class="list-group-item">
		                    		العلامة التجارية : <span class="pull-left">{{ $product->brand }}</span>
		                    	</li>
		                    	<li class="list-group-item">
		                    		السعر : <span class="pull-left">{{ getCurrence($product->price) }}</span>
		                    	</li>
		                    	<li class="list-group-item">
		                    		الكمية : <span class="pull-left">{{ $product->qtn.' '.'قطعة' }}</span>
		                    	</li>
		                    	<li class="list-group-item">
		                    		الفئة : <span class="pull-left">{{ text(Category()[$product->category_id]) }}</span>
		                    	</li>
		                    	<li class="list-group-item">
		                    		الكلمات الدلالية : 
		                    		
	                    			@foreach($product->tags as $tag)
	                    				<span style="padding: 5px;margin: 0px 0px 10px 5px;" class="pull-left label label-primary">
	                    					{{ $tag->name }}
	                    				</span>
	                    			@endforeach
		                    		
		                    	</li>
		                    	<li class="list-group-item">
		                    		المقاسات المتاحة  : 
		                    		
	                    			@foreach($product->sizes as $size)
	                    				<span style="padding: 5px;margin: 0px 0px 10px 5px;" class="pull-left label label-primary">
	                    					{{ $size->size }}
	                    				</span>
	                    			@endforeach
		                    		
		                    	</li>
		                    	<li class="list-group-item">
		                    		الالوان المتاحة : 
		                    		
	                    			@foreach($product->colors as $color)
	                    				<span 
	                    				style="
	                    						padding: 5px;margin: 0px 0px 10px 5px;background-color: {{ $color->color }};
	                    						@if($color->color == '#ffffff')
	                    							color: #000;
	                    						@elseif($color->color == '#000000')
	                    						@else
	                    							color: #fff;
	                    						@endif
	                    					" 
	                    				class="pull-left label">
	                    					{{ text($color->name) }}
	                    				</span>
	                    			@endforeach
		                    		
		                    	</li>
		                    	<li class="list-group-item">
		                    		تاريخ الرفع  : <span class="pull-left">{{ $product->created_at->format('D M Y - h:m:s') }}</span>
		                    	</li>
		                    	<li class="list-group-item">
		                    		تاريخ أخر تعديل  : <span class="pull-left">{{ $product->updated_at->format('D M Y - h:m:s') }}</span>
		                    	</li>
		                    	<li class="list-group-item">
		                    		رقم الموديل  : <span class="pull-left">{{ $product->model }}</span>
		                    	</li>
		                    	<li class="list-group-item">
		                    		حالة المنتج  : <span class="pull-left">{{ status()[$product->status] }}</span>
		                    	</li>
		                    	<li class="list-group-item">
		                    		المراجعات  : 
		                    		<span class="pull-left">
		                    		@if($avg != null)	
		                    			<label class="label label-primary">
		                    				<i class="fa fa-star">{{ $avg }}</i>
		                    			</label>
		                    		@else
		                    			<label>لا يوجد تقييم لهذا المنتج</label>
		                    		@endif
		                    		</span>
		                    	</li>
		                    	<li class="list-group-item">
		                    		عدد التقيمات  : <span class="pull-left">{{ count($product->reviews) }}</span>
		                    	</li>
		                    	<li class="list-group-item">
		                    		إسم الرافع  : <span class="pull-left">{{ adder($admin->id) }}</span>
		                    	</li>

		                    </ul>
            			</div>
            			<div class="col-md-3">
            				@php $image = url('/advent/uploads/products/'.getJsonImages($product->image)->image0); @endphp
            				<img width="600" class="img-responsive thumbnail" src="{{ $image }}" alt="IMG-BLOG">
            				<a style="width: 190px;" class="btn btn-primary btn-lg" href="{{ route('products.edit', $product->id) }}">
            					<i class="fa fa-edit"></i> <b>تعديل</b>
            				</a>
            				<a style="width: 190px;" class="btn btn-danger btn-lg" href="{{ url($root.'/admin-panal/products/'.$product->id.'/destroy') }}">
            					<i class="fa fa-trash"></i> <b>حذف</b>
            				</a>
            			</div>
            		</div>
            	</div>
            </div>
        </div>
    </div>
</section>
@stop