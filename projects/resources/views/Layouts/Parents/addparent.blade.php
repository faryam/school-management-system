@extends('Layouts.Dashboard.admindashboard')

@section('style')

<style>
.sameline
{
	display: inline-block;
}

</style>
@endsection

@section('content')

 <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-files-o"></i> ADD PARENT</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
						<li><i class="icon_document_alt"></i>PARENTS</li>
						<li><i class="fa fa-files-o"></i>ADD PARENT</li>
					</ol>
				</div>
			</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
			 <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                      	<span id="sucess"></span>
                          <header class="panel-heading">
                             PARENT REGISTRATION
                          </header>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal" id="register_form" method="post" action="" >
                                      <div class="form-group ">
                                          <label for="first" class="control-label col-lg-2">First Name <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="first_name" name="first_name" type="text" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="last_name" class="control-label col-lg-2">Last Name <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="last_name" name="last_name" type="text" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="sex" class="control-label col-lg-2">SEX <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <div class="radio sameline">
                                              <label>
                                                  <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>MALE   &emsp;     
                                                 
                                              </label>
                                          </div>
                                           <div class="radio sameline">
                                              <label>
                                                  <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">FEMALE      
                                                 
                                              </label>
                                          </div>
                                          </div>
                                      </div>
                                       <div class="form-group">
							                <label for="datepicker" class="control-label col-lg-2">Date of Birth:<span class="required">*</span></label>									
							              		<div class="col-lg-10">
                                              		<input type="text" class="form-control " id="datepicker" name="datepicker" />
                                          		</div>
							                  
							                  
							          </div>
							          <div class="form-group ">
                                          <label for="phone_number" class="control-label col-lg-2">Phone Number <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="phone_number" name="phone_number" type="tel" />
                                          </div>
                                      </div>
                                       <div class="form-group ">
                                          <label for="address" class="control-label col-lg-2">Address <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="address" name="address" type="text" />
                                          </div>
                                      </div>
		
                                       <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Username <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="username" name="username" type="text" />
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="password" class="control-label col-lg-2">Password <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="password" name="password" type="password" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="confirm_password" class="control-label col-lg-2">Confirm Password <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="confirm_password" name="confirm_password" type="password" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="email" class="control-label col-lg-2">Email <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="email" name="email" type="email" />
                                          </div>
                                      </div>
                                      
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" id="sub"  >ADD</button>
                                              
                                          </div>
                                      </div>
                                  </form>
                              </div>
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
  	var first_name=$('#first_name').val();
  	var last_name=$('#last_name').val();
  	var sex=1;
  	if($('#optionsRadios1').is(':checked')){sex=1;}else{sex=0;};
  	var dob=$('#datepicker').val();
  	var phone_number=$('#phone_number').val();
  	var address=$('#address').val();
    var name=$('#username').val();
 	var password=$('#confirm_password').val();
 	var email=$('#email').val();
 	$.post("{{ route('storeparent') }}", {first_name:first_name,last_name:last_name,sex:sex,dob:dob,phone_number:phone_number,address:address,name:name,password:password,email:email,role_name:'parent','_token':$('input[name=_token]').val()}, function(data) {
 		$('#sucess').html('<div class="alert alert-success fade in"><strong>Success!</strong> Admin has been registered</div>');
 		console.log(data);
 	}).fail(function(xhr, textStatus, errorThrown) { 
 		alert(xhr.responseText);
 	 // $('#sucess').html('<div class="alert alert-block alert-danger fade in"><strong>Oh snap!!</strong> Username is already taken.</div>');
    $('#username').after('<span class="text-danger"><strong>Oh snap!!</strong>Username is already taken.</span>');
 		 });

 	

  }, 
           
            rules: {
                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                datepicker: {
                    required: true,
                },
                phone_number: {
                    required: true,
                    minlength:11,
                    digits: true

                },
                address: {
                    required: true,
                },
               
                username: {
                    required: true,
                    minlength: 5
                },
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {                
                 first_name: {
                    required: "Please enter a first name.",
                    
                },
                 last_name: {
                    required: "Please enter a last name.",
                   
                },
                 datepicker: {
                    required: "Please enter a date of birth.",
                   
                },
                 phone_number: {
                    required: "Please enter a Phone Number.",
                    minlength: "Please enter valid Phone Number.",
                    digits:"Please enter valid Phone Number."
                },
                username: {
                    required: "Please enter a Username.",
                    minlength: "Your username must consist of at least 5 characters long."
                },
                password: {
                    required: "Please provide a password.",
                    minlength: "Your password must be at least 5 characters long."
                },
                confirm_password: {
                    required: "Please provide a password.",
                    minlength: "Your password must be at least 5 characters long.",
                    equalTo: "Please enter the same password as above."
                },
                email: "Please enter a valid email address."
            }
        
        });

 	  $('#datepicker').datepicker({
      autoclose: true
    });

 </script>
 

@endsection