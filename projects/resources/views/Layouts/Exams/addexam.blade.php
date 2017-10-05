@extends('Layouts.Dashboard.admindashboard')


@section('content')

<div class="row">
  <div class="col-lg-12">
   <h3 class="page-header"><i class="fa fa-clipboard"></i> ADD EXAM</h3>
   <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
    <li><i class="fa fa-clipboard"></i>EXAMS</li>
    <li><i class="fa fa-clipboard"></i>ADD EXAM</li>
  </ol>
</div>
</div>

<div class="row">
  <div class="col-lg-12">
    <section class="panel">
     <span id="sucess"></span>
     <header class="panel-heading">
       ADD NEW EXAM
     </header>
     <div class="panel-body">
      <div class="form">
        <form class="form-validate form-horizontal" id="register_form" method="post" action="" >

          <div class="form-group ">
            <label for="examname" class="control-label col-lg-2">Exam Name <span class="required">*</span></label>
            <div class="col-lg-10">
              <input class="form-control " id="examname" name="examname" type="text" />
            </div>
          </div>
          <div class="form-group ">
            <label for="section" class="control-label col-lg-2">Description</label>
            <div class="col-lg-10">
             <textarea class="form-control " id="desc" name="decs"></textarea>
           </div>
         </div>
          </br>
       <input type="hidden" id="course_id">
       <div class="form-group ">
        <label for="parent" class="control-label col-lg-2">Course Name <span class="required">*</span></label>
        <div class="col-lg-6 ">
          <input class="form-control sameline" id="course" name="course" type="text" readonly/>

        </div>
        <a  class="btn btn-primary sameline"  id="parentbtn" href="#myModal" data-toggle="modal">SELECT COURSE</a>
        <a  class="btn btn-primary sameline"  href="{{ route('addcourse') }}">REGISTER COURSE</a>
      </div>
         <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
           <br>
           <button class="btn btn-primary" id="sub"  >ADD</button>

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
        <h4 class="modal-title">SELECT COURSE</h4>
      </div>
      <div class="modal-body">
        <label for="searchname">Search Course name</label>
        <input type="text" class="form-control" id="coursename" placeholder="Enter course name">
        <div id="searchresult">
         <table class="table table-striped table-advance table-hover" id="rows">
           <tbody>
            <tr>

             <th><i class="fa fa-book"></i>COURSE NAME</th>
             <th><i class="icon_cogs"></i> Action</th>
           </tr>
           @foreach ($courses as $course)
           <tr>

            <td>{{$course->course_name}}</td>

            <td>

              <a class="btn btn-primary" title="ADD COURSE" onclick="fun('{{$course->course_id}}','{{$course->course_name}}');" data-dismiss="modal">Select</a>

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
 $("#register_form").validate({

  submitHandler: function(form) {
    var exam_name=$('#examname').val();
    var course_id=$('#course_id').val();
    var desc=$('#desc').val();
    console.log(desc);
    $.post("{{ route('storeexam') }}", {exam_name:exam_name,desc:desc,course_id:course_id,'_token':$('input[name=_token]').val()}, function(data) {
     
      $("#sucess").fadeIn();
     $('#sucess').html('<div class="alert alert-success fade in"><strong>Success!</strong> Exam has been added.</div>');
     $("#sucess").fadeOut(3000);
     scrollTo(0,0);
     console.log(data);
   }).fail(function(xhr, textStatus, errorThrown) { 
 		alert(xhr.responseText);
 		//$('#sucess').html('<div class="alert alert-block alert-danger fade in"><strong>Oh snap!!</strong> classroom name is already taken.</div>');
    $('#examname').after('<span class="text-danger"><strong>Oh snap!!</strong>Exam Name is already taken.</span>');
  });



 }, 



 rules: {
  examname: {
    required: true
  },
  course: {
    required: true
  }
},
messages: {                
  examname: {
    required: "Please enter a classname."
  },
  course: {
    required: "Please select a course."
  }
}

});

$("#coursename").keyup(function(){
  var input=$("#coursename").val();
  $.post("{{ route('searchcourse') }}", {input:input,'_token':$('input[name=_token]').val()}, function(data) {
    console.log(data);
    var txt=' <table class="table table-striped table-advance table-hover" id="rows"><tbody><tr><th><i class="icon_profile"></i> NAME</th><th><i class="icon_cogs"></i> Action</th></tr>';
    for (var i = 0; i <data.length; i++)
     {
      txt=txt+' <tr><td>'+data[i].course_name+'</td> <td>    <a class="btn btn-primary" data-dismiss="modal" onclick="fun(\''+data[i].course_id+'\',\''+data[i].course_name+'\');">Select</a> </td></tr>';
    }
    txt=txt+' </tbody></table>';
    $('#searchresult').html(txt);
    
  }).fail(function(xhr, textStatus, errorThrown) { 
    alert(xhr.responseText);
    
  });
});



 function fun($id,$name) {
  
  $('#course').val($name);
   $('#course_id').val($id);
}

</script>


@endsection