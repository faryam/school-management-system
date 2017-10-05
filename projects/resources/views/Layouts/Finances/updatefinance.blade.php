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
   <h3 class="page-header"><i class="fa fa-usd"></i> UPDATE FINANCES</h3>
   <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
    <li><i class="fa fa-usd"></i>FINANCES</li>
    <li><i class="fa fa-usd"></i>ALL FINANCES</li>
    <li><i class="fa fa-usd"></i>UPDATE FINANCES</li>
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
       ADD NEW FINANCE
     </header>
     <div class="panel-body">
      <div class="form">
        <form class="form-validate form-horizontal" id="register_form" method="post" action="" >
          <div class="form-group ">
            <label for="first" class="control-label col-lg-2">Finance Name <span class="required">*</span></label>
            <div class="col-lg-10">
            	<input id="finance_id" name="finance_id" type="hidden" value="{{$finance->finance_id}}" />
              <input class="form-control " id="finance_name" name="finance_name" type="text" value="{{$finance->finance_name}}"/>
            </div>
          </div>
        <div class="form-group ">
          <label for="amount" class="control-label col-lg-2">Finance Amount <span class="required">*</span></label>
          <div class="col-lg-10">
            <input class="form-control " id="amount" name="amount" type="tel" value="{{$finance->finance_amount}}"/>
          </div>
        </div>
        <div class="form-group ">
            <label for="sex" class="control-label col-lg-2">Finance Status <span class="required">*</span></label>
            <div class="col-lg-10">
              <div class="radio sameline">
                <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" @if ($finance->finance_status=="received") checked @endif>RECEIVED   &emsp;     

                </label>
              </div>
              <div class="radio sameline">
                <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" @if ($finance->finance_status=="paid") checked @endif>PAID      

                </label>
              </div>
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
  	 var finance_id=$('#finance_id').val();
  	var finance_name=$('#finance_name').val();
  	var status="received";
    if($('#optionsRadios1').is(':checked')){status="received";}else{status="paid";};
  	var amount=$('#amount').val();
    $.post("{{ route('storeupdatefinance') }}", {finance_id:finance_id,finance_name:finance_name,status:status,amount:amount,'_token':$('input[name=_token]').val()}, function(data) {

     $("#sucess").fadeIn();
     $('#sucess').html('<div class="alert alert-success fade in"><strong>Success!</strong> Finance has been Saved</div>');
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
  finance_name: {
    required: true
  },
  amount: {
    required: true,
    digits: true

  }
},
messages: {                
 finance_name: {
  required: "Please enter a finance name.",

},
amount: {
  required: "Please enter a Amount.",
  digits:"Please enter valid Amount."
}
}

});

 

</script>


@endsection