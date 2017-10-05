@extends('Layouts.Dashboard.parentdashboard')


@section('content')

<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-clipboard"></i> CHILDREN EXAMS</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href="{{ route('parentdashboard') }}">Home</a></li>
			<li><i class="fa fa-clipboard"></i>EXAMS</li>
			<li><i class="fa fa-clipboard"></i>CHILDREN EXAMS</li>
		</ol>
	</div>
</div>

<div class="row">
  <div class="col-lg-12" >
    <section class="panel">
      <span id="sucess"></span>
      <header class="panel-heading">
        CHILDREN EXAMS
      </header>
      <div id="re">
        <table class="table table-striped table-advance table-hover" id="rows">
         <tbody>
          <tr>
           <th><i class="icon_profile"></i> CHILD NAME</th>
           <th><i class="fa fa-book"></i> COURSE NAME</th>
           <th><i class="icon_desktop"></i> CLASS NAME</th>
           <th><i class="fa fa-clipboard"></i> EXAM NAME</th>

         </tr>
         @foreach ($parent->childstudents as $student)
         @foreach ($student->studentcourses as $classroom)
         @foreach ($classroom->course->exams as $exam)
         
         <tr>
          <td>{{$student->student_first_name}} {{$student->student_last_name}}</td>
          <td>{{$classroom->course->course_name}}</td>
          <td>{{$classroom->class->class_name}}</td>
          <td>{{$exam->exam_name}}</td>
          
        </tr>
        @endforeach
        @endforeach
        @endforeach                 
      </tbody>
    </table>
  </div>
</section>
</div>
</div>



@endsection
