@extends('Layouts.Dashboard.parentdashboard')




@section('content')

<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-home"></i>WELCOME TO PARENT PORTAL</h3>
		 <br><br>
		<a href="{{ route('childrenstudents') }}"><div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<div class="info-box blue-bg">
				<i class="fa fa-child"></i>
				<div class="count">{{$students}}</div>
				<div class="title">CHILDREN</div>						
			</div><!--/.info-box-->			
		</div></a><!--/.col-->

		<a href="{{ route('childrenstudentsteachers') }}"><div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<div class="info-box brown-bg">
				<i class="fa fa-group"></i>
				<div class="count">{{$teachers}}</div>
				<div class="title">TEACHERS</div>						
			</div><!--/.info-box-->			
		</div></a><!--/.col-->	

		<a href="{{ route('childrenstudentscourses') }}"><div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<div class="info-box dark-bg">
				<i class="fa fa-book"></i>
				<div class="count">{{$courses}}</div>
				<div class="title">COURSES</div>						
			</div><!--/.info-box-->			
		</div></a><!--/.col-->

		<a href="{{ route('childrenstudentsfees') }}"><div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<div class="info-box green-bg">
				<i class="fa fa-clipboard"></i>
				<div class="count">{{$fees}}</div>
				<div class="title">CHILDREN FEES</div>						
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
				CHILDREN FEES
			</header>
			
			<table class="table table-striped table-advance table-hover table-bordered" id="rows">
         <tbody>
          <tr>
           <th><i class="icon_profile"></i> CHILD NAME</th>
           <th><i class="icon_profile"></i> FEE NAME</th>
           <th><i class="fa fa-money"></i> FEE AMOUNT</th>
           <th><i class="fa fa-calendar"></i> FEE DUE DATE</th>
           <th><i class="fa fa-thumb-tack"></i> FEE STATUS</th>

         </tr>
         
         
        @foreach ($parent->childstudents as $student)
         @foreach ($student->feestudents as $fee)
         
         <tr>
          <td>{{$student->student_first_name}} {{$student->student_last_name}}</td>
          <td>{{$fee->fee->fee_name}}</td>
          <td>{{$fee->fee->fee_amount}}</td>
          <td>{{$fee->fee->fee_duedate}}</td>
          <td>{{$fee->fee_status}}</td>
        </tr>
        @endforeach
        @endforeach
        
                     
      </tbody>
    </table>

    <br>
    <a class="btn btn-primary pull-right" href="{{ route('childrenstudentsfees') }}"></i>MORE</a>
     <br> <br>
		</section>
	</div>
</div>

@endsection