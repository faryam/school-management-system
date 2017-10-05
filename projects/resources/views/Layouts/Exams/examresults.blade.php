@extends('Layouts.Dashboard.admindashboard')


@section('content')

<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-files-o"></i> ALL EXAMS</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
			<li><i class="icon_document_alt"></i>EXAMS</li>
			<li><i class="fa fa-files-o"></i>EXAM RESULTS</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12" >
		<section class="panel">
			<span id="sucess"></span>
			<header class="panel-heading">
				EXAM RESULTS &emsp;&emsp;&emsp;&emsp;
				<a class="btn btn-primary pull-right" href="#myModal" data-toggle="modal" ><i class="icon_plus_alt2"></i> Add Exam Result</a>
			</header>
			<div id="re">
				<table class="table table-striped table-advance table-hover rtable" id="rows">
					<tbody>
						<tr>
							<th><i class="icon_profile"></i> EXAM NAME</th>
							<th><i class="icon_profile"></i> COURSE NAME</th>
							<th><i class="icon_profile"></i> CLASS NAME</th>
							<th><i class="icon_cogs"></i> Action</th>
						</tr>
						@foreach ($exam_classes as $exam_class)
						<tr>
							<td >{{$exam_class->exam->exam_name}}</td>
							<td>{{$exam_class->exam->course->course_name}}</td>
							<td>{{$exam_class->class->class_name}}</td>
							<td>
									<input type="hidden" name="exam_id"  class="abc" data-eid="{{$exam_class->exam->exam_id}}" data-cid="{{$exam_class->class->class_id}}">
									<a class="btn btn-primary view-btn"><i class="fa fa-eye"></i>VIEW</a>
							</td>
						</tr>
						@endforeach                 
					</tbody>
				</table>
			</div>
			<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
							<h4 class="modal-title">SELECT COURSE</h4>
						</div>
						<div class="modal-body">

							<div id="searchresult">
								<table class="table table-striped table-advance table-hover" id="rows">
									<tbody>
										<tr>

											<th><i class="icon_profile"></i>EXAM NAME</th>
											<th><i class="icon_profile"></i>COURSE NAME</th>
											<th><i class="icon_profile"></i>SELECT CLASS NAME</th>
											<th><i class="icon_cogs"></i> Action</th>
										</tr>
										@foreach ($exams as $exam)
										@if (count($exam->course->classes)!=0)         
										<tr>

											<td>{{$exam->exam_name}}</td>
											<td>{{$exam->course->course_name}}</td>
											<td>
												<select class="form-control m-bot15 class_id" data-cid="{{$exam->course_id}}" data-eid="{{$exam->exam_id}}">
													@foreach($exam->course->classes as $classroom)
													<option value="{{$classroom->class_id}}">{{$classroom->class_name}}</option>
													@endforeach
												</select>
											</td>
											<td>

												<a class="btn btn-primary add-btn"   data-dismiss="modal">ADD</a>

											</td>
										</tr>
										@endif
										@endforeach                 
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

		</section>

		<form action="{{ route('newexamresult') }}" method="post" id="form-post">
			{{csrf_field()}}
			<input type="hidden" name="exam_id" id="exam_id">
			<input type="hidden" name="course_id" id="course_id">
			<input type="hidden" name="class_id" id="class_id">


		</form>

		<form action="{{ route('viewexamresult') }}" method="post" id="form-postupdate">
			{{csrf_field()}}
			<input type="hidden" name="exam_id" id="exams_id">
			
			<input type="hidden" name="class_id" id="classs_id">


		</form>
	</div>
</div>







@endsection


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
				$("#exam_id").val(exam_id);
				$("#course_id").val(course_id);
				$("#class_id").val(class_id);
				$.post("{{ route('checkexamresultclass') }}", {exam_id: exam_id,class_id:class_id}, function(data) {
					console.log(data);
					if (data=="true")
					{

							$("#form-post").submit();
					}
					else
					{
						$('#sucess').html('<div class="alert alert-block alert-danger fade in"><strong>Oh snap!!</strong> Exam Result is already entered.</div>');
					}


				}).fail(function(xhr, textStatus, errorThrown) { 
 		//alert(xhr.responseText);
 		
   
  });


			




			});

		});

	});
});


$(".table tr").each(function(index, val) {
	var pa=$(this);
	$(this).find('.view-btn').each(function(index, val) {
		$(this).click(function(event) {
			pa.find('.abc').each(function(index, val) {
				var exam_id=$(this).data('eid');
				var class_id=$(this).data('cid');
				//alert(exam_id+"  "+class_id);
				$("#exams_id").val(exam_id);
				$("#classs_id").val(class_id);
				$("#form-postupdate").submit();




			});

		});

	});
});


</script>




@endsection
