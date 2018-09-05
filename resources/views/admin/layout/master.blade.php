<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{ text(GetSettings('sitename'), isAuthOrNot()) }} || @yield('title')</title>

	{{ Html::favicon('/advent/images/icons/favicon.png') }}
	
	{{--  Tell the browser to be responsive to screen width  --}}
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	
	{{--  Bootstrap 3.3.7  --}}
	{{ Html::style('admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}
	
	{{--  Font Awesome  --}}
	{{ Html::style('admin/bower_components/font-awesome/css/font-awesome.min.css') }}
	
	{{--  Ionicons  --}}
	{{ Html::style('admin/bower_components/Ionicons/css/ionicons.min.css') }}
	
	{{--  Theme style  --}}
	{{ Html::style('admin/dist/css/AdminLTE.min.css') }}

  	{{--  
  		AdminLTE Skins. Choose a skin from the css/skins
  		folder instead of downloading all of them to reduce the load. 
  	 --}}
  	{{ Html::style('admin/dist/css/skins/_all-skins.min.css') }}
  	
  	{{--  Morris chart  --}}
  	{{ Html::style('admin/bower_components/morris.js/morris.css') }}
  	
  	{{--  jvectormap --}} 
  	{{ Html::style('admin/bower_components/jvectormap/jquery-jvectormap.css') }}
  	
  	{{--  Date Picker  --}}
  	{{ Html::style('admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}
  	
  	{{--  Daterange picker  --}}
	{{ Html::style('admin/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}
	  
	{{-- Hover Css --}}
	{{ Html::style('advent/css/hover.css') }}

	{{-- Select2 Css --}}
	{{ Html::style('advent/css/select2.min.css') }}
  	
  	{{--  bootstrap wysihtml5 - text editor  --}}
  	{{ Html::style('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}

  	{{--  HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries  --}}
  	{{-- \- WARNING: Respond.js doesn't work if you view the page via file://
  		[if lt IE 9]
	  		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	  		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif] --}}

	<!-- Google Font -->
	{{ Html::style('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic') }}
	@yield('style')
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		
		@include('admin.inc.header')
		
		@include('admin.inc.sidebar')
		
		<div class="content-wrapper">
	
			@yield('content')	
	
		</div>
		
		@include('admin.inc.footer')
	</div>
	
	@include('admin.inc.scripts')
	
	@yield('script')
	
	@include('admin.layout.fmess')  
</body>
</html>
