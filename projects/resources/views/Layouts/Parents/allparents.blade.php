@extends('Layouts.Dashboard.admindashboard')


@section('content')

 <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-files-o"></i> ALL PARENTS</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
						<li><i class="icon_document_alt"></i>PARENTS</li>
						<li><i class="fa fa-files-o"></i>ALL PARENTS</li>
					</ol>
				</div>
			</div>

<div class="row">
                  <div class="col-lg-12" >
                      <section class="panel">
                        <span id="sucess"></span>
                          <header class="panel-heading">
                              REGISTERED PARENTS
                          </header>
                          <div id="re">
                          <table class="table table-striped table-advance table-hover" id="rows">
                           <tbody>
                              <tr>
                                  <th><i class="icon_profile"></i> ID</th>
                                 <th><i class="icon_profile"></i> NAME</th>
                                 <th><i class="icon_profile"></i> SEX</th>
                                 <th><i class="icon_mail_alt"></i> EMAIL</th>
                                  <th><i class="icon_profile"></i> PHONE NUMBER</th>
                                   <th><i class="icon_profile"></i> ADDRESS</th>
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                              @foreach ($parents as $parent)
                              <tr>
                              	<td >{{$parent->parent_id}}</td>
                              	<td>{{$parent->parent_first_name}} {{$parent->parent_last_name}}</td>
                              	<td>{{$parent->parent_sex}}</td>
                              	<td>{{$parent->user->email}}</td>
                              	<td>{{$parent->parent_phone_number}}</td>
                              	<td>{{$parent->parent_address}}</td>
                              	 <td>
                                  <div class="btn-group">
                                      <a class="btn btn-primary" href="#" ><i class="icon_plus_alt2"></i></a>
                                      <a class="btn btn-danger"  onclick="fun({{$parent->id}})"> <i class="icon_close_alt2"></i></a>
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




  </script>>
  



  @endsection