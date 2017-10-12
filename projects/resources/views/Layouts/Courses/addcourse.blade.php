@extends('Layouts.Dashboard.admindashboard')


@section('content')

 <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-book"></i> ADD COURSE</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
						<li><i class="fa fa-book"></i>COURSES</li>
						<li><i class="fa fa-book"></i>ADD COURSE</li>
					</ol>
				</div>
			</div>


 <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                      	<span id="sucess"></span>
                          <header class="panel-heading">
                             ADD NEW COURSE
                          </header>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal" id="register_form" method="post" action="" >
                                     
                                      <div class="form-group ">
                                          <label for="coursename" class="control-label col-lg-2">Course Name <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="coursename" name="coursename" type="text" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="section" class="control-label col-lg-2">Desciption</label>
                                          <div class="col-lg-10">
                                               <textarea class="form-control " id="desc" name="decs"></textarea>
                                          </div>
                                      </div>
                                    
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                          	<br>
                                              <button class="btn btn-primary" id="sub"  >ADD</button>
                                              
                                          </div>
                                      </div>

                                  </form>
                                   
                          </div>
                      </section>
                  </div>
              </div>

@endsection
{{csrf_field()}}

@section('script')
 <script>
 	 $("#register_form").validate({
           
  submitHandler: function(form) {
    var course_name=$('#coursename').val();
 	var desc=$('#desc').val();
 	console.log(desc);
 	$.post("{{ route('storecourse') }}", {course_name:course_name,desc:desc,'_token':$('input[name=_token]').val()}, function(data) {
 		
    $("#sucess").fadeIn();
     $('#sucess').html('<div class="alert alert-success fade in"><strong>Success!</strong> Course has been added.</div>');
     $("#sucess").fadeOut(3000);
     scrollTo(0,0);
 		console.log(data);
 	}).fail(function(xhr, textStatus, errorThrown) { 
 		alert(xhr.responseText);
 		//$('#sucess').html('<div class="alert alert-block alert-danger fade in"><strong>Oh snap!!</strong> classroom name is already taken.</div>');
 	  $('#coursename').after('<span class="text-danger"><strong>Oh snap!!</strong>Course Name is already taken.</span>');
 		 });

 	

  }, 
           
  

            rules: {
                coursename: {
                    required: true
                }
            },
            messages: {                
                coursename: {
                    required: "Please enter a classname."
                }
            }
           
        });

 </script>
 

@endsection