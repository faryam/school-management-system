@extends('Layouts.Dashboard.studentdashboard')


@section('content')

<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-files-o"></i> STUDENT COURSES TEACHERS</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href="{{ route('studentdashboard') }}">Home</a></li>
			<li><i class="fa fa-files-o"></i>STUDENT COURSES TEACHERS</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12" >
		<section class="panel">
			<span id="sucess"></span>
			<header class="panel-heading">
				STUDENT COURSES
			</header>
			<div id="re">
				<table class="table table-striped table-advance table-hover" id="rows">
					<tbody>
						<tr>

							<th><i class="icon_profile"></i> TEACHER NAME</th>
							<th><i class="icon_mail_alt"></i>COURSE NAME</th>
							<th><i class="icon_profile"></i> CLASSROOM NAME</th>

						</tr>
						@foreach ($student[0]->studentcourses as $course)
						@foreach ($course->class->classteacher as $teacher)
						<tr>
							<td>{{$teacher->teacher->teacher_first_name}}  {{$teacher->teacher->teacher_last_name}}</td>
							<td>{{$course->course->course_name}}</td>
							<td>{{$course->class->class_name}}</td>
						</tr>
						@endforeach 
						@endforeach                 
					</tbody>
				</table>
			</div>
		</section>
	</div>
</div>



@endsection
