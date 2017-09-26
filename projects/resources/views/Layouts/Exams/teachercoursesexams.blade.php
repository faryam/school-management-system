@extends('Layouts.Dashboard.teacherdashboard')


@section('content')

<div class="row">
  <div class="col-lg-12">
   <h3 class="page-header"><i class="fa fa-files-o"></i> ALL CLASSES</h3>
   <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="{{ route('teacherdashboard') }}">Home</a></li>
    <li><i class="icon_document_alt"></i>COURSES</li>
    <li><i class="fa fa-files-o"></i>COURSES EXAMS</li>
  </ol>
</div>
</div>

<div class="row">
  <div class="col-lg-12" >
    <section class="panel">
      <span id="sucess"></span>
      <header class="panel-heading">
        COURSES EXAMS
      </header>
      <div id="re">
        <table class="table table-striped table-advance table-hover" id="rows">
         <tbody>
          <tr>
           <th><i class="icon_profile"></i> ID</th>
           <th><i class="icon_mail_alt"></i>NAME</th>
           <th><i class="icon_profile"></i> COURSE NAME</th>
           

         </tr>
         @foreach ($teacher[0]->teachercourses as $course)
         @foreach ($course->course->exams as $exam)


         <tr>
           <td >{{$exam->exam_id}}</td>
           <td>{{$exam->exam_name}}</td>
           <td>{{$exam->course->course_name}}</td>
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
