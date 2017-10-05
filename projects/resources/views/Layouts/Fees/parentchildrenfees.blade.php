@extends('Layouts.Dashboard.parentdashboard')


@section('content')

<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-money"></i> CHILDREN FEES</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href="{{ route('parentdashboard') }}">Home</a></li>
			<li><i class="fa fa-money"></i>FEES</li>
			<li><i class="fa fa-money"></i>CHILDREN FEES</li>
		</ol>
	</div>
</div>

<div class="row">
  <div class="col-lg-12" >
    <section class="panel">
      <span id="sucess"></span>
      <header class="panel-heading">
        CHILDREN FEES
      </header>
      <div id="re">
        <table class="table table-striped table-advance table-hover" id="rows">
         <tbody>
          <tr>
           <th><i class="icon_profile"></i> CHILD NAME</th>
           <th><i class="icon_profile"></i> FEE NAME</th>
           <th><i class="fa fa-money"></i> FEE AMOUNT</th>
           <th><i class="fa fa-calendar"></i> FEE DUE DATE</th>
           <th><i class="fa fa-thumb-tack"></i> FEE STATUS</th>

         </tr>
         @foreach ($parent->childstudents as $student)
         @foreach ($student->feestudents as $fee)
         
         <tr>
          <td>{{$student->student_first_name}} {{$student->student_last_name}}</td>
          <td>{{$fee->fee->fee_name}}</td>
          <td>{{$fee->fee->fee_amount}}</td>
          <td>{{$fee->fee->fee_duedate}}</td>
          @if ($fee->fee_status=="paid")
          <td>{{$fee->fee_status}}</td>
          @else
          <td><a class="btn btn-primary pay-btn" data-sid="{{$student->student_id}}" data-fid="{{$fee->fee_id}}" title="PAY FEE"><i class="fa fa-credit-card" ></i></a></td>
          @endif

        </tr>
        @endforeach
        @endforeach
                     
      </tbody>
    </table>
  </div>
</section>
</div>
</div>

 {{csrf_field()}}

@endsection



@section('script')

<script >

  $(".table tr").each(function(index, val) {
    $(this).find('.pay-btn').each(function(index, val) {
      $(this).click(function(event) {

        var student_id=$(this).data('sid');
        var fee_id=$(this).data('fid');

        $.post("{{ route('parentstudentpayfee') }}", {student_id:student_id,fee_id:fee_id,'_token':$('input[name=_token]').val()}, function(data) {
         $("#sucess").fadeIn();
         $('#sucess').html('<div class="alert alert-success fade in"><strong>Success!</strong> Student Fee has been Paid.</div>');
         $("#sucess").fadeOut(5000);
         scrollTo(0,0);
         $("#re").load(location.href + " #re>*", "");
       });

      });

    });

  });




</script>




@endsection