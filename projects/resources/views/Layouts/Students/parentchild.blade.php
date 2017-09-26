@extends('Layouts.Dashboard.parentdashboard')


@section('content')

<div class="row">
  <div class="col-lg-12">
   <h3 class="page-header"><i class="fa fa-files-o"></i> ALL CLASSES</h3>
   <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="{{ route('parentdashboard') }}">Home</a></li>
    <li><i class="icon_document_alt"></i>CHILDREN</li>
  </ol>
</div>
</div>

<div class="row">
  <div class="col-lg-12" >
    <section class="panel">
      <span id="sucess"></span>
      <header class="panel-heading">
        CHILDREN
      </header>
      <div id="re">
        <table class="table table-striped table-advance table-hover" id="rows">
         <tbody>
          <tr>
           <th><i class="icon_profile"></i> ID</th>
           <th><i class="icon_profile"></i> NAME</th>
           <th><i class="icon_profile"></i> SEX</th>
           <th><i class="icon_profile"></i> DATE OF BIRTH</th>
           <th><i class="icon_mail_alt"></i> EMAIL</th>
           <th><i class="icon_profile"></i> PHONE NUMBER</th>
           <th><i class="icon_profile"></i> ADDRESS</th>

         </tr>
         @foreach ($parent[0]->childstudents as $student)

         <tr>
          <td >{{$student->student_id}}</td>
          <td>{{$student->student_first_name}} {{$student->student_last_name}}</td>
          <td>{{$student->student_sex}}</td>
          <td>{{$student->student_dob}}</td>
          <td>{{$student->user->email}}</td>
          <td>{{$student->student_phone_number}}</td>
          <td>{{$student->student_address}}</td>
        </tr>

        @endforeach                 
      </tbody>
    </table>
  </div>
</section>
</div>
</div>



@endsection
