@extends('Layouts.Dashboard.parentdashboard')


@section('content')

<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-calendar"></i> CHILDREN CLASSES ATTENDENCE</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href="{{ route('parentdashboard') }}">Home</a></li>
			<li><i class="icon_desktop"></i>CLASSES</li>
			<li><i class="fa fa-calendar"></i>CHILDREN CLASSES ATTENDENCE</li>
		</ol>
	</div>
</div>

<div class="row">
  <div class="col-lg-12" >
    <section class="panel">
      <span id="sucess"></span>
      <header class="panel-heading">
        CHILDREN CLASSES ATTENDENCE
      </header>
      <div id="re">
        <table class="table table-striped table-advance table-hover" id="rows">
         <tbody>
          <tr>
           <th><i class="icon_profile"></i> CHILD NAME</th>
           <th><i class="fa fa-book"></i> COURSE NAME</th>
           <th><i class="icon_desktop"></i> CLASS NAME</th>
           <th><i class="fa fa-calendar"></i> ATTENDENCE DATE</th>
           <th><i class="fa fa-thumb-tack"></i> ATTENDENCE STATUS</th>

         </tr>
         @foreach ($parent->childstudents as $student)
         @foreach ($student->studentattendence as $attendence)
         <tr>
          <td>{{$student->student_first_name}} {{$student->student_last_name}}</td>
          <td>{{$attendence->course->course_name}}</td>
           <td>{{$attendence->class->class_name}}</td>
           <td>{{$attendence->attendence_date}}</td>
           <td>{{$attendence->attendence_status}}</td>
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
