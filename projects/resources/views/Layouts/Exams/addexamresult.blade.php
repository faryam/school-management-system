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
				ADD EXAM RESULT &emsp;&emsp;&emsp;&emsp;  EXAM NAME : {{$exam->exam_name}}  &emsp;&emsp;&emsp;&emsp;   COURSE NAME : {{$exam->course->course_name}} &emsp;&emsp;&emsp;&emsp; CLASS NAME : {{$students[0]->class->class_name}}
			</header>
			<div id="re">
				<table class="table table-striped table-advance table-hover" id="rows">
					<tbody>
						<tr>
							<th><i class="icon_profile"></i> STUDENT NAME</th>
							<th><i class="icon_profile"></i> ATTENDENCE</th>
						</tr>
						@foreach ($students as $student)
						<tr>
							<td >{{$student->student->student_first_name}}   {{$student->student->student_last_name}}</td>
							<td>
								<select class="form-control m-bot15 class_id" >

									<option value="present">PRESENT</option>
									<option value="absent">ABSENT</option>

								</select>
							</td>
						</tr>
						@endforeach                 
					</tbody>
				</table>
			</div>
			

		</section>

		
	</div>
</div>







@endsection
{{csrf_field()}}

@section('script')

<script >
	function fun($id) {
		var r = confirm("Do you want to remove record?");
		if (r == true) {
			var id=$id;
			$.post('{{ route('deleteadmin') }}',  {id:id,'_token':$('input[name=_token]').val()}, function(data) {
				console.log(data);
				$('#sucess').html('<div class="alert alert-success fade in"><strong>Success!</strong> Admin has been DELETED</div>');
				$("#re").load(location.href + " #re>*", "");
			});
		} 

        /*var table=' <tbody> <tr><th><i class="icon_profile"></i> ID</th><th><i class="icon_profile"></i> USERNAME</th><th><i class="icon_mail_alt"></i> PASSWORD</th><th><i class="icon_mail_alt"></i> EMAIL</th><th><i class="icon_cogs"></i> Action</th></tr>';
          for (i in data)
         {
          table=table+' <tr> <td>'+data[i].id+'</td> <td>'+data[i].name+'</td> <td>'+data[i].password+'</td> <td>'+data[i].email+'</td> <td>'+' <div class="btn-group"><a class="btn btn-primary" href="#" ><i class="icon_plus_alt2"></i></a><a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a><a class="btn btn-danger" href="#" onclick="fun('+data[i].id+')"><i class="icon_close_alt2"></i></a></div></td></tr>';
         }
         table=table+'</tbody>';

        $('#rows').html(table);
        */
//loction.reload(true);

}

$(".table tr").each(function(index, val) {
	var pa=$(this);
	$(this).find('.add-btn').each(function(index, val) {
		$(this).click(function(event) {
			pa.find('.class_id').each(function(index, val) {
				var exam_id=$(this).data('eid');
				var course_id=$(this).data('cid');
				var class_id=$(this).val();
				//alert(exam_id+" "+course_id+" "+class_id);
				$("#exam_id").val(exam_id);
				$("#course_id").val(course_id);
				$("#class_id").val(class_id);
				$("#form-post").submit();




			});

		});

	});
});


</script>




@endsection
