@extends('admin.layout.master') 

@section('title', 'صفحة الطلب')

@section('content')
<div class="container-fluid" dir="rtl">
    <section dir="ltr" class="row col-md-12 content-header">
        <h1 class="pull-right" dir="rtl"><b> الطلبات </b><small>الطلب رقم ({{ $order->id }})</small></h1>
        <ol class="breadcrumb">
            <li class="h4"><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i><b>الرئيسية</b></a></li>
            <li class="h4"><a href="{{ route('orders.index') }}"><b>الطلبات</b></a></li>
            <li class="h4"><b>({{ $order->id }}) الطلب رقم</b></li>
        </ol>
    </section>

    @php 
        $ord = json_decode($order->products);
        $user = getOrderedUser($order->custumer_id);
    @endphp
    
    <section dir="rtl">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-hover text-center">
                            <thead class="h4">
                                <tr>
                                    <th>#</th>
                                    <th>إسم المنتج</th>
                                    <th>الصورة</th>
                                    <th>السعر</th>
                                    <th>اللون</th>
                                    <th>المقاس</th>
                                    <th>الكمية</th>
                                </tr>
                            </thead>
                            <tbody class="h4">
                                @for($i=0;$i<count($ord->ids);$i++)
                                <tr>
                                    @php 
                                        $img = getJsonImages(GetProductsById($ord->ids[$i])->image)->image0;
                                    @endphp
                                    <td>{{ $ord->ids[$i] }}</td>
                                    <td>{{ text(GetProductsById($ord->ids[$i])->name, 'en') }}</td>
                                    <td><img width="60" height="60" src="{{ GetImage($img, '/public/advent/uploads/products/', '/advent/uploads/products/') }}"></td>
                                    <td>{{ getCurrence(GetProductsById($ord->ids[$i])->price) }} x 1</td>
                                    <td>{{ GetColorById($ord->color[$i]) }}</td>
                                    <td><span class="label label-primary">{{ GetSizeById($ord->size[$i]) }}</span></td>
                                    <td><span class="label label-primary">{{ $ord->qty[$i] }}</span></td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box box-danger">
                    <div class="box-body">
                        <ul class="list-group">
                            <li class="list-group-item h4">
                                <b>رقم الطلب :</b>
                                <b><span class="pull-left label label-danger">{{ $order->id }}</span></b>
                            </li>
                            <li class="list-group-item h4">
                                <b>الاجمالي :</b> 
                                <b><span class="pull-left label label-danger">{{ getCurrence($order->total) }}</span></b>
                            </li>
                            <li class="list-group-item h4">
                                <b>عدد المنتجات :</b>
                                <b><span class="pull-left label label-danger">{{ count($ord->ids) }}</span></b>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="box box-success">
                    <div class="box-body">
                        <ul class="list-group">
                            <div style="padding: 20px 0px 0px 25px;">
                                <img class="img-responsive thumbnail" src="{{ GetImage($user->image, '/public/advent/uploads/users/', '/advent/uploads/users/') }}" alt="IMG" />
                            </div>
                            <li class="h5 list-group-item">
                                <b>الاسم الاول:</b>
                                <b><span class="pull-left">{{ ucfirst($user->firstName) }}</span></b>
                            </li>
                            <li class="h5 list-group-item">
                                <b>الاسم الخير :</b>
                                <b><span class="pull-left">{{ ucfirst($user->lastName) }}</span></b>
                            </li>
                            <li class="h5 list-group-item">
                                <b>البريد الالكتروني :</b>
                                <b>
                                    <span class="pull-left">
                                        <a title="Send an email" href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                    </span>
                                </b>
                            </li>
                            <li class="h5 list-group-item">
                                <b>المحافظة :</b>
                                <b>
                                    <span class="pull-left">{{ gov()[$order->gov_id] }}</span>
                                </b>
                            </li>
                            <li class="h5 list-group-item">
                                <b>العنوان :</b>
                                <b>
                                    <span class="pull-left">{{ $order->state }} {{ $order->street }} - {{ gov()[$order->gov_id] }}</span>
                                </b>
                            </li>
                            <li class="h4 list-group-item">
                                <b>الهاتف :</b>
                                <b><span dir="ltr" class="pull-left">+20{{ $order->tel }}</span></b>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop