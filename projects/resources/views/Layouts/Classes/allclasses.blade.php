@extends('Layouts.Dashboard.admindashboard')


@section('content')

 <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-files-o"></i> ALL CLASSES</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
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
                              REGISTERED CLASSES
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
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                              @foreach ($classrooms as $classroom)
                              <tr>
                              	<td >{{$classroom->class_id}}</td>
                              	<td>{{$classroom->class_name}}</td>
                              	<td>{{$classroom->class_section}}</td>
                              	<td>{{$classroom->class_date}}</td>
                              		<td>{{$classroom->class_time}}</td>
                                  <td>{{$classroom->course->course_name}}</td>
                              	 <td>
                                  <div class="btn-group">
                                      <a class="btn btn-primary" href="#" ><i class="icon_plus_alt2"></i></a>
                                      <a class="btn btn-danger"  onclick="fun({{$classroom->class_id}})"> <i class="icon_close_alt2"></i></a>
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




  </script>
  



  @endsection