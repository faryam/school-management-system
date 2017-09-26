@extends('Layouts.Dashboard.teacherdashboard')


@section('content')

 <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-files-o"></i> ALL CLASSES</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="{{ route('teacherdashboard') }}">Home</a></li>
						<li><i class="icon_document_alt"></i>CLASSES</li>
						<li><i class="fa fa-files-o"></i>ALL CLASSES</li>
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
                                <th><i class="icon_mail_alt"></i>CLASSROOM DATE</th>	
                                 <th><i class="icon_mail_alt"></i>CLASSROOM TIME</th>
                                 <th><i class="icon_mail_alt"></i>COURSE</th>
                              </tr>
                              @foreach ($teacher[0]->teachercourses as $classroom)
                              <tr>
                              	<td >{{$classroom->class->class_id}}</td>
                              	<td>{{$classroom->class->class_name}}</td>
                              	<td>{{$classroom->class->class_section}}</td>
                              	<td>{{$classroom->class->class_date}}</td>
                              		<td>{{$classroom->class->class_time}}</td>
                                  <td>{{$classroom->class->course->course_name}}</td>
                              </tr>
                              @endforeach                 
                           </tbody>
                        </table>
                      </div>
                      </section>
                  </div>
              </div>



	@endsection
