@extends('Layouts.Dashboard.admindashboard')


@section('content')

<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-files-o"></i> ALL EXAMS</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
			<li><i class="icon_document_alt"></i>EXAMS</li>
			<li><i class="fa fa-files-o"></i>EXAM RESULTS</li>
			<li><i class="fa fa-files-o"></i>ADD EXAM RESULT</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12" >
		<section class="panel">
			<span id="sucess"></span>
			<header class="panel-heading">
				ADD EXAM RESULT &emsp;&emsp;&emsp;&emsp;  EXAM NAME : {{$exam->exam_name}}  &emsp;&emsp;&emsp;&emsp;   COURSE NAME : {{$exam->course->course_name}} &emsp;&emsp;&emsp;&emsp; CLASS NAME : @if (count($students)>0)
				{{$students[0]->class->class_name}}
				<a  class="btn btn-primary pull-right"  id="savebtn" >SAVE</a>	
				<a  class="btn btn-primary pull-right"  id="updatebtn" >SAVE</a>	
				@endif
				
			</header>
			@if (count($students)>0)
			<input type="hidden" id="cid" value="{{$students[0]->class->class_id}}">
			<input type="hidden" id="eid" value="{{$exam->exam_id}}">
			<div id="re">
				<table class="table table-striped table-advance table-hover" id="rows">
					<tbody>
						<tr>
							<th><i class="icon_profile"></i> STUDENT NAME</th>
							<th><i class="icon_profile"></i> GRADE</th>
						</tr>
						@foreach ($students as $student)
						<tr>
							<td >{{$student->student->student_first_name}}   {{$student->student->student_last_name}}</td>
							<td>
								<select class="form-control m-bot15 garde_id" data-sid="{{$student->student->student_id}}" data-eid="{{$exam->exam_id}}" data-cid="{{$students[0]->class->class_id}}">

									<option value=" "> </option>
									<option value="A+">A+</option>
									<option value="A">A</option>
									<option value="A-">A-</option>
									<option value="B+">B+</option>
									<option value="B">B</option>
									<option value="B-">B-</option>
									<option value="C+">C+</option>
									<option value="C">C</option>
									<option value="C-">C-</option>
									<option value="D+">D+</option>
									<option value="F">F</option>

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
		var classs_id=$('#cid').val();
		var exams_id=$('#eid').val();
		$(this).hide();
		$('#updatebtn').show();

		$.post("{{ route('addexamresultclass') }}", {class_id: classs_id,exam_id:exams_id}, function(data) {
			console.log(data);
		}).fail(function(xhr, textStatus, errorThrown) { 
			alert(xhr.responseText);
		});

		$(".table tr").each(function(index, val) {
			$(this).find('.garde_id').each(function(index, val) {
				var exam_id=$(this).data('eid');
				var student_id=$(this).data('sid');
				var class_id=$(this).data('cid');
				var grade=$(this).val();
				$.post("{{ route('addexamresult') }}", {class_id: classs_id,exam_id:exams_id,student_id:student_id,grade:grade}, function(data) {
					console.log(data);
					$("#sucess").fadeIn();
					$('#sucess').html('<div class="alert alert-success fade in"><strong>Success!</strong> Exam Result has been Saved.</div>');
					$("#sucess").fadeOut(2000);
				}).fail(function(xhr, textStatus, errorThrown) { 
					alert(xhr.responseText);
				});




			});

		});

	});

	$('#updatebtn').click(function(event) {
		$(".table tr").each(function(index, val) {
			$(this).find('.garde_id').each(function(index, val) {
				var exam_id=$(this).data('eid');
				var student_id=$(this).data('sid');
				var class_id=$(this).data('cid');
				var grade=$(this).val();
				$.post("{{ route('updateexamresult') }}", {class_id: class_id,exam_id:exam_id,student_id:student_id,grade:grade}, function(data) {
					console.log(data);
					$("#sucess").fadeIn();
					$('#sucess').html('<div class="alert alert-success fade in"><strong>Success!</strong> Exam Result has been Saved.</div>');
					$("#sucess").fadeOut(2000);
				}).fail(function(xhr, textStatus, errorThrown) { 
					alert(xhr.responseText);
				});




			});

		});
	});


</script>




@endsection
