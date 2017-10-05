@extends('Layouts.Dashboard.teacherdashboard')




@section('content')

<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-home"></i>WELCOME TO TEACHER PORTAL</h3>
		 <br><br>
		<a href="{{ route('teachercourses') }}"><div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<div class="info-box dark-bg">
				<i class="fa fa-book"></i>
				<div class="count">{{$courses}}</div>
				<div class="title">COURSES</div>						
			</div><!--/.info-box-->			
		</div></a><!--/.col-->

		<a href="{{ route('teacherclasses') }}"><div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
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
				TEACHER COURSES
			</header>
			
			 <table class="table table-striped table-advance table-hover" id="rows">
                           <tbody>
                              <tr>
                                 <th><i class="icon_profile"></i> ID</th>
                                 <th><i class="fa fa-book"></i>COURSE NAME</th>
                                 <th><i class="icon_desktop"></i> CLASSROOM NAME</th>
                                 
                              </tr>
                              @foreach ($teacher->teachercourses as $course)
                              <tr>
                              	<td >{{$course->course->course_id}}</td>
                              	<td>{{$course->course->course_name}}</td>
                                  <td>{{$course->class->class_name}}</td>
                              </tr>
                              @endforeach                 
                           </tbody>
                        </table>

    <br>
    <a class="btn btn-primary pull-right" href="{{ route('teachercourses') }}"></i>MORE</a>
     <br> <br>
		</section>
	</div>
</div>

@endsection