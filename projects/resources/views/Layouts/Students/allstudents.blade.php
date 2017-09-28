	@extends('Layouts.Dashboard.admindashboard')


	@section('content')

	 <div class="row">
					<div class="col-lg-12">
						<h3 class="page-header"><i class="fa fa-files-o"></i> ALL STUDENTS</h3>
						<ol class="breadcrumb">
							<li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
							<li><i class="icon_document_alt"></i>STUDENTS</li>
							<li><i class="fa fa-files-o"></i>ALL STUDENTS</li>
						</ol>
					</div>
				</div>

	<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                               REGISTERED STUDENTS
                          </header>
                          
                          <div id="re">
                          <table class="table table-striped table-advance table-hover" id="rows">
                           <tbody>
                              <tr>
                                  <th><i class="icon_profile"></i> ID</th>
                                 <th><i class="icon_profile"></i> NAME</th>
                                 <th><i class="icon_profile"></i> SEX</th>
                                 <th><i class="icon_profile"></i> DATE OF BIRTH</th>
                                 <th><i class="icon_mail_alt"></i> EMAIL</th>
                                  <th><i class="icon_profile"></i> PHONE NUMBER</th>
                                   <th><i class="icon_profile"></i> ADDRESS</th>
                                   <th><i class="icon_profile"></i> PARENT NAME</th>
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                              @foreach ($students as $student)
                              <tr>
                                <td >{{$student->student_id}}</td>
                                <td>{{$student->student_first_name}} {{$student->student_last_name}}</td>
                                <td>{{$student->student_sex}}</td>
                                <td>{{$student->student_dob}}</td>
                                <td>{{$student->user->email}}</td>
                                <td>{{$student->student_phone_number}}</td>
                                <td>{{$student->student_address}}</td>
                                <td>{{$student->parent->parent_first_name}} {{$student->parent->parent_last_name}}</td>
                                 <td>
                                  <div class="btn-group">
                                    <form action="{{ route('allstudentcourses') }}" method="post">
                                      {{csrf_field()}}
                                      <input type="hidden" name="id" value="{{$student->student_id}}">
                                      <button type="submit" class="btn btn-primary"> <i class="fa fa-book"></i> Courses </button>
                                      
                                    </form>
                                      <a class="btn btn-danger"  onclick="fun({{$student->student_id}})"> <i class="icon_close_alt2"></i></a>
                                  </div>
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