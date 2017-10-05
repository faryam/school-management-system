@extends('Layouts.Dashboard.admindashboard')


@section('content')

<div class="row">
  <div class="col-lg-12">
   <h3 class="page-header"><i class="fa fa-key"></i> UPDATE ADMIN</h3>
   <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
    <li><i class="fa fa-key"></i>ADMINS</li>
    <li><i class="fa fa-key"></i>ALL ADMIN</li>
    <li><i class="fa fa-key"></i>UPDATE ADMIN</li>
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
      UPDATE ADMIN INFORMATION
      <a class="btn btn-primary pull-right" id="rest-btn"><i class="fa fa-refresh "></i> Reset Password</a>
    </header>
    <div class="panel-body">
      <div class="form">
        <form class="form-validate form-horizontal" id="register_form" method="post" action="" >

          <div class="form-group ">
            <label for="username" class="control-label col-lg-2">Username <span class="required">*</span></label>
            <div class="col-lg-10">
              <input class="form-control " id="username" name="username" type="text" value="{{$admin->name}}" />
              <input id="id" name="id" value="{{$admin->id}}" type="hidden" />
            </div>
          </div>
          <div class="form-group ">
            <label for="email" class="control-label col-lg-2">Email <span class="required">*</span></label>
            <div class="col-lg-10">
              <input class="form-control " id="email" name="email" type="email" value="{{$admin->email
              }}"/>
            </div>
          </div>

          <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
              <button class="btn btn-primary" id="sub"  >SAVE</button>

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

  $('#rest-btn').click(function(event) {
    var id=$('#id').val();
    $.post("{{ route('restpasswordadmin') }}", {id:id,'_token':$('input[name=_token]').val()}, function(data) {
     $("#sucess").fadeIn();
     $('#sucess').html('<div class="alert alert-success fade in"><strong>Success!</strong> Admin password has been reset new password is "abcde".</div>');
     $("#sucess").fadeOut(5000);
     console.log(data);
   }).fail(function(xhr, textStatus, errorThrown) { 
    alert(xhr.responseText);
    $('#username').after('<span class="text-danger"><strong>Oh snap!!</strong>Username is already taken.</span>');
  });
 });

  $("#register_form").validate({

    submitHandler: function(form) {
      var name=$('#username').val();
      var email=$('#email').val();
      var id=$('#id').val();
      $.post("{{ route('storeupdateadmin') }}", {id:id,name:name,email:email,'_token':$('input[name=_token]').val()}, function(data) {
       $("#sucess").fadeIn();
       $('#sucess').html('<div class="alert alert-success fade in"><strong>Success!</strong> Admin has been Saved.</div>');
       $("#sucess").fadeOut(2000);
       console.log(data);
     }).fail(function(xhr, textStatus, errorThrown) { 
       alert(xhr.responseText);
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