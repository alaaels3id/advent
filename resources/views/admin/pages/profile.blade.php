@extends('admin.layout.master')

@section('title', 'الملف الشخصي')

@section('style')
<style type="text/css">

.glyphicon { margin-right:5px; }
.thumbnail
{
    margin-bottom: 20px;
    padding: 0px;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    border-radius: 0px;
}

.item.list-group-item
{
    float: none;
    width: 100%;
    background-color: #fff;
    margin-bottom: 10px;
}

.item.list-group-item .list-group-image
{
    margin-right: 10px;
}
.item.list-group-item .thumbnail
{
    margin-bottom: 0px;
}
.item.list-group-item .caption
{
    padding: 9px 9px 0px 9px;
}
.item.list-group-item:nth-of-type(odd)
{
    background: #eeeeee;
}

.item.list-group-item:before, .item.list-group-item:after
{
    display: table;
    content: " ";
}

.item.list-group-item img
{
    float: left;
}
.item.list-group-item:after
{
    clear: both;
}
.list-group-item-text
{
    margin: 0px 0px 11px;
}

</style>
@stop

@section('content')

<section class="content-header">
    <h1 class="pull-right">ملف المدير الشخصي</h1>
    <ol class="breadcrumb">
        <li class="h4"><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active h4">ملف المدير</li>
    </ol>
</section>

<br><br>

@php 
    $admin_image = SetImage($user->image, 'users'); 
    $array_model = ['route' => ['admins.update', $user->id], 'method'=>'PATCH', 'files'=>true, 'class'=>'form-horizontal', 'dir' => 'rtl'];
    $style = 'height: 445px;width: 342px;'; 
@endphp

<section class="content">
    <div class="row">        
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                
                <ul class="nav nav-tabs">
                    <li class="active pull-right"><a href="#activity" data-toggle="tab">النشاطات</a></li>
                    <li class="pull-right"><a href="#settings" data-toggle="tab">الاعدادات</a></li>
                </ul>
                
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <div class="well well-sm">
                            <strong>Category Title</strong>
                            <div class="btn-group">
                                <a href="#" id="list" class="btn btn-default btn-sm">
                                    <span class="glyphicon glyphicon-th-list"></span>List
                                </a>
                                <a href="#" id="grid" class="btn btn-default btn-sm">
                                    <span class="glyphicon glyphicon-th"></span>Grid
                                </a>
                            </div>
                        </div>
                        <div id="categories-list" class="row list-group">
                            @forelse($user->products as $pro)
                            @php 
                                $pro_img = url($root.'/advent/uploads/products/'.getJsonImages($pro->image)->image0); 
                                $url = url($root.'/admin-panal/products/id/'.$pro->id.'/'.seourl(text($pro->name, 'en')));
                            @endphp
                            <div class="item col-xs-4 col-lg-4">
                                <div class="thumbnail">
                                    <a href="{{ $url }}">
                                        <img class="group list-group-image" style="{{ $style }}" src="{{ $pro_img }}" alt="{{ text($pro->name) }}"/>
                                    </a>
                                    <div class="caption">
                                        <h4 class="group inner list-group-item-heading">{{ text($pro->name) }}</h4>
                                        <p class="group inner list-group-item-text">
                                            {{ str_limit(text($pro->discription), $limit = 100, $end = '...') }}
                                        </p>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-6">
                                                <p class="lead">{{ getCurrence($pro->price) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="alert alert-info" role="alert">{{ ('عفوا لا يوجد متنجات') }}</div>
                            @endforelse
                        </div>
                    </div>

                    <div class="tab-pane" id="settings">
                        <div class="box box-danger">
                            <div class="box-body">
                                {!! Form::model($user, $array_model) !!}
                                @include('admin.users.form', ['admin' => 'admin'])
                            
                                <div class="form-group row mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" style="width:150px;" class="btn btn-success btn-lg">
                                            <i class="fa fa-edit"></i>
                                            {{ __('تعديل') }}
                                        </button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    
                        {{--  Password Form  --}}
                        <div class="box box-danger">
                            <div class="box-header" dir="rtl">{{ __('تغير كلمة المرور') }}</div>
                            <div class="box-body">
                                {!! Form::open(['route'=>'admin-panal.password', 'method'=>'POST', 'class'=>'form-horizontal', 'dir' => 'rtl']) !!}
                                
                                {{-- Password --}}
                                <div class="form-group row">
                                    {!! Form::label('password', 'كلمة المرور', ['class'=>'col-md-12 col-form-label text-md-right']) !!}
                                    <div class="col-md-12">
                                        {!! Form::hidden('user_id', $user->id) !!}
                                        {!! Form::password('password', ['class'=>'form-control', 'required'=>'required']) !!}
                                        @if($errors->has('password'))
                                            <span class="invalid-feedback"><strong>{{ $errors->first('password') }}</strong></span> 
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" style="width:150px;" class="btn btn-success btn-lg">
                                            <i class="fa fa-edit"></i> {{ __('تعديل') }}
                                        </button>
                                    </div>
                                </div>
                                
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3" dir="rtl">
        
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img title="الملف الشخصي" class="profile-user-img img-responsive img-circle" src="{{ $admin_image }}" alt="صورة الملف الشخصي">
                    <h3 class="profile-username text-center">{{ fullname() }}</h3>
                    <p class="text-muted text-center">{{ $user->jop }}</p>
                    <ul class="list-group">
                        <li class="list-group-item"><b>المنتجات</b><a class="pull-left">{{ getAdminProductCount($user->id) }}</a></li>
                        <li class="list-group-item"><b>العنوان</b> <a class="pull-left">{{ $user->location }}</a></li>
                        <li class="list-group-item"><b>البريد الالكتروني</b> <a class="pull-left">{{ $user->email }}</a></li>
                        <li class="list-group-item"><b>انضم من</b> <a class="pull-left">{{ $user->created_at->diffForHumans() }}</a></li>
                        <li class="list-group-item"><b>تاريخ الميلاد</b> <a class="pull-left">{{ $user->dob->format('d-m-Y') }}</a></li>
                        <li class="list-group-item"><b>السن </b> <a class="pull-left">{{ $user->dob->age  }} Years old</a></li>
                    </ul>
                </div>
            </div>
        
            <div class="box box-primary">
                <div class="box-header with-border"><h3 class="box-title">نبذة عني</h3></div>
        
                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i> الوظيفة</strong>
        
                    <p class="text-muted pull-left">{{ $user->jop }}</p>
        
                    <hr>
        
                    <strong><i class="fa fa-map-marker margin-r-5"></i> العنوان</strong>
        
                    <p class="text-muted pull-left">{{ $user->location }}</p>

                    <hr>
        
                    <strong><i class="fa fa-file-text-o margin-r-5"></i> عن</strong>
        
                    <p class="pull-left">{{ $user->about }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('script')
<script type="text/javascript">
    $(function() {
        $('#list').click(function(event){
            event.preventDefault();
            $('#categories-list .item').addClass('list-group-item');
        });
        $('#grid').click(function(event){
            event.preventDefault();
            $('#categories-list .item').removeClass('list-group-item');
            $('#categories-list .item').addClass('grid-group-item');
        });
    });
</script>
@stop