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
   <h3 class="page-header"><i class="fa fa-user"></i> UPDATE PARENT</h3>
   <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
    <li><i class="fa fa-user"></i>PARENTS</li>
    <li><i class="fa fa-user"></i>ALL PARENT</li>
    <li><i class="fa fa-user"></i>UPDATE PARENT</li>
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
      UPDATE PARENT INFORMATION
      <a class="btn btn-primary pull-right" id="rest-btn"><i class="fa fa-refresh "></i> Reset Password</a>
     </header>
     <div class="panel-body">
      <div class="form">
        <form class="form-validate form-horizontal" id="register_form" method="post" action="" >
          <div class="form-group ">
            <label for="first" class="control-label col-lg-2">First Name <span class="required">*</span></label>
            <div class="col-lg-10">
              <input id="parent_id" name="parent_id" type="hidden" value="{{$parent->parent_id}}" />
              <input class="form-control " id="first_name" name="first_name" type="text" value="{{$parent->parent_first_name}}" />
            </div>
          </div>
          <div class="form-group ">
            <label for="last_name" class="control-label col-lg-2">Last Name <span class="required">*</span></label>
            <div class="col-lg-10">
              <input class="form-control " id="last_name" name="last_name" type="text" value="{{$parent->parent_last_name}}" />
            </div>
          </div>
          <div class="form-group ">
            <label for="sex" class="control-label col-lg-2">SEX <span class="required">*</span></label>
            <div class="col-lg-10">
              <div class="radio sameline">
                <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" @if ($parent->parent_sex==1) checked @endif />MALE   &emsp;
                </label>
              </div>
              <div class="radio sameline">
                <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" @if ($parent->parent_sex==0) checked @endif />FEMALE      

                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="datepicker" class="control-label col-lg-2">Date of Birth:<span class="required">*</span></label>                  
            <div class="col-lg-10">
              <input type="text" class="form-control " id="datepicker" name="datepicker" value="{{$parent->parent_dob}}"/>
            </div>


          </div>
          <div class="form-group ">
            <label for="phone_number" class="control-label col-lg-2">Phone Number <span class="required">*</span></label>
            <div class="col-lg-10">
              <input class="form-control " id="phone_number" name="phone_number" type="tel" value="{{$parent->parent_phone_number}}"/>
            </div>
          </div>
          <div class="form-group ">
            <label for="address" class="control-label col-lg-2">Address <span class="required">*</span></label>
            <div class="col-lg-10">
              <input class="form-control " id="address" name="address" type="text" value="{{$parent->parent_address}}"/>
            </div>
          </div>
          <input type="hidden" id="user_id" value="{{$parent->user->id}}">
          <div class="form-group ">
            <label for="username" class="control-label col-lg-2">Username <span class="required">*</span></label>
            <div class="col-lg-10">
              <input class="form-control " id="username" name="username" type="text" value="{{$parent->user->name}}"/>
            </div>
          </div>
          <div class="form-group ">
            <label for="email" class="control-label col-lg-2">Email <span class="required">*</span></label>
            <div class="col-lg-10">
              <input class="form-control " id="email" name="email" type="email" value="{{$parent->user->email}}"/>
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
    var id=$('#user_id').val();
    $.post("{{ route('restpasswordparent') }}", {id:id,'_token':$('input[name=_token]').val()}, function(data) {
     $("#sucess").fadeIn();
     $('#sucess').html('<div class="alert alert-success fade in"><strong>Success!</strong> Parent password has been reset new password is "abcde".</div>');
     $("#sucess").fadeOut(5000);
      scrollTo(0,0);
     console.log(data);
   }).fail(function(xhr, textStatus, errorThrown) { 
    alert(xhr.responseText);
    
  });
 });


 $("#register_form").validate({

  submitHandler: function(form) {
    var id=$('#user_id').val();
    var parent_id=$('#parent_id').val();
    var first_name=$('#first_name').val();
    var last_name=$('#last_name').val();
    var sex=1;
    if($('#optionsRadios1').is(':checked')){sex=1;}else{sex=0;};
    var dob=$('#datepicker').val();
    var phone_number=$('#phone_number').val();
    var address=$('#address').val();
    var name=$('#username').val();
    var email=$('#email').val();
    var parentid=$('#parent_id').val();
    $.post("{{ route('storeupdateparent') }}", {id:id,parent_id:parent_id,first_name:first_name,last_name:last_name,sex:sex,dob:dob,phone_number:phone_number,address:address,name:name,email:email,'_token':$('input[name=_token]').val()}, function(data) {
      $("#sucess").fadeIn();
     $('#sucess').html('<div class="alert alert-success fade in"><strong>Success!</strong> Parent has been Saved.</div>');
     $("#sucess").fadeOut(3000);
      scrollTo(0,0);
      console.log(data);
    }).fail(function(xhr, textStatus, errorThrown) { 
    //alert(xhr.responseText);
  //  $('#sucess').html('<div class="alert alert-block alert-danger fade in"><strong>Oh snap!!</strong> Username is already taken.</div>');
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
    parent: {
      required: true,
    },

    username: {
      required: true,
      minlength: 5
    },
    email: {
      required: true,
      email: true
    }
  },
  messages: {                
   first_name: {
    required: "Please enter a first name."

  },
  last_name: {
    required: "Please enter a last name."

  },
  datepicker: {
    required: "Please enter a date of birth."

  },
  parent: {
    required: "Please select parent for this teacher."

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
 
  email: "Please enter a valid email address."
}

});

 $('#datepicker').datepicker({
  autoclose: true
});








</script>


@endsection