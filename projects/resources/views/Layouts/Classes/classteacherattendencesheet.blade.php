@extends('Layouts.Dashboard.teacherdashboard')


@section('content')

 <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="icon_document_alt"></i> CLASS ATTENDENCE SHEET</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{{ route('teacherdashboard') }}">Home</a></li>
            <li><i class="icon_desktop"></i>CLASSES</li>
            <li><i class="icon_desktop"></i>ALL CLASSES</li>
            <li><i class="icon_documents_alt"></i>CLASS ATTENDENCE SHEETS</li>
			<li><i class="icon_document_alt"></i>CLASS ATTENDENCE SHEET</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12" >
		<section class="panel">
			<span id="sucess"></span>
			<header class="panel-heading">
				CLASS ATTENDENCE SHEET&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;   @if (count($attendencesheets)>0)COURSE NAME : {{$attendencesheets[0]->course->course_name}} &emsp;&emsp;&emsp;&emsp; CLASS NAME :
				{{$attendencesheets[0]->class->class_name}} &emsp;&emsp;&emsp;&emsp; ATTENDENCE DATE: {{$attendencesheets[0]->attendence_date}}	
				<a  class="btn btn-primary pull-right"  id="updatebtn" >SAVE</a>	
				@endif
				<input type="hidden" id="date" value="{{$attendencesheets[0]->attendence_date}}">
			</header>
			@if (count($attendencesheets)>0)
			<div id="re">
				<table class="table table-striped table-advance table-hover" id="rows">
					<tbody>
						<tr>
							<th><i class="fa fa-child"></i> STUDENT NAME</th>
							<th><i class="fa fa-thumb-tack"></i> ATTENDENCE STATUS</th>
						</tr>
						@foreach ($attendencesheets as $attendencesheet)
						<tr>
							<td >{{$attendencesheet->student->student_first_name}}   {{$attendencesheet->student->student_last_name}}</td>
							<td>
								<select class="form-control m-bot15 attend_id" data-sid="{{$attendencesheet->student->student_id}}" data-cid="{{$attendencesheets[0]->course->course_id}}" data-clid="{{$attendencesheets[0]->class->class_id}}">

									<option value="present"  @if ($attendencesheet->attendence_status=="present") selected @endif>PRESENT</option>
									<option value="absent" @if ($attendencesheet->attendence_status=="absent") selected @endif>ABSENT</option>
									<option value="leave" @if ($attendencesheet->attendence_status=="leave") selected @endif>LEAVE</option>
									<option value="late" @if ($attendencesheet->attendence_status=="late") selected @endif>LATE</option>

								</select>
							</td>
						</tr>
						@endforeach                 
					</tbody>
				</table>
			</div>
			
			@else
			<span class="text-danger"><strong>No Registered Students in this class</strong></span>

			@endif

		</section>

		
	</div>
</div>







@endsection
{{csrf_field()}}

@section('script')

<script >

	$('#updatebtn').click(function(event) {
		$(".table tr").each(function(index, val) {
			$(this).find('.attend_id').each(function(index, val) {
				var course_id=$(this).data('cid');
				var student_id=$(this).data('sid');
				var class_id=$(this).data('clid');
				var status=$(this).val();
				var date=$('#date').val();
				$.post("{{ route('updateteacherattendencesheet') }}", {class_id:class_id,course_id:course_id,student_id:student_id,status:status,date:date}, function(data) {
					console.log(data);
					$("#sucess").fadeIn();
					$('#sucess').html('<div class="alert alert-success fade in"><strong>Success!</strong> Attendence has been Saved.</div>');
					$("#sucess").fadeOut(2000);
				}).fail(function(xhr, textStatus, errorThrown) { 
					alert(xhr.responseText);
				});




			});

		});
	});


</script>




@endsection
