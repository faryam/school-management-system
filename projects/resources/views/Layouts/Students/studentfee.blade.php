@extends('Layouts.Dashboard.studentdashboard')


@section('content')

<div class="row">
  <div class="col-lg-12">
   <h3 class="page-header"><i class="fa fa-money"></i> STUDENT FEE</h3>
   <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="{{ route('studentdashboard') }}">Home</a></li>
    <li><i class="fa fa-money"></i>STUDENT FEE</li>
  </ol>
</div>
</div>

<div class="row">
  <div class="col-lg-12" >
    <section class="panel">
      <span id="sucess"></span>
      <header class="panel-heading">
       STUDENT FEE
      </header>
      <div id="re">
        @if (count($student->feestudents)!=0)
          <table class="table table-striped table-advance table-hover" id="rows">
         <tbody>
          <tr>
            <th><i class="icon_profile"></i> FEE NAME</th>
           <th><i class="fa fa-money"></i> FEE AMOUNT</th>
           <th><i class="fa fa-calendar"></i> FEE DUE DATE</th>
           <th><i class="fa fa-thumb-tack"></i> FEE STATUS</th>
           
           
         </tr>
         @foreach ($student->feestudents as $fee)
         <tr>
          <td>{{$fee->fee->fee_name}}</td>
           <td>{{$fee->fee->fee_amount}}</td>
           <td>{{$fee->fee->fee_duedate}}</td>
           <td>{{$fee->fee_status}}</td>
         </tr>
         @endforeach                 
       </tbody>
     </table>
        @else
          <span class="text-danger"><strong>No Fee Record .</strong></span>
        @endif
        
   </div>
 </section>
</div>
</div>



@endsection
