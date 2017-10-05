@extends('Layouts.Dashboard.teacherdashboard')


@section('content')

 <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-book"></i> TEACHER COURSES</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="{{ route('teacherdashboard') }}">Home</a></li>
						<li><i class="fa fa-book"></i>COURSES</li>
						<li><i class="fa fa-book"></i>TEACHER COURSES</li>
					</ol>
				</div>
			</div>

<div class="row">
                  <div class="col-lg-12" >
                      <section class="panel">
                        <span id="sucess"></span>
                          <header class="panel-heading">
                              TEACHER COURSES
                          </header>
                          <div id="re">
                          <table class="table table-striped table-advance table-hover" id="rows">
                           <tbody>
                              <tr>
                                 <th><i class="icon_profile"></i> ID</th>
                                 <th><i class="fa fa-book"></i>COURSE NAME</th>
                                 <th><i class="icon_desktop"></i> CLASSROOM NAME</th>
                                 
                              </tr>
                              @foreach ($teacher->teachercourses as $course)
                              <tr>
                              	<td >{{$course->course->course_id}}</td>
                              	<td>{{$course->course->course_name}}</td>
                                  <td>{{$course->class->class_name}}</td>
                              </tr>
                              @endforeach                 
                           </tbody>
                        </table>
                      </div>
                      </section>
                  </div>
              </div>



	@endsection
