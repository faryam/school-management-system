@extends('Layouts.Dashboard.studentdashboard')


@section('content')

<div class="row">
  <div class="col-lg-12">
   <h3 class="page-header"><i class="fa fa-book"></i> STUDENT COURSES</h3>
   <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="{{ route('studentdashboard') }}">Home</a></li>
    <li><i class="fa fa-book"></i>COURSES</li>
    <li><i class="fa fa-book"></i>STUDENT COURSES</li>
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
        @if (count($student->studentcourses)!=0)
        <table class="table table-striped table-advance table-hover" id="rows">
         <tbody>
          <tr>
           <th><i class="icon_profile"></i> ID</th>
           <th><i class="fa fa-book"></i>COURSE NAME</th>
           <th><i class="icon_desktop"></i> CLASSROOM NAME</th>
           
         </tr>
         @foreach ($student->studentcourses as $course)
         <tr>
          <td >{{$course->course->course_id}}</td>
          <td>{{$course->course->course_name}}</td>
          <td>{{$course->class->class_name}}</td>
        </tr>
        @endforeach                 
      </tbody>
    </table>
    @else
    <span class="text-danger"><strong>No Student Courses .</strong></span>
    @endif
    
  </div>
</section>
</div>
</div>



@endsection
