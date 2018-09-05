@extends('admin.layout.master')

@section('title', 'Statistics')

@section('style')
{{ Html::style('admin/dist/css/select2.css') }}
@endsection

@section('content')

<section class="content-header">
	<h1>Data Tables<small>advanced tables</small></h1>
	<ol class="breadcrumb">
		<li class="active"><a href="{{ $root }}/admin-panal/"><i class="fa fa-dashboard"></i> Home</a></li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			
			<div class="form-group">
				{!! Form::open(['url'=>'/admin-panal/buildings/statistics/', 'method' => 'POST']) !!}
				<select style="width: 150px; margin: 10px;" name="year" class="form-control select2">
					@for($i = date('Y');$i<=2100;$i++)
						<option value="{{ $i }}">{{ $i }}</option>
					@endfor
				</select>
				<input type="submit" name="submit" class="btn btn-success" value="Excute">
				{!! Form::close() !!}
			</div>

			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Monthly Report For {{ $year }}</h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
						<div class="btn-group">
							<button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-wrench"></i>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</div>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>

				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
							<p class="text-center">
								<strong>Buildings Charts For {{ $year }}</strong>
							</p>

							<div class="chart">
								<canvas id="salesChart" style="height: 180px;"></canvas>
							</div>
						</div>
					</div>
				</div>

				<div class="box-footer">
					<div class="row">
						<div class="col-sm-3 col-xs-6">
							<div class="description-block border-right">
								<span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
								<h5 class="description-header">$35,210.43</h5>
								<span class="description-text">TOTAL REVENUE</span>
							</div>

						</div>

						<div class="col-sm-3 col-xs-6">
							<div class="description-block border-right">
								<span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
								<h5 class="description-header">$10,390.90</h5>
								<span class="description-text">TOTAL COST</span>
							</div>

						</div>

						<div class="col-sm-3 col-xs-6">
							<div class="description-block border-right">
								<span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
								<h5 class="description-header">$24,813.53</h5>
								<span class="description-text">TOTAL PROFIT</span>
							</div>

						</div>

						<div class="col-sm-3 col-xs-6">
							<div class="description-block">
								<span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
								<h5 class="description-header">1200</h5>
								<span class="description-text">GOAL COMPLETIONS</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('script')
<script type="text/javascript">

  // -----------------------
  // - MONTHLY SALES CHART -
  // -----------------------

  // Get context with jQuery - using jQuery's .get() method.
  var salesChartCanvas = $('#salesChart').get(0).getContext('2d');
  // This will get the first returned node in the jQuery collection.
  var salesChart       = new Chart(salesChartCanvas);

  var salesChartData = {
    labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
    datasets: [
      {
        label               : 'Digital Goods',
        fillColor           : 'rgba(60,141,188,0.9)',
        strokeColor         : 'rgba(60,141,188,0.8)',
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data : [
        	@foreach ($new as $chart)
        		@if(is_array($chart))
        			{{ $chart['count'] }},
        		@else
        			{{ $chart }},
        		@endif
        	@endforeach
        ]
      }
    ]
  };

  var salesChartOptions = {
    // Boolean - If we should show the scale at all
    showScale               : true,
    // Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines      : false,
    // String - Colour of the grid lines
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    // Number - Width of the grid lines
    scaleGridLineWidth      : 1,
    // Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    // Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines  : true,
    // Boolean - Whether the line is curved between points
    bezierCurve             : true,
    // Number - Tension of the bezier curve between points
    bezierCurveTension      : 0.3,
    // Boolean - Whether to show a dot for each point
    pointDot                : false,
    // Number - Radius of each point dot in pixels
    pointDotRadius          : 4,
    // Number - Pixel width of point dot stroke
    pointDotStrokeWidth     : 1,
    // Number - amount extra to add to the radius to cater for hit detection outside the drawn point
    pointHitDetectionRadius : 20,
    // Boolean - Whether to show a stroke for datasets
    datasetStroke           : true,
    // Number - Pixel width of dataset stroke
    datasetStrokeWidth      : 2,
    // Boolean - Whether to fill the dataset with a color
    datasetFill             : true,
    // String - A legend template
    legendTemplate          : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<datasets.length; i++){%><li><span style=\'background-color:<%=datasets[i].lineColor%>\'></span><%=datasets[i].label%></li><%}%></ul>',
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio     : true,
    // Boolean - whether to make the chart responsive to window resizing
    responsive              : true
  };
</script>
@endsection