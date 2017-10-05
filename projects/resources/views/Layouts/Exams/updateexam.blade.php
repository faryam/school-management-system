@extends('Layouts.Dashboard.admindashboard')


@section('content')

<div class="row">
  <div class="col-lg-12">
   <h3 class="page-header"><i class="fa fa-clipboard"></i> UPDATE EXAM</h3>
   <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
    <li><i class="fa fa-clipboard"></i>EXAMS</li>
    <li><i class="fa fa-clipboard"></i>ALL EXAM</li>
    <li><i class="fa fa-clipboard"></i>UPDATE EXAM</li>
  </ol>
</div>
</div>


<div class="row">
  <div class="col-lg-12">
    <section class="panel">
     <span id="sucess"></span>
     <header class="panel-heading">
       UPDATE EXAM
     </header>
     <div class="panel-body">
      <div class="form">
        <form class="form-validate form-horizontal" id="register_form" method="post" action="" >
         
          <div class="form-group ">
            <label for="examname" class="control-label col-lg-2">Exam Name <span class="required">*</span></label>
            <div class="col-lg-10">
              <input id="exam_id" name="exam_id" type="hidden" value="{{$exam->exam_id}}" />
              <input class="form-control " id="examname" name="examname" type="text" value="{{$exam->exam_name}}"/>
            </div>
          </div>
          <div class="form-group ">
            <label for="section" class="control-label col-lg-2">Desciption</label>
            <div class="col-lg-10">
             <textarea class="form-control " id="desc" name="decs" >{{$exam->exam_description}}</textarea>
           </div>
         </div>
         
         <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
           <br>
           <button class="btn btn-primary" id="sub"  >SAVE</button>
           
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
    var exam_id=$('#exam_id').val();
    var exam_name=$('#examname').val();
    var desc=$('#desc').val();
    console.log(desc);
    $.post("{{ route('storeupdateexam') }}", {exam_id:exam_id,exam_name:exam_name,desc:desc,'_token':$('input[name=_token]').val()}, function(data) {
      
     $("#sucess").fadeIn();
     $('#sucess').html('<div class="alert alert-success fade in"><strong>Success!</strong> Exam has been saved.</div>');
     $("#sucess").fadeOut(3000);
     scrollTo(0,0);
     console.log(data);
   }).fail(function(xhr, textStatus, errorThrown) { 
 		//alert(xhr.responseText);
 		//$('#sucess').html('<div class="alert alert-block alert-danger fade in"><strong>Oh snap!!</strong> classroom name is already taken.</div>');
    $('#examname').after('<span class="text-danger"><strong>Oh snap!!</strong>Exam Name is already taken.</span>');
  });

   

 }, 
 
 

 rules: {
  examname: {
    required: true
  }
},
messages: {                
  examname: {
    required: "Please enter a examname."
  }
}

});

</script>


@endsection