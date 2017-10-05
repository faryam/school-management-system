@extends('Layouts.Dashboard.admindashboard')




@section('content')

<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-home"></i>WELCOME TO ADMIN PORTAL</h3>
		 <br><br>
		<a href="{{ route('students') }}"><div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<div class="info-box blue-bg">
				<i class="fa fa-child"></i>
				<div class="count">{{$students}}</div>
				<div class="title">STUDENTS</div>						
			</div><!--/.info-box-->			
		</div></a><!--/.col-->

		<a href="{{ route('teachers') }}"><div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<div class="info-box brown-bg">
				<i class="fa fa-group"></i>
				<div class="count">{{$teachers}}</div>
				<div class="title">TEACHERS</div>						
			</div><!--/.info-box-->			
		</div></a><!--/.col-->	

		<a href="{{ route('courses') }}"><div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<div class="info-box dark-bg">
				<i class="fa fa-book"></i>
				<div class="count">{{$courses}}</div>
				<div class="title">COURSES</div>						
			</div><!--/.info-box-->			
		</div></a><!--/.col-->

		<a href="{{ route('classes') }}"><div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<div class="info-box green-bg">
				<i class="fa fa-clipboard"></i>
				<div class="count">{{$classes}}</div>
				<div class="title">CLASSES</div>						
			</div><!--/.info-box-->			
		</div></a><!--/.col-->


	</div>
</div>
 <br><br><br>
<div class="row">
	<div class="col-lg-12" >
		<section class="panel">
			<span id="sucess"></span>
			<header class="panel-heading">
				FINANCE REPORT
			</header>
			<header class="panel-heading text-center">
				Total Revenue: {{$revenue}}  &emsp;&emsp;&emsp;&emsp;  Total Expenses: {{$expense}}  &emsp;&emsp;&emsp;&emsp;   Profit: {{$revenue-$expense}}
			</header>
			<input type="hidden" id="revenue" value="{{$revenue}}">
			<input type="hidden" id="expense" value="{{$expense}}">
			<div class="panel-body text-center">
				<div id="donut-chart" style="height: 300px; width:400;"></div>
			</div>

    <br>
    <a class="btn btn-primary pull-right" href="{{ route('financereport') }}"></i>MORE</a>
     <br> <br>
		</section>
	</div>
</div>

@endsection

@section('script')

<script>
	
$(function () {
   

	var d=parseInt($('#expense').val());
    var dd=parseInt($('#revenue').val());
    
    var donutData = [
      { label: 'Expenses', data:d, color: '#0073b7' },
      { label: 'Revenues', data:dd, color: '#bc3cad' },
    ]
    //donutData[0].data=d;
    //donutData[1].data=dd;
    $.plot('#donut-chart', donutData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.5,
          label      : {
            show     : true,
            radius   : 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }

        }
      },
      legend: {
        show: true
      }
    });
    function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
    /*
     * END DONUT CHART
     */

  });








</script>




@endsection