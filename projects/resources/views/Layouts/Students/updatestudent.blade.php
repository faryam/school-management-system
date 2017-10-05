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
   <h3 class="page-header"><i class="fa fa-child"></i> UPDATE STUDENT</h3>
   <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
    <li><i class="fa fa-child"></i>STUDENTS</li>
    <li><i class="fa fa-child"></i>ALL STUDENT</li>
    <li><i class="fa fa-child"></i>UPDATE STUDENT</li>
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
      UPDATE STUDENT INFORMATION
      <a class="btn btn-primary pull-right" id="rest-btn"><i class="fa fa-refresh "></i> Reset Password</a>
     </header>
     <div class="panel-body">
      <div class="form">
        <form class="form-validate form-horizontal" id="register_form" method="post" action="" >
          <div class="form-group ">
            <label for="first" class="control-label col-lg-2">First Name <span class="required">*</span></label>
            <div class="col-lg-10">
              <input id="student_id" name="student_id" type="hidden" value="{{$student->student_id}}" />
              <input class="form-control " id="first_name" name="first_name" type="text" value="{{$student->student_first_name}}" />
            </div>
          </div>
          <div class="form-group ">
            <label for="last_name" class="control-label col-lg-2">Last Name <span class="required">*</span></label>
            <div class="col-lg-10">
              <input class="form-control " id="last_name" name="last_name" type="text" value="{{$student->student_last_name}}" />
            </div>
          </div>
          <div class="form-group ">
            <label for="sex" class="control-label col-lg-2">SEX <span class="required">*</span></label>
            <div class="col-lg-10">
              <div class="radio sameline">
                <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" @if ($student->student_sex==1) checked @endif />MALE   &emsp;
                </label>
              </div>
              <div class="radio sameline">
                <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" @if ($student->student_sex==0) checked @endif />FEMALE      

                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="datepicker" class="control-label col-lg-2">Date of Birth:<span class="required">*</span></label>                  
            <div class="col-lg-10">
              <input type="text" class="form-control " id="datepicker" name="datepicker" value="{{$student->student_dob}}"/>
            </div>


          </div>
          <div class="form-group ">
            <label for="phone_number" class="control-label col-lg-2">Phone Number <span class="required">*</span></label>
            <div class="col-lg-10">
              <input class="form-control " id="phone_number" name="phone_number" type="tel" value="{{$student->student_phone_number}}"/>
            </div>
          </div>
          <div class="form-group ">
            <label for="address" class="control-label col-lg-2">Address <span class="required">*</span></label>
            <div class="col-lg-10">
              <input class="form-control " id="address" name="address" type="text" value="{{$student->student_address}}"/>
            </div>
          </div>
          <input type="hidden" id="user_id" value="{{$student->user->id}}">
          <div class="form-group ">
            <label for="username" class="control-label col-lg-2">Username <span class="required">*</span></label>
            <div class="col-lg-10">
              <input class="form-control " id="username" name="username" type="text" value="{{$student->user->name}}"/>
            </div>
          </div>
          <div class="form-group ">
            <label for="email" class="control-label col-lg-2">Email <span class="required">*</span></label>
            <div class="col-lg-10">
              <input class="form-control " id="email" name="email" type="email" value="{{$student->user->email}}"/>
            </div>
          </div>
          <input type="hidden" id="parent_id" value="{{$student->parent->parent_id}}">
          <div class="form-group ">
            <label for="parent" class="control-label col-lg-2">Parent Name <span class="required">*</span></label>
            <div class="col-lg-6 ">
              <input class="form-control sameline" id="parent" name="parent" type="text" readonly value="{{$student->parent->parent_first_name}}  {{$student->parent->parent_last_name}}"/>

            </div>
            <a  class="btn btn-primary sameline"  id="parentbtn" href="#myModal" data-toggle="modal">SELECT PARENT</a>
            <a  class="btn btn-primary sameline"  href="{{ route('addparent') }}">REGISTER PARENT</a>
          </div>
          <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
              <button class="btn btn-primary" id="sub"  >SAVE</button>

            </div>
          </div>
        </form>
      </div>
    </div>
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
            <h4 class="modal-title">SELECT PARENT</h4>
          </div>
          <div class="modal-body">
            <label for="searchname">Search parent name</label>
            <input type="text" class="form-control" id="parentname" placeholder="Enter parent name">
            <div id="searchresult">
             <table class="table table-striped table-advance table-hover" id="rows">
               <tbody>
                <tr>

                 <th><i class="fa fa-user"></i> NAME</th>
                 <th><i class="icon_cogs"></i> Action</th>
               </tr>
               @foreach ($parents as $parent)
               <tr>

                <td>{{$parent->parent_first_name}} {{$parent->parent_last_name}}</td>

                <td>

                  <a class="btn btn-primary" title="ADD PARENT" onclick="fun('{{$parent->parent_id}}','{{$parent->parent_first_name}}','{{$parent->parent_last_name}}');" data-dismiss="modal">Select</a>

                </td>
              </tr>
              @endforeach                 
            </tbody>
          </table>
        </div>
      </div>
    </div>
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
    $.post("{{ route('restpasswordstudent') }}", {id:id,'_token':$('input[name=_token]').val()}, function(data) {
     $("#sucess").fadeIn();
     $('#sucess').html('<div class="alert alert-success fade in"><strong>Success!</strong> Student password has been reset new password is "abcde".</div>');
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
    var student_id=$('#student_id').val();
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
    $.post("{{ route('storeupdatestudent') }}", {id:id,student_id:student_id,first_name:first_name,last_name:last_name,sex:sex,dob:dob,phone_number:phone_number,address:address,name:name,parentid:parentid,email:email,'_token':$('input[name=_token]').val()}, function(data) {
      $("#sucess").fadeIn();
     $('#sucess').html('<div class="alert alert-success fade in"><strong>Success!</strong> Student has been Saved.</div>');
     $("#sucess").fadeOut(3000);
      scrollTo(0,0);
      console.log(data);
    }).fail(function(xhr, textStatus, errorThrown) { 
   // alert(xhr.responseText);
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
    required: "Please select parent for this student."

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

 $("#parentname").keyup(function(){
  var input=$("#parentname").val();
  $.post("{{ route('searchparent') }}", {input:input,'_token':$('input[name=_token]').val()}, function(data) {
    console.log(data);
    var txt=' <table class="table table-striped table-advance table-hover" id="rows"><tbody><tr><th><i class="icon_profile"></i> NAME</th><th><i class="icon_cogs"></i> Action</th></tr>';
    for (var i = 0; i <data.length; i++)
     {
      txt=txt+' <tr><td>'+data[i].parent_first_name+' '+data[i].parent_last_name +'</td> <td>    <a class="btn btn-primary" data-dismiss="modal" onclick="fun(\''+data[i].parent_id+'\',\''+data[i].parent_first_name+'\',\''+data[i].parent_last_name+'\');">Select</a> </td></tr>';
    }
    txt=txt+' </tbody></table>';
    $('#searchresult').html(txt);
    
  }).fail(function(xhr, textStatus, errorThrown) { 
    alert(xhr.responseText);
    
  });
});



function fun($id,$fname,$lname) {
  
  $('#parent').val($fname+' '+$lname);
   $('#parent_id').val($id);
}


</script>


@endsection