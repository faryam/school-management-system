@extends('Layouts.Dashboard.admindashboard')


@section('content')

<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-files-o"></i> CLASS ATTENDENCE</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
			<li><i class="icon_document_alt"></i>CLASSES</li>
			<li><i class="fa fa-files-o"></i>ALL CLASSES</li>
			<li><i class="fa fa-files-o"></i>CLASS ATTENDENCE</li>
			<li><i class="fa fa-files-o"></i>ADD CLASS ATTENDENCE</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12" >
		<section class="panel">
			<span id="sucess"></span>
			<header class="panel-heading">
				ADD CLASS ATTENDENCE &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;   @if (count($students)>0)COURSE NAME : {{$students[0]->course->course_name}} &emsp;&emsp;&emsp;&emsp; CLASS NAME :
				{{$students[0]->class->class_name}}
				<a  class="btn btn-primary pull-right"  id="savebtn" >SAVE</a>	
				<a  class="btn btn-primary pull-right"  id="updatebtn" >SAVE</a>	
				@endif
				<input type="hidden" id="date">
			</header>
			@if (count($students)>0)
			<div id="re">
				<table class="table table-striped table-advance table-hover" id="rows">
					<tbody>
						<tr>
							<th><i class="icon_profile"></i> STUDENT NAME</th>
							<th><i class="icon_profile"></i> ATTENDENCE STATUS</th>
						</tr>
						@foreach ($students as $student)
						<tr>
							<td >{{$student->student->student_first_name}}   {{$student->student->student_last_name}}</td>
							<td>
								<select class="form-control m-bot15 attend_id" data-sid="{{$student->student->student_id}}" data-cid="{{$students[0]->course->course_id}}" data-clid="{{$students[0]->class->class_id}}">

									<option value="present">PRESENT</option>
									<option value="absent">ABSENT</option>
									<option value="leave">LEAVE</option>
									<option value="late">LATE</option>

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

	$(document).ready(function() {
		$('#updatebtn').hide();
	});

	$('#savebtn').click(function(event) {
		var d = new Date();

		var month = d.getMonth()+1;
		var day = d.getDate();

		var output =(month<10 ? '0' : '') + month + '/' +
		(day<10 ? '0' : '') + day+'/'+d.getFullYear() ;
		$('#date').val(output);
		$(this).hide();
		$('#updatebtn').show();


		$(".table tr").each(function(index, val) {
			$(this).find('.attend_id').each(function(index, val) {
				var course_id=$(this).data('cid');
				var student_id=$(this).data('sid');
				var class_id=$(this).data('clid');
				var date=$('#date').val();
				var status=$(this).val();
				$.post("{{ route('addattendencesheet') }}", {class_id:class_id,course_id:course_id,student_id:student_id,status:status,date:date}, function(data) {
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

	$('#updatebtn').click(function(event) {
		$(".table tr").each(function(index, val) {
			$(this).find('.attend_id').each(function(index, val) {
				var course_id=$(this).data('cid');
				var student_id=$(this).data('sid');
				var class_id=$(this).data('clid');
				var status=$(this).val();
				var date=$('#date').val();
				$.post("{{ route('updateattendencesheet') }}", {class_id:class_id,course_id:course_id,student_id:student_id,status:status,date:date}, function(data) {
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
