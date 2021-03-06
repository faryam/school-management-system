@extends('Layouts.Dashboard.admindashboard')


@section('content')

<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-book"></i> TEACHER COURSES</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
			<li><i class="fa fa-group"></i>TEACHERS</li>
			<li><i class="fa fa-group"></i>ALL TEACHERS</li>
			<li><i class="fa fa-book"></i>TEACHER COURSES</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<span id="sucess"></span>
			<header class="panel-heading">
				REGISTERED TEACHER COURSES &emsp;&emsp;&emsp;&emsp;
				<a class="btn btn-primary pull-right" href="#myModal" data-toggle="modal" ><i class="icon_plus_alt2"></i> Add Course</a>
			</header>
			<input type="hidden" value="{{$teacher_id}}" id="teacher_id">
			<div id="re">
				<table class="table table-striped table-advance table-hover" id="rows">
					<tbody>
						<tr>

							<th><i class="fa fa-book"></i> COURSE NAME</th>
							<th><i class="icon_desktop"></i> CLASS NAME</th>
						</tr>
						@foreach ($teacher_courses as $teacher_course)
						<tr>
							<td >{{$teacher_course->course->course_name}}</td>
							<td >{{$teacher_course->class->class_name}}</td>          
						</tr>
						@endforeach                 
					</tbody>
				</table>
			</div>
		</section>
	</div>
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

								<th><i class="fa fa-book"></i> COURSE NAME</th>
								<th><i class="icon_desktop"></i> CLASSES</th>
								<th><i class="icon_cogs"></i> Action</th>
							</tr>
							@foreach ($courses as $course)
							@if (count($course->classes)!=0)         
							<tr>

								<td>{{$course->course_name}}</td>
								<td>
									<select class="form-control m-bot15 class_id" data-id="{{$course->course_id}}">
										@foreach($course->classes as $classroom)
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



@endsection



@section('script')
<script >

	$(".table tr").each(function(index, val) {
		var pa=$(this);
		$(this).find('.add-btn').each(function(index, val) {
			$(this).click(function(event) {
				pa.find('.class_id').each(function(index, val) {
					var teacher_id=$('#teacher_id').val();
					var course_id=$(this).data('id');
					var class_id=$(this).val();
					$.post("{{ route('addteachercourse') }}", {teacher_id: teacher_id,course_id:course_id,class_id:class_id,'_token':$('input[name=_token]').val()}, function(data) {
						console.log(data);
						if(data=="false")
						{
							$('#sucess').html('<div class="alert alert-block alert-danger fade in"><strong>Oh snap!!</strong> course name is already added.</div>');
						}
						else
						{
							$('#sucess').html('<div class="alert alert-success fade in"><strong>Success!</strong> Course has been added</div>');
							window.location.reload(true);
              //  $("#re").load(location.href + " #re>*", "");
          }
      }).fail(function(xhr, textStatus, errorThrown) { 
      	alert(xhr.responseText);
    //
    
});

  });

			});
		});
	});

/*$(".table tr").find('.add-btn').each(function() {
   $(this).click(function(event) {
    alert("a");
      $(this).parent().find('.class_id').each(function() {
    alert($(this).val());
   });
});
 });
 */

</script>


@endsection