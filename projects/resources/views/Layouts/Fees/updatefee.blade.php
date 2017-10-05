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
   <h3 class="page-header"><i class="fa fa-money"></i> UPDATE FEE</h3>
   <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
    <li><i class="fa fa-money"></i>FEES</li>
    <li><i class="fa fa-money"></i>ALL FEES</li>
    <li><i class="fa fa-money"></i>UPDATE FEE</li>
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
       UPDATE FEE
     </header>
     <div class="panel-body">
      <div class="form">
        <form class="form-validate form-horizontal" id="register_form" method="post" action="" >
          <div class="form-group ">
            <label for="first" class="control-label col-lg-2">Fee Name <span class="required">*</span></label>
            <div class="col-lg-10">
              <input id="fee_id" name="course_id" type="hidden" value="{{$fee->fee_id}}" />
              <input class="form-control " id="fee_name" name="fee_name" type="text" value="{{$fee->fee_name}}"/>
            </div>
          </div>
          <div class="form-group ">
          <label for="datepicker" class="control-label col-lg-2">Fee Due Date:<span class="required">*</span></label>									
          <div class="col-lg-10">
            <input type="text" class="form-control " id="datepicker" name="datepicker" value="{{$fee->fee_duedate}}"/>
          </div>

        </div>
        <div class="form-group ">
          <label for="amount" class="control-label col-lg-2">Fee Amount <span class="required">*</span></label>
          <div class="col-lg-10">
            <input class="form-control " id="amount" name="amount" type="tel" value="{{$fee->fee_amount}}"/>
          </div>
        </div>
        <div class="form-group ">
          <label for="section" class="control-label col-lg-2">Fee Details</label>
          <div class="col-lg-10">
           <textarea class="form-control " id="desc" name="decs">{{$fee->fee_details}}</textarea>
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
 $("#register_form").validate({

  submitHandler: function(form) {
    var fee_id=$('#fee_id').val();
  	var fee_name=$('#fee_name').val();
  	var desc=$('#desc').val();
  	
  	var duedate=$('#datepicker').val();
  	var amount=$('#amount').val();
    $.post("{{ route('storeupdatefee') }}", {fee_id:fee_id,fee_name:fee_name,desc:desc,duedate:duedate,amount:amount,'_token':$('input[name=_token]').val()}, function(data) {

     $("#sucess").fadeIn();
     $('#sucess').html('<div class="alert alert-success fade in"><strong>Success!</strong> Fee has been Saved</div>');
     $("#sucess").fadeOut(3000);
     scrollTo(0,0);
     console.log(data);
   }).fail(function(xhr, textStatus, errorThrown) { 
     alert(xhr.responseText);
 	 // $('#sucess').html('<div class="alert alert-block alert-danger fade in"><strong>Oh snap!!</strong> Username is already taken.</div>');
   // $('#username').after('<span class="text-danger"><strong>Oh snap!!</strong>Username is already taken.</span>');
 });



 }, 

 rules: {
  fee_name: {
    required: true
  },
  datepicker: {
    required: true,
  },
  amount: {
    required: true,
    digits: true

  }
},
messages: {                
 fee_name: {
  required: "Please enter a fee name.",

}

,
datepicker: {
  required: "Please enter a due date.",

},
amount: {
  required: "Please enter a Amount.",
  digits:"Please enter valid Amount."
}
}

});

 $('#datepicker').datepicker({
  autoclose: true
});

</script>


@endsection