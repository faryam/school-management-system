@extends('Layouts.Dashboard.admindashboard')


@section('content')

<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-files-o"></i> ALL EXAMS</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
			<li><i class="icon_document_alt"></i>EXAMS</li>
			<li><i class="fa fa-files-o"></i>EXAM RESULTS</li>
			<li><i class="fa fa-files-o"></i>VIEW EXAM RESULT</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12" >
		<section class="panel">
			<span id="sucess"></span>
			<header class="panel-heading">
				EXAM RESULT 
			</header>
			<div id="re">
				<table class="table table-striped table-advance table-hover" id="rows">
					<tbody>
						<tr>
							<th><i class="icon_profile"></i> STUDENT NAME</th>
							<th><i class="icon_profile"></i> GRADE</th>
						</tr>
						@foreach ($student_exam_grade as $student)
						<tr>
							<td >{{$student->student->student_first_name}}   {{$student->student->student_last_name}}</td>
							<td>{{$student->exam_grade}}</td>
						</tr>
						@endforeach                 
					</tbody>
				</table>
			</div>
		</section>

		
	</div>
</div>

@endsection
