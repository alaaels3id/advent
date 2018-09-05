@php
	$admin_image = GetImage($auth->image, '/public/advent/uploads/users/', '/advent/uploads/users/');
@endphp
<aside class="main-sidebar">

	<section class="sidebar">
		<div class="user-panel">
			<div class="pull-left image">
				<img src="{{ $admin_image }}" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p>{{ $auth->name }}</p>
				<a href="#"><i class="fa fa-circle text-success"></i> متصل</a>
			</div>
		</div>

		<form action="javascript:void(0);" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="ابحث...">
				<span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
				</span>
			</div>
		</form>

		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MAIN NAVIGATION</li>
			
			<li><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> <span>الرئسية</span></a></li>
			
			<li class="treeview">
				<a href="#">
					<i class="fa fa-users"></i> <span>الاعضاء</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="{{ route('users.create') }}"><i class="fa fa-circle-o"></i>اضافة عضو جديد</a></li>
					<li><a href="{{ route('users.index') }}"><i class="fa fa-circle-o"></i> عرض جميع الاعضاء</a></li>
					<li><a href="{{ route('users.trash') }}"><i class="fa fa-circle-o"></i> عرض جميع الاعضاء المحذوفة</a></li>
				</ul>
			</li>

			<li><a href="{{ route('contacts.index') }}"><i class="fa fa-address-book"></i> <span>عرض جميع الرسائل</span></a></li>			
				
			<li class="treeview">
				<a href="#">
					<i class="fa fa-id-card-o" aria-hidden="true"></i> <span>الطلبات</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li><a href="{{ route('orders.index') }}"><i class="fa fa-circle-o"></i> <span>عرض جميع الطلبات</span></a></li>
					<li><a href="{{ route('orders.trash') }}"><i class="fa fa-circle-o"></i> <span>عرض الطلبات المكتملة</span></a></li>
				</ul>
			</li>		
			
			<li class="treeview">
				<a href="#">
					<i class="fa fa-comments" aria-hidden="true"></i> <span>المدونة</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li><a href="{{ route('blogs.create') }}"><i class="fa fa-circle-o"></i>كتابة تدوينة جديدة</a></li>
					<li><a href="{{ route('blogs.index') }}"><i class="fa fa-circle-o"></i> عرض جميع التدوينات</a></li>
					<li><a href="{{ route('blogs.trash') }}"><i class="fa fa-circle-o"></i> عرض جميع التدوينات المحذوفة</a></li>
				</ul>
			</li>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-tag" aria-hidden="true"></i> <span>الكلمات الدلالية</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li><a href="{{ route('tags.create') }}"><i class="fa fa-circle-o"></i>إضافة كلمة دلالية جديدة</a></li>
					<li><a href="{{ route('tags.index') }}"><i class="fa fa-circle-o"></i> عرض جميع الكلمات الدلالية</a></li>
				</ul>
			</li>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-paint-brush" aria-hidden="true"></i> <span>الالوان</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li><a href="{{ route('colors.create') }}"><i class="fa fa-circle-o"></i>إضافة  لون جديد</a></li>
					<li><a href="{{ route('colors.index') }}"><i class="fa fa-circle-o"></i> عرض جميع  الالوان</a></li>
				</ul>
			</li>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-windows" aria-hidden="true"></i> <span>الاسئلة الشائعة</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li><a href="{{ route('faqs.create') }}"><i class="fa fa-circle-o"></i>إضافة سؤال جديد</a></li>
					<li><a href="{{ route('faqs.index') }}"><i class="fa fa-circle-o"></i>عرض جميع الأسئلة</a></li>
				</ul>
			</li>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-grav" aria-hidden="true"></i> <span>المقاسات</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li><a href="{{ route('sizes.create') }}"><i class="fa fa-circle-o"></i>إضافة مقاس جديد</a></li>
					<li><a href="{{ route('sizes.index') }}"><i class="fa fa-circle-o"></i> عرض جميع  المقاسات</a></li>
				</ul>
			</li>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-amazon" aria-hidden="true"></i> <span>المنتجات</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li><a href="{{ route('products.create') }}"><i class="fa fa-circle-o"></i>اضافة منتج جديد</a></li>
					<li><a href="{{ route('products.index') }}"><i class="fa fa-circle-o"></i> عرض جميع المنتجات</a></li>
					<li><a href="{{ route('products.trash') }}"><i class="fa fa-circle-o"></i> عرض جميع المنتجات المحذوفة</a></li>
				</ul>
			</li>
			
			<li class="treeview">
				<a href="#">
					<i class="fa fa-gear" aria-hidden="true"></i> <span>الاعدادات</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li><a href="{{ route('settings.create') }}"><i class="fa fa-circle-o"></i>اضافةإعداد جديد</a></li>
					<li><a href="{{ route('settings') }}"><i class="fa fa-circle-o"></i> عرض جميع الإعدادات</a></li>
				</ul>
			</li>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-meetup" aria-hidden="true"></i> <span>البنر</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li><a href="{{ route('sliders.create') }}"><i class="fa fa-circle-o"></i>إضافة بندر جديد</a></li>
					<li><a href="{{ route('sliders.index') }}"><i class="fa fa-circle-o"></i> عرض جميع البنرات</a></li>
					<li><a href="{{ route('sliders.trash') }}"><i class="fa fa-circle-o"></i> عرض جميع البنرات المحذوفة</a></li>
				</ul>
			</li>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-podcast" aria-hidden="true"></i> <span>الاقسام</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li><a href="{{ route('banners.create') }}"><i class="fa fa-circle-o"></i>إضافة قسم جديد</a></li>
					<li><a href="{{ route('banners.index') }}"><i class="fa fa-circle-o"></i> عرض جميع الاقسام</a></li>
					<li><a href="{{ route('banners.trash') }}"><i class="fa fa-circle-o"></i> عرض جميع الاقسام المحذوفة</a></li>
				</ul>
			</li>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-sliders" aria-hidden="true"></i><span>الفئات</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li><a href="{{ route('categories.create') }}"><i class="fa fa-circle-o"></i>إضافة فئة جديد</a></li>
					<li><a href="{{ route('categories.index') }}"><i class="fa fa-circle-o"></i> عرض جميع الفئات</a></li>
				</ul>
			</li>

			<li></li>
			<li><a href="{{ url($root) }}" target="_blanck"><i class="fa fa-bug"></i> <span>الموقع</span></a></li>
		</ul>
	</section>
	<br><br><br><br><br><br>
</aside>