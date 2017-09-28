@extends('Layouts.Dashboard.parentdashboard')


@section('content')

<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header"><i class="fa fa-files-o"></i> ALL COURSES</h3>
   <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="{{ route('parentdashboard') }}">Home</a></li>
    <li><i class="icon_document_alt"></i>COURSES</li>
    <li><i class="fa fa-files-o"></i>ALL COURSES</li>
  </ol>
</div>
</div>

<div class="row">
  <div class="col-lg-12" >
    <section class="panel">
      <span id="sucess"></span>
      <header class="panel-heading">
        REGISTERED COURSES
      </header>
      <div id="re">
        <table class="table table-striped table-advance table-hover" id="rows">
         <tbody>
          <tr>
           <th><i class="icon_profile"></i> ID</th>
           <th><i class="icon_profile"></i> COURSE NAME</th>
           <th><i class="icon_profile"></i> COURSE DESCRIPTION</th>
         </tr>
         @foreach ($courses as $course)
         <tr>
           <td >{{$course->course_id}}</td>
           <td>{{$course->course_name}}</td>
           <td>{{$course->course_description}}</td>
        </tr>
        @endforeach                 
      </tbody>
    </table>
  </div>
</section>
</div>
</div>



@endsection


