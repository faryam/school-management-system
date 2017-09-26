@extends('Layouts.Dashboard.admindashboard')


@section('content')

<div class="row">
  <div class="col-lg-12">
   <h3 class="page-header"><i class="fa fa-files-o"></i> ADD ADMIN</h3>
   <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
    <li><i class="icon_document_alt"></i>ADMINS</li>
    <li><i class="fa fa-files-o"></i>ADD ADMIN</li>
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
       ADMIN REGISTRATION
     </header>
     <div class="panel-body">
      <div class="form">
        <form class="form-validate form-horizontal" id="register_form" method="post" action="" >

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
    var name=$('#username').val();
    var password=$('#confirm_password').val();
    var email=$('#email').val();
    $.post("{{ route('storeadmin') }}", {name:name,password:password,email:email,role_name:'admin','_token':$('input[name=_token]').val()}, function(data) {
     $('#sucess').html('<div class="alert alert-success fade in"><strong>Success!</strong> Admin has been registered</div>');
     console.log(data);
   }).fail(function(xhr, textStatus, errorThrown) { 
 		//alert(xhr.responseText); <span class="glyphicon glyphicon-remove form-control-feedback"></span>
   // $('#username').after('<div class="alert alert-block alert-danger fade in"><strong>Oh snap!!</strong> Username is already taken.</div>');
     $('#username').after('<span class="text-danger"><strong>Oh snap!!</strong>Username is already taken.</span>');
  });



 }, 



 rules: {
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



</script>


@endsection