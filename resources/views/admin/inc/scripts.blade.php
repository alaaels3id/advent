{{-- jQuery 3 --}}
{{ Html::script('admin/bower_components/jquery/dist/jquery.min.js') }}

{{-- jQuery UI 1.11.4 --}}
{{ Html::script('admin/bower_components/jquery-ui/jquery-ui.min.js') }}

{{-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip --}}
<script>
	$.widget.bridge('uibutton', $.ui.button);
</script>

{{-- Bootstrap 3.3.7 --}}
{{ Html::script('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}

{{-- Morris.js charts --}}
{{ Html::script('admin/bower_components/raphael/raphael.min.js') }}
{{ Html::script('admin/bower_components/morris.js/morris.min.js') }}

{{-- Sparkline --}}
{{ Html::script('admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}

{{-- jvectormap --}}
{{ Html::script('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}
{{ Html::script('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}

{{-- jQuery Knob Chart --}}
{{ Html::script('admin/bower_components/jquery-knob/dist/jquery.knob.min.js') }}

{{-- daterangepicker --}}
{{ Html::script('admin/bower_components/moment/min/moment.min.js') }}
{{ Html::script('admin/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}

{{-- datepicker --}}
{{ Html::script('admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}

{{-- Bootstrap WYSIHTML5 --}}
{{ Html::script('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}

{{-- FastClick --}}
{{ Html::script('admin/bower_components/fastclick/lib/fastclick.js') }}

{{-- AdminLTE App --}}
{{ Html::script('admin/dist/js/adminlte.min.js') }}

{{-- AdminLTE dashboard demo (This is only for demo purposes) --}}
{{ Html::script('admin/dist/js/pages/dashboard.js') }}

{{-- dashboard 2 --}}
{{ Html::script('admin/dist/js/pages/dashboard2.js') }}

{{-- SlimScroll --}}
{{ Html::script('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}

{{-- ChartJS --}}
{{ Html::script('admin/bower_components/chart.js/Chart.js') }}  	

{{-- AdminLTE for demo purposes --}}
{{ Html::script('admin/dist/js/demo.js') }}

{{ Html::script('admin/cus/sweetalert2.all.js') }}

{{ Html::script('advent/js/select2.min.js') }}

<script type="text/javascript">
	$('.select2-multi2').select2();
	$('.select2-multi').select2();
</script>

{!! Html::script('/StreamLab/StreamLab.js') !!}

<script>
	var message, 
	ShowDiv = $('#showNofication'), 
	count = $('#count'), 
	c;

	var slh = new StreamLabHtml();

	var sls = new StreamLabSocket({
		appId: "{{ config('stream_lab.app_id') }}",
		channelName: "notification",
		event: "*"
	});

	sls.socket.onmessage = function (res) {
		slh.setData(res);

		if (slh.getSource() === 'messages') {
			
			c = parseInt(count.html());
			count.html(c + 1);
			message = slh.getMessage();

			$.get('/getcontactid/' + message[2] + '/' + message[4] + '/', function (data) {
				var json = JSON.parse(data);
				ShowDiv.prepend('<li>'+ '<a class="unread" href="/admin-panal/contacts/' + json[0].id + '/edit">' +
				'<div class="pull-left"><img src="/advent/uploads/users/' + message[2] + '" class="img-circle" alt="User Image"></div>' +
				'<h4>' + message[0] + '</h4><p><span><i class="label label-info"></i>Subject : ' + message[4] + 
				'</span><br>' + message[3] + '</p></a></li>');
			});
		}
	}
	$('.notificaiton').on('click' , function(){
        setTimeout( function(){
            count.html(0);
            $('.unread').each(function(){
                $(this).removeClass('unread');
            });
        }, 1000);
        $.get('/MarkAllSeen' , function(){});
    });
</script>