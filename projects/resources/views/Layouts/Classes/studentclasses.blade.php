@extends('Layouts.Dashboard.studentdashboard')


@section('content')

<div class="row">
  <div class="col-lg-12">
   <h3 class="page-header"><i class="icon_desktop"></i> STUDENT CLASSES</h3>
   <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="{{ route('studentdashboard') }}">Home</a></li>
    <li><i class="icon_desktop"></i>CLASSES</li>
    <li><i class="icon_desktop"></i>STUDENT CLASSES</li>
  </ol>
</div>
</div>

<div class="row">
  <div class="col-lg-12" >
    <section class="panel">
      <span id="sucess"></span>
      <header class="panel-heading">
        STUDENT CLASSES
      </header>
      <div id="re">
        @if (count($student->studentcourses)!=0)
           <table class="table table-striped table-advance table-hover" id="rows">
         <tbody>
          <tr>
           <th><i class="icon_profile"></i> ID</th>
            <th><i class="icon_profile"></i> CLASSROOM NAME</th>
           <th><i class="icon_profile"></i> CLASSROOM SECTION</th>
           <th><i class="fa fa-calendar"></i> CLASSROOM DATE</th>  
           <th><i class="fa fa-clock-o"></i> CLASSROOM TIME</th>
           <th><i class="fa fa-book"></i> COURSE</th>
           
         </tr>
         @foreach ($student->studentcourses as $classroom)
         <tr>
           <td >{{$classroom->class->class_id}}</td>
           <td>{{$classroom->class->class_name}}</td>
           <td>{{$classroom->class->class_section}}</td>
           <td>{{$classroom->class->class_date}}</td>
           <td>{{$classroom->class->class_time}}</td>
           <td>{{$classroom->course->course_name}}</td>
         </tr>
         @endforeach                 
       </tbody>
     </table>
        @else
          <span class="text-danger"><strong>No Student Classes .</strong></span>
        @endif
       
   </div>
 </section>
</div>
</div>



@endsection
