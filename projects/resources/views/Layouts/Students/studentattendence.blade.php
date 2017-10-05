@extends('Layouts.Dashboard.studentdashboard')


@section('content')

<div class="row">
  <div class="col-lg-12">
   <h3 class="page-header"><i class="fa fa-calendar"></i> STUDENT ATTENDENCE</h3>
   <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="{{ route('studentdashboard') }}">Home</a></li>
    <li><i class="fa fa-calendar"></i>STUDENT ATTENDENCE</li>
  </ol>
</div>
</div>

<div class="row">
  <div class="col-lg-12" >
    <section class="panel">
      <span id="sucess"></span>
      <header class="panel-heading">
       STUDENT ATTENDENCE
      </header>
      <div id="re">
        @if (count($student->studentattendence)!=0)
          <table class="table table-striped table-advance table-hover" id="rows">
         <tbody>
          <tr>
            <th><i class="fa fa-book"></i> COURSE NAME</th>
           <th><i class="icon_desktop"></i> CLASSROOM NAME</th>
           <th><i class="fa fa-calendar"></i> ATTENDENCE DATE</th>
           <th><i class="fa fa-thumb-tack"></i> ATTENDENCE STATUS</th>
           
           
         </tr>
         @foreach ($student->studentattendence as $attendence)
         <tr>
          <td>{{$attendence->course->course_name}}</td>
           <td>{{$attendence->class->class_name}}</td>
           <td>{{$attendence->attendence_date}}</td>
           <td>{{$attendence->attendence_status}}</td>
         </tr>
         @endforeach                 
       </tbody>
     </table>
        @else
          <span class="text-danger"><strong>No Attendence Record .</strong></span>
        @endif
        
   </div>
 </section>
</div>
</div>



@endsection
