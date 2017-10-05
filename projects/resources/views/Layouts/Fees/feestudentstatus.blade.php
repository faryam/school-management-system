@extends('Layouts.Dashboard.admindashboard')


@section('content')

<div class="row">
  <div class="col-lg-12">
   <h3 class="page-header"><i class="fa fa-thumb-tack"></i>FEE STUDENTS STATUS</h3>
   <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
    <li><i class="fa fa-money"></i>FEES</li>
    <li><i class="fa fa-money"></i>ALL FEES</li>
    <li><i class="fa fa-thumb-tack"></i>FEE STUDENTS STATUS</li>
  </ol>
</div>
</div>
<div class="row">
	<div class="col-lg-12" >
		<section class="panel">
			<span id="sucess"></span>
			<header class="panel-heading">
				FEE STUDENTS STATUS&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;   @if (count($feestudents)>0)FEE NAME : {{$feestudents[0]->fee->fee_name}} &emsp;&emsp;&emsp;&emsp; FEE AMOUNT :
				{{$feestudents[0]->fee->fee_amount}} &emsp;&emsp;&emsp;&emsp; FEE DUE DATE: {{$feestudents[0]->fee->fee_duedate}}	
				<a  class="btn btn-primary pull-right"  id="updatebtn" >SAVE</a>	
				@endif
			</header>
			@if (count($feestudents)>0)
			<div id="re">
				<table class="table table-striped table-advance table-hover" id="rows">
					<tbody>
						<tr>
							<th><i class="fa fa-child"></i> STUDENT NAME</th>
							<th><i class="fa fa-thumb-tack"></i> FEE STATUS</th>
						</tr>
						@foreach ($feestudents as $feestudent)
						<tr>
							<td >{{$feestudent->student->student_first_name}}   {{$feestudent->student->student_last_name}}</td>
							<td>
								<select class="form-control m-bot15 attend_id" data-sid="{{$feestudent->student->student_id}}" data-fid="{{$feestudents[0]->fee->fee_id}}">

									<option value="paid"  @if ($feestudent->fee_status=="paid") selected @endif>PAID</option>
									<option value="unpaid"  @if ($feestudent->fee_status=="unpaid") selected @endif>UNPAID</option>
									

								</select>
							</td>
						</tr>
						@endforeach                 
					</tbody>
				</table>
			</div>
			
			@else
			<span class="text-danger"><strong>No Registered Students in this fee</strong></span>

			@endif

		</section>

		
	</div>
</div>







@endsection
{{csrf_field()}}

@section('script')

<script>

	$('#updatebtn').click(function(event) {
		$(".table tr").each(function(index, val) {
			$(this).find('.attend_id').each(function(index, val) {
				var fee_id=$(this).data('fid');
				var student_id=$(this).data('sid');
				var status=$(this).val();
				$.post("{{ route('updatefeestudentstatus') }}", {fee_id:fee_id,student_id:student_id,status:status}, function(data) {
					console.log(data);
					$("#sucess").fadeIn();
					$('#sucess').html('<div class="alert alert-success fade in"><strong>Success!</strong> Fee status has been Saved.</div>');
					$("#sucess").fadeOut(2000);
				}).fail(function(xhr, textStatus, errorThrown) { 
					alert(xhr.responseText);
				});




			});

		});
	});


</script>




@endsection
