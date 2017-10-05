@extends('Layouts.Dashboard.teacherdashboard')


@section('content')

<div class="row">
  <div class="col-lg-12">
   <h3 class="page-header"><i class="fa fa-list-alt"></i>COURSE EXAM RESULT</h3>
   <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="{{ route('teacherdashboard') }}">Home</a></li>
    <li><i class="fa fa-book"></i>COURSES</li>
    <li><i class="fa fa-files-o"></i>COURSES EXAMS</li>
    <li><i class="fa fa-list-alt"></i>COURSE EXAM RESULT</li>
  </ol>
</div>
</div>
<div class="row">
	<div class="col-lg-12" >
		<section class="panel">
			<span id="sucess"></span>
			<header class="panel-heading">
				COURSE EXAM RESULT
				@if (count($student_exam_grade)!=0)
				 	<a  class="btn btn-primary pull-right"  id="updatebtn" >SAVE</a>
				 @endif 
					
			</header>
			<div id="re">
				@if (count($student_exam_grade)!=0)
					<table class="table table-striped table-advance table-hover" id="rows">
					<tbody>
						<tr>
							<th><i class="fa fa-child"></i> STUDENT NAME</th>
							<th><i class="fa fa-sliders"></i> GRADE</th>
						</tr>
						@foreach ($student_exam_grade as $student)
						<tr>
							<td >{{$student->student->student_first_name}}   {{$student->student->student_last_name}}</td>
							<td>
							<select class="form-control m-bot15 garde_id" data-sid="{{$student->student->student_id}}" data-eid="{{$student->exam_id}}" data-cid="{{$student->class_id}}">

									<option value=" " @if ($student->exam_grade==" ") selected @endif> </option>
									<option value="A+" @if ($student->exam_grade=="A+") selected @endif>A+</option>
									<option value="A" @if ($student->exam_grade=="A") selected @endif>A</option>
									<option value="A-" @if ($student->exam_grade=="A-") selected @endif>A-</option>
									<option value="B+" @if ($student->exam_grade=="B+") selected @endif>B+</option>
									<option value="B" @if ($student->exam_grade=="B") selected @endif>B</option>
									<option value="B-" @if ($student->exam_grade=="B-") selected @endif>B-</option>
									<option value="C+" @if ($student->exam_grade=="C+") selected @endif>C+</option>
									<option value="C" @if ($student->exam_grade=="C") selected @endif>C</option>
									<option value="C-" @if ($student->exam_grade=="C-") selected @endif>C-</option>
									<option value="D+" @if ($student->exam_grade=="D+") selected @endif>D+</option>
									<option value="F" @if ($student->exam_grade=="F") selected @endif>F</option>

								</select>
								</td>
						</tr>
						@endforeach                 
					</tbody>
				</table>
				@else
					
					<span class="text-danger"><strong>No Student Exam Results .</strong></span>
				@endif
				
			</div>
		</section>

		
	</div>
</div>

@endsection



@section('script')
<script>


	$('#updatebtn').click(function(event) {
		$(".table tr").each(function(index, val) {
			$(this).find('.garde_id').each(function(index, val) {
				var exam_id=$(this).data('eid');
				var student_id=$(this).data('sid');
				var class_id=$(this).data('cid');
				var grade=$(this).val();
				$.post("{{ route('updateteacherexamresult') }}", {class_id: class_id,exam_id:exam_id,student_id:student_id,grade:grade}, function(data) {
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