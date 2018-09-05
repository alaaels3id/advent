@extends('admin.layout.master')

@section('title', 'الرئيسية')

@section('content')

<section class="content-header">
	<h1 class="pull-right hidden-xs hidden-sm" dir="rtl"> الرئيسية <small>رئيسية {{ text(GetSettings('sitename')) }}</small></h1>
	<ol class="breadcrumb">
		<li class="active h4"><i class="fa fa-dashboard"></i> الرئيسية</li>
	</ol>
</section>

<br><br>

<section class="content" style="padding: 20px; margin: 20px;">
	<br>
	<div class="row">
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-aqua"><i class="ion ion-ios-contact-outline"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">الاعضاء</span>
					<span class="info-box-number">{{ users() }}</span>
				</div>
			</div>
		</div>

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-blue"><i class="ion ion-ios-cart"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">المنتجات</span>
					<span class="info-box-number">{{ AllProductsCount() }}</span>
				</div>

			</div>
		</div>

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-green"><i class="ion ion-ios-cart"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">المنتجات المفعلة</span>
					<span class="info-box-number">{{ ProductsStatusCount(1) }}</span>
				</div>

			</div>
		</div>

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-red"><i class="ion ion-ios-cart"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">المنتجات الغير مغعلة</span>
					<span class="info-box-number">{{ ProductsStatusCount(0) }}</span>
				</div>

			</div>
		</div>

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-silver"><i class="ion ion-ios-cart"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">المنتجات المحذوفة</span>
					<span class="info-box-number">{{ GetDeletedProductsCount() }}</span>
				</div>

			</div>
		</div>

		<div class="clearfix visible-sm-block"></div>

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-purple"><i class="ion ion-chatbubbles"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">رسائل الاعضاء</span>
					<span class="info-box-number">{{ getAllMessagesCount() }}</span>
				</div>

			</div>
		</div>

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-navy"><i class="ion ion-chatbubbles"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">الرسائل الغير مقروءة</span>
					<span class="info-box-number">{{ count($auth->unreadNotifications) }}</span>
				</div>

			</div>
		</div>

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-yellow"><i class="ion ion-ios-at-outline"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">الرسائل المقروءة</span>
					<span class="info-box-number">{{ getreadedMessagesCount() }}</span>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		{{-- Products Charts --}}
		<div class="col-md-8">
			<div class="box">
				
				<div class="box-header with-border">
					<h3 class="box-title">{{ __('تقرير المبيعات السنوي') }}</h3>

					<div class="box-tools pull-right">
						
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						
						<div class="btn-group">
							
							<button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-wrench"></i>
							</button>

						</div>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>

				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
							<p class="text-center">
								<strong>مخطط للمنتجات علي مدار العام</strong>
							</p>

							<div class="chart">
								<canvas id="salesChart" style="height: 180px;"></canvas>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		
		{{-- Special Members --}}
		<div class="col-md-4">
			<div class="box box-danger">
				
				<div class="box-header with-border">
					<h3 class="box-title">{{ ('مديرين مميزين') }}</h3>
					<div class="box-tools pull-right">
						<span class="label label-danger">{{ ('مديرين مميزين') }}</span>
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
				
				<div class="box-body no-padding">
					<ul class="users-list clearfix">
						@forelse(GetSpecialAdmins() as $usercount)
						@php
							$user_image = GetImage($usercount->image, '/public/advent/uploads/users/', '/advent/uploads/users/');
							$fullname = getFullname($usercount->id);
						@endphp
						<li>
							<img title="{{ $fullname }}" src="{{ $user_image }}" alt="{{ $fullname }}">
							<a class="users-list-name" href="{{ route('admins.show', $usercount->id) }}" title="{{ $fullname }}">
								{{ $fullname }}
							</a>
							<span class="users-list-date">{{ $usercount->count }}</span>
						</li>
						@empty
						<li>
							<div class="alert alert-info" role="alert">عفوا لا يوجد مشرفين حاليا</div>
						</li>
						@endforelse
					</ul>
				</div>

				<div class="box-footer text-center">
					<a href="{{ route('users.index') }}" class="uppercase">عرض جميع الاعضاء</a>
				</div>
			</div>
		</div>
	</div>

	{{-- latest Members --}}
	<div class="row">
		<div class="col-md-12">
			<div class="box box-danger">
				
				<div class="box-header with-border">
					<h3 class="box-title">أحدث الاعضاء</h3>
	
					<div class="box-tools pull-right">
						<span class="label label-danger">أحدث 8 أعضاء</span>
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
				
				<div class="box-body no-padding">
					<ul class="users-list clearfix">
						@forelse(leatestUsers() as $last)
						@php 
							$image = GetImage($last->image, '/public/advent/uploads/users/', '/advent/uploads/users/');
							$fullname = ucfirst($last->firstName).' '.ucfirst($last->lastName);
						@endphp
						<li>
							<img width="300" src="{{ $image }}" alt="User Image">
							<a class="users-list-name" href="{{ route('users.edit', $last->id) }}" title="{{ $fullname  }}">
								<h3>{{ $fullname  }}</h3>
							</a>
							<span class="users-list-date">
								<h4>{{ \Carbon\Carbon::parse($last->created_at)->diffForHumans() }}</h4>
							</span>
						</li>
						@empty
						<li>
							<div class="alert alert-info" role="alert">عفوا لا يوجد اعضاء حايلا</div>
						</li>
						@endforelse
					</ul>
				</div>
	
				<div class="box-footer text-center">
					<a href="{{ route('users.index') }}" class="uppercase">عرض جميع الاعضاء</a>
				</div>
			</div>
		</div>
	</div>
	
	{{-- latest Orders --}}
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				
				<div class="box-header with-border">
					<h3 class="box-title">{{ __('أخر الطلبات') }}</h3>
	
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
	
				<div class="box-body">
					<div class="table-responsive">
						<table class="table no-margin">
							<thead class="h4">
	                            <tr>
	                                <th>{{ __('#') }}</th>
	                                <th>إسم العميل</th>
	                                <th>عدد المنتجات</th>
	                                <th>الاجمالي</th>
	                            </tr>
	                        </thead>
	                        <tbody class="h4">
	                        	@forelse(App\Order::latest()->take(5)->get() as $trashed)
	                        	@php $ord = json_decode($trashed->products); @endphp
	                        	<tr>
	                        		<td>{{ $trashed->id }}</td>
	                        		<td>
	                        			<a href="{{ route('orders.show', $trashed->id) }}">
	                        				{{ 
		                        				ucfirst(getOrderedUser($trashed->custumer_id)->firstName).
		                        				' '.
		                        				ucfirst(getOrderedUser($trashed->custumer_id)->lastName) 
		                        			}}
	                        			</a>
	                        		</td>
	                        		<td>{{ count($ord->ids) }}</td>
	                        		<td>{{ getCurrence($trashed->total) }}</td>
	                        	</tr>
	                        	@empty
	                        	<tr>
	                        		<td colspan="4" class="text-center h2"><b>{{ __('لا يوجد طلبات') }}</b></td>
	                        	</tr>
	                        	@endforelse
	                        </tbody>
						</table>
					</div>
				</div>
	
				<div class="box-footer clearfix">
					<a href="{{ route('orders.index') }}" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
				</div>
			</div>
		</div>
	</div>

</section>
@stop
@section('script')
	@include('admin.inc.chart')
@stop
