@extends('Layouts.Dashboard.parentdashboard')


@section('content')

<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-list-alt"></i> CHILDREN EXAMS RESULTS</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href="{{ route('parentdashboard') }}">Home</a></li>
			<li><i class="fa fa-clipboard"></i>EXAMS</li>
			<li><i class="fa fa-list-alt"></i>CHILDREN EXAMS RESULTS</li>
		</ol>
	</div>
</div>

<div class="row">
  <div class="col-lg-12" >
    <section class="panel">
      <span id="sucess"></span>
      <header class="panel-heading">
        CHILDREN EXAMS RESULTS
      </header>
      <div id="re">
        <table class="table table-striped table-advance table-hover" id="rows">
         <tbody>
          <tr>
           <th><i class="icon_profile"></i> CHILD NAME</th>
            <th><i class="fa fa-clipboard"></i> EXAMS NAME</th>
           <th><i class="fa fa-book"></i> COURSE NAME</th>
           <th><i class="icon_desktop"></i> CLASS NAME</th>
           <th><i class="fa fa-sliders"></i> GRADE</th>

         </tr>
         @foreach ($parent->childstudents as $student)
          @foreach ($student->studentexams as $exam)
         
         <tr>
          <td>{{$student->student_first_name}} {{$student->student_last_name}}</td>
          <td>{{$exam->exam->exam_name}}</td>
           <td>{{$exam->class->course->course_name}}</td>
           <td>{{$exam->class->class_name}}</td>
           <td>{{$exam->exam_grade}}</td>
          
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
