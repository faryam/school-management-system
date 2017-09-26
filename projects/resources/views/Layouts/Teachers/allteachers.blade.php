@extends('Layouts.Dashboard.admindashboard')


@section('content')

 <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-files-o"></i> ALL TEACHERS</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
						<li><i class="icon_document_alt"></i>TEACHERS</li>
						<li><i class="fa fa-files-o"></i>ALL TEACHERS</li>
					</ol>
				</div>
			</div>

<div class="row">
                  <div class="col-lg-12" >
                      <section class="panel">
                        <span id="sucess"></span>
                          <header class="panel-heading">
                              REGISTERED TEACHERS
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
                                   
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                              @foreach ($teachers as $teacher)
                              <tr>
                                <td >{{$teacher->teacher_id}}</td>
                                <td>{{$teacher->teacher_first_name}} {{$teacher->teacher_last_name}}</td>
                                <td>{{$teacher->teacher_sex}}</td>
                                <td>{{$teacher->teacher_dob}}</td>
                                <td>{{$teacher->user->email}}</td>
                                <td>{{$teacher->teacher_phone_number}}</td>
                                <td>{{$teacher->teacher_address}}</td>
                                
                                 <td>
                                  <div class="btn-group">
                                    <form action="{{ route('teachercourses') }}" method="post">
                                      {{csrf_field()}}
                                      <input type="hidden" name="id" value="{{$teacher->teacher_id}}">
                                      <button type="submit" class="btn btn-primary"> <i class="fa fa-book"></i> Courses </button>
                                    </form>
                                      <a class="btn btn-danger"  onclick="fun({{$teacher->teacher_id}})"> <i class="icon_close_alt2"></i></a>
                                  </div>
                                  </td>
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
    /* var r = confirm("Do you want to remove record?");
    if (r == true) {
       var id=$id;
      $.post('{{ route('deleteadmin') }}',  {id:id,'_token':$('input[name=_token]').val()}, function(data) {
        console.log(data);
          $('#sucess').html('<div class="alert alert-success fade in"><strong>Success!</strong> Admin has been DELETED</div>');
        $("#re").load(location.href + " #re>*", "");
        });
    } 
      */
      
    }


  </script>
  
  @endsection