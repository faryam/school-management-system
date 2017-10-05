@extends('Layouts.Dashboard.studentdashboard')




@section('content')

<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-home"></i>WELCOME TO STUDENT PORTAL</h3>
		 <br><br>
		<a href="{{ route('studentcourses') }}"><div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<div class="info-box dark-bg">
				<i class="fa fa-book"></i>
				<div class="count">{{$courses}}</div>
				<div class="title">COURSES</div>						
			</div><!--/.info-box-->			
		</div></a><!--/.col-->

		<a href="{{ route('studentclasses') }}"><div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<div class="info-box green-bg">
				<i class="icon_desktop"></i>
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
				STUDENT ATTENDENCE
			</header>
			
			  @if (count($student->studentattendence)!=0)
          <table class="table table-striped table-advance table-hover" id="rows">
         <tbody>
          <tr>
            <th><i class="fa fa-book"></i> COURSE NAME</th>
           <th><i class="icon_desktop"></i> CLASSROOM NAME</th>
           <th><i class="fa fa-calendar"></i> ATTENDENCE DATE</th>
           <th><i class="fa fa-thumb-tack"></i> ATTENDENCE STATUS</th>
           
           
         </tr>
         @foreach ($student->studentattendence as $attendence)
         <tr>
          <td>{{$attendence->course->course_name}}</td>
           <td>{{$attendence->class->class_name}}</td>
           <td>{{$attendence->attendence_date}}</td>
           <td>{{$attendence->attendence_status}}</td>
         </tr>
         @endforeach                 
       </tbody>
     </table>
        @else
          <span class="text-danger"><strong>No Attendence Record .</strong></span>
        @endif

    <br>
    <a class="btn btn-primary pull-right" href="{{ route('studentattendence') }}"></i>MORE</a>
     <br> <br>
		</section>
	</div>
</div>

@endsection