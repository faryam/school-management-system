@extends('Layouts.Dashboard.studentdashboard')


@section('content')

<div class="row">
  <div class="col-lg-12">
   <h3 class="page-header"><i class="fa fa-list-alt"></i> STUDENT EXAMS RESULTS</h3>
   <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="{{ route('studentdashboard') }}">Home</a></li>
    <li><i class="fa fa-list-alt"></i>RESULTS</li>
  </ol>
</div>
</div>

<div class="row">
  <div class="col-lg-12" >
    <section class="panel">
      <span id="sucess"></span>
      <header class="panel-heading">
       STUDENT EXAMS RESULTS
      </header>
      <div id="re">
        @if (count($student->studentexams)!=0)
          <table class="table table-striped table-advance table-hover" id="rows">
         <tbody>
          <tr>
           
           <th><i class="fa fa-clipboard"></i> EXAMS NAME</th>
           <th><i class="fa fa-book"></i> COURSE NAME</th>
           <th><i class="icon_desktop"></i> CLASS NAME</th>
           <th><i class="fa fa-sliders"></i> GRADE</th>
           
         </tr>
         @foreach ($student->studentexams as $exam)
         
         <tr>
           <td>{{$exam->exam->exam_name}}</td>
           <td>{{$exam->class->course->course_name}}</td>
           <td>{{$exam->class->class_name}}</td>
           <td>{{$exam->exam_grade}}</td>
         </tr>
         
         @endforeach                 
       </tbody>
     </table>
        @else
          <span class="text-danger"><strong>No Student Exam Results .</strong></span>
        @endif
        
   </div>
 </section>
</div>
</div>







@endsection