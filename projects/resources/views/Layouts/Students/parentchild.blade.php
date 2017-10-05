@extends('Layouts.Dashboard.parentdashboard')


@section('content')

<div class="row">
  <div class="col-lg-12">
   <h3 class="page-header"><i class="fa fa-child"></i> CHILDREN</h3>
   <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="{{ route('parentdashboard') }}">Home</a></li>
    <li><i class="fa fa-child"></i>CHILDREN</li>
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
        @if (count($parent->childstudents)!=0)
          <table class="table table-striped table-advance table-hover" id="rows">
         <tbody>
          <tr>
           <th><i class="icon_profile"></i> ID</th>
           <th><i class="icon_profile"></i> NAME</th>
           <th><i class="icon_profile"></i> SEX</th>
           <th><i class="icon_profile"></i> DATE OF BIRTH</th>
           <th><i class="icon_mail_alt"></i> EMAIL</th>
           <th><i class="fa fa-phone"></i> PHONE NUMBER</th>
           <th><i class="icon_profile"></i> ADDRESS</th>

         </tr>
         @foreach ($parent->childstudents as $student)

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
        @else
          <span class="text-danger"><strong>No Register Childrens .</strong></span>
        @endif
        
  </div>
</section>
</div>
</div>



@endsection
