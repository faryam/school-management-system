@extends('Layouts.Dashboard.admindashboard')


@section('content')

<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-tachometer"></i> WEB REPORT</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
			<li><i class="icon_genius"></i>REPORTS</li>
			<li><i class="fa fa-tachometer"></i>WEB REPORT</li>
		</ol>
	</div>
</div>

<div class="row">
		<section class="panel">
			<span id="sucess"></span>
			<header class="panel-heading">
				WEB REPORT
			</header>
			<br>
			<a href="{{ route('students') }}"><div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<div class="info-box blue-bg">
					<i class="fa fa-child"></i>
					<div class="count">{{$students}}</div>
					<div class="title">STUDENTS</div>						
				</div><!--/.info-box-->			
			</div><!--/.col-->
		</a>
		<a href="{{ route('teachers') }}"><div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<div class="info-box brown-bg">
				<i class="fa fa-group"></i>
				<div class="count">{{$teachers}}</div>
				<div class="title">TEACHERS</div>						
			</div><!--/.info-box-->			
		</div><!--/.col-->	
	</a>
	<a href="{{ route('parents') }}"><div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		<div class="info-box dark-bg">
			<i class="fa fa-user"></i>
			<div class="count">{{$parents}}</div>
			<div class="title">PARENTS</div>						
		</div><!--/.info-box-->			
	</div><!--/.col-->
</a>
<a href="{{ route('admins') }}"><div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	<div class="info-box green-bg">
		<i class="fa fa-key"></i>
		<div class="count">{{$admins}}</div>
		<div class="title">ADMINS</div>						
	</div><!--/.info-box-->			
</div><!--/.col-->
</a>
<a href="{{ route('courses') }}"><div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	<div class="info-box blue-bg">
		<i class="fa fa-book"></i>
		<div class="count">{{$courses}}</div>
		<div class="title">COURSES</div>						
	</div><!--/.info-box-->			
</div><!--/.col-->
</a>
<a href="{{ route('exams') }}"><div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	<div class="info-box brown-bg">
		<i class="fa fa-clipboard"></i>
		<div class="count">{{$exams}}</div>
		<div class="title">EXAMS</div>						
	</div><!--/.info-box-->			
</div><!--/.col-->	
</a>
<a href="{{ route('classes') }}"><div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	<div class="info-box dark-bg">
		<i class="icon_desktop"></i>
		<div class="count">{{$classes}}</div>
		<div class="title">CLASSES</div>						
	</div><!--/.info-box-->			
</div><!--/.col-->
</a>

<a href="{{ route('fees') }}">
	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		<div class="info-box green-bg">
			<i class="fa fa-money"></i>
			<div class="count">{{$fees}}</div>
			<div class="title">FEES</div>						
		</div><!--/.info-box-->			
	</div><!--/.col-->
</a>
<a href="{{ route('courses') }}"><div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	<div class="info-box blue-bg">
		<i class="fa fa-usd"></i>
		<div class="count">{{$finances}}</div>
		<div class="title">FINANCES</div>						
	</div><!--/.info-box-->			
</div><!--/.col-->
</a>
<a href="{{ route('exams') }}"><div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	<div class="info-box brown-bg">
		<i class="icon_genius"></i>
		<div class="count">2</div>
		<div class="title">REPORTS</div>						
	</div><!--/.info-box-->			
</div><!--/.col-->	
</a>
</section>


</div>

@endsection