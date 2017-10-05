@extends('Layouts.Dashboard.parentdashboard')


@section('content')

<div class="row">
  <div class="col-lg-12">
   <h3 class="page-header"><i class="fa fa-book"></i> CHILDREN COURSES</h3>
   <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="{{ route('parentdashboard') }}">Home</a></li>
    <li><i class="fa fa-book"></i>COURSES</li>
    <li><i class="fa fa-book"></i>CHILDREN COURSES</li>
  </ol>
</div>
</div>

<div class="row">
  <div class="col-lg-12" >
    <section class="panel">
      <span id="sucess"></span>
      <header class="panel-heading">
        CHILDREN COURSES
      </header>
      <div id="re">
        <table class="table table-striped table-advance table-hover" id="rows">
         <tbody>
          <tr>
           <th><i class="icon_profile"></i> CHILD NAME</th>
           <th><i class="icon_profile"></i> COURSE NAME</th>
           <th><i class="icon_desktop"></i> CLASS NAME</th>
           <th><i class="icon_profile"></i> COURSE DESCRIPTION</th>
           

         </tr>
         @foreach ($parent->childstudents as $student)
         @foreach ($student->studentcourses as $course)

         <tr>
          <td>{{$student->student_first_name}} {{$student->student_last_name}}</td>
          <td>{{$course->course->course_name}}</td>
          <td>{{$course->class->class_name}}</td>
          <td>{{$course->course->course_description}}</td>
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
