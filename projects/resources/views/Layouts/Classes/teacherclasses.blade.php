@extends('Layouts.Dashboard.teacherdashboard')


@section('content')

 <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_desktop"></i> ALL CLASSES</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="{{ route('teacherdashboard') }}">Home</a></li>
						<li><i class="icon_desktop"></i>CLASSES</li>
						<li><i class="icon_desktop"></i>ALL CLASSES</li>
					</ol>
				</div>
			</div>

<div class="row">
                  <div class="col-lg-12" >
                      <section class="panel">
                        <span id="sucess"></span>
                          <header class="panel-heading">
                              TEACHER CLASSES
                          </header>
                          <div id="re">
                          <table class="table table-striped table-advance table-hover" id="rows">
                           <tbody>
                              <tr>
                                 <th><i class="icon_profile"></i> ID</th>
                                 <th><i class="icon_profile"></i> CLASSROOM NAME</th>
                                 <th><i class="icon_profile"></i> CLASSROOM SECTION</th>
                                <th><i class="fa fa-calendar"></i> CLASSROOM DATE</th>	
                                 <th><i class="fa fa-clock-o"></i>CLASSROOM TIME</th>
                                 <th><i class="fa fa-book"></i> COURSE</th>
                                  <th><i class="fa fa-calendar"></i> ATTENDENCE</th>
                              </tr>
                              @foreach ($teacher->teachercourses as $classroom)
                              <tr>
                              	<td >{{$classroom->class->class_id}}</td>
                              	<td>{{$classroom->class->class_name}}</td>
                              	<td>{{$classroom->class->class_section}}</td>
                              	<td>{{$classroom->class->class_date}}</td>
                              		<td>{{$classroom->class->class_time}}</td>
                                  <td>{{$classroom->class->course->course_name}}</td>
                                  <td><a class="btn btn-primary attend-btn"  data-cid="{{$classroom->class->course->course_id}}" data-clid="{{$classroom->class->class_id}}" title="ATTENDENCE"><i class="fa fa-calendar" ></i></a></td>
                              </tr>
                              @endforeach                 
                           </tbody>
                        </table>
                      </div>
                      </section>
                  </div>
              </div>
<form action="{{ route('classteacherattdentencesheets') }}" method="post" id="form-post">
  {{csrf_field()}}
  <input type="hidden" name="class_id" id="class_id">

  <input type="hidden" name="course_id" id="course_id">


</form>


	@endsection


  @section('script')

<script >
  
$(".table tr").each(function(index, val) {
  $(this).find('.attend-btn').each(function(index, val) {
    $(this).click(function(event) {

      var course_id=$(this).data('cid');
      var class_id=$(this).data('clid');
      $("#course_id").val(course_id);
      $("#class_id").val(class_id);
      $("#form-post").submit();

    });

  });

});

</script>

@endsection
