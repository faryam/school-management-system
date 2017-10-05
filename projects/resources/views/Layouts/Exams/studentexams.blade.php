@extends('Layouts.Dashboard.studentdashboard')


@section('content')

<div class="row">
  <div class="col-lg-12">
   <h3 class="page-header"><i class="fa fa-clipboard"></i> STUDENT EXAMS</h3>
   <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="{{ route('studentdashboard') }}">Home</a></li>
    <li><i class="fa fa-clipboard"></i>EXAMS</li>
    <li><i class="fa fa-clipboard"></i>STUDENT EXAMS</li>
  </ol>
</div>
</div>

<div class="row">
  <div class="col-lg-12" >
    <section class="panel">
      <span id="sucess"></span>
      <header class="panel-heading">
        STUDENT EXAMS
      </header>
      <div id="re">
        <table class="table table-striped table-advance table-hover" id="rows">
         <tbody>
          <tr>
           <th><i class="icon_profile"></i> ID</th>
           <th><i class="fa fa-clipboard"></i> EXAMS NAME</th>
           <th><i class="fa fa-book"></i> COURSE NAME</th>
           <th><i class="icon_desktop"></i> CLASS NAME</th>
           
         </tr>
         @foreach ($student->studentcourses as $course)
         @foreach ($course->course->exams as $exam)
         <tr>
           <td >{{$exam->exam_id}}</td>
           <td>{{$exam->exam_name}}</td>
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
