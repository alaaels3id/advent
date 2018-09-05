@php 
	$admin_image = GetImage($auth->image, '/public/advent/uploads/users/', '/advent/uploads/users/'); 
@endphp

<style>
	.unread{ padding:10px;background-color:#e5e5e5;}
</style>

<header class="main-header">
	<a href="{{ route('admin-panal') }}" class="logo">
		<span class="logo-mini"><b>تحكم</b></span>
		<span class="logo-lg"><b>لوحة </b> تحكم الموقع</span>
	</a>
	
	<nav class="navbar navbar-static-top">
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"><span class="sr-only">Toggle navigation</span></a>
		
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				
				<li class="dropdown messages-menu">
					
					<a href="#" class="dropdown-toggle notificaiton" data-toggle="dropdown">
						<i class="fa fa-envelope-o"></i>
						<span class="label label-success" id="count">{{ count($auth->unreadNotifications) }}</span>
					</a>
					
					<ul class="dropdown-menu">
						<li class="header">
							لديك {{ count($auth->unreadNotifications) }} رسائل غير مقروء 
						</li>
						<li>
							<ul class="menu" id="showNofication">
								@forelse($auth->notifications as $notification)
								@php
									$img = GetImage($notification->data['image'], '/public/advent/uploads/users/', '/advent/uploads/users/');
									$if = (($notification->read_at == null) ? 'unread' : 'p-10-all');
									$co_id = $notification->data['id'];
									$not_id = $notification->id;
								@endphp
								<li>
									<a class="{{ $if }}" href="{{ url($root.'/admin-panal/contacts/'.$co_id.'/edit/?id='.$not_id) }}">
										
										<div class="pull-left"><img src="{{ $img }}" class="img-circle" alt="User Image"></div>
										
										<h4>
											{{ $notification->data['name'] }}
											<small>
												<i class="fa fa-clock-o"></i>&nbsp;
												{{ $notification->data['created_at'] }}
											</small>
										</h4>
										
										<p>
											<span>
												<i class="label label-info"></i>
												{{ 'Subject : '.$notification->data['subject'] }}
											</span>
											<br>
											{{ str_limit($notification->data['subject'], 20) }}
										</p>
										
									</a>
								</li>
								@empty
									<li class="text-center" style="padding:10px;background-color:#3c8dbc;color:white;">{{ __('لا يوجد رسائل') }}</li>
								@endforelse
							</ul>
						</li>
						<li class="footer"><a href="{{ route('contacts.index') }}">مشاهدة جميع الرسائل</a></li>
					</ul>
				</li>
				
				<li class="dropdown user user-menu">
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="{{ $admin_image }}"  class="user-image" alt="User Image">
						<span class="hidden-xs">{{ $auth->username }}</span>
						<div class="clearfix"></div>
					</a>
					
					<ul class="dropdown-menu">
						
						<li class="user-header">
							<img src="{{ $admin_image }}" class="img-circle" alt="User Image">
							<p>
								{{ getFullname($auth->id) }} - {{ $auth->jop }}<small>عضو منذ عام. {{ $auth->created_at->year }}</small>
							</p>
						</li>
						
						<li class="user-footer">
							
							<div class="pull-left">
								<a href="{{ route('admins.show', $auth->id) }}" class="btn btn-default btn-flat">الملف الشخصي</a>
							</div>
							
							<div class="pull-right">
								<a class="btn btn-default btn-flat" href="{{ route('logout') }}"
								onclick="event.preventDefault();document.getElementById('logout-form').submit();">
								{{ __('تسجيل الخروج') }}
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</div>
						</li>

					</ul>
				</li>
			
			</ul>
		</div>
	</nav>
</header>