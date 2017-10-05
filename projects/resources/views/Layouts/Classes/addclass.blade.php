@extends('Layouts.Dashboard.admindashboard')


@section('content')

<div class="row">
  <div class="col-lg-12">
   <h3 class="page-header"><i class="fa fa-files-o"></i> ADD CLASS</h3>
   <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
    <li><i class="icon_desktop"></i>CLASSES</li>
    <li><i class="icon_desktop"></i>ADD CLASS</li>
  </ol>
</div>
</div>
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
     <span id="sucess"></span>
     <header class="panel-heading">
       ADD NEW CLASSROOM
     </header>
     <div class="panel-body">
      <div class="form">
        <form class="form-validate form-horizontal" id="register_form" method="post" action="" >

          <div class="form-group ">
            <label for="classname" class="control-label col-lg-2">Classroom Name <span class="required">*</span></label>
            <div class="col-lg-10">
              <input class="form-control " id="classname" name="classname" type="text" />
            </div>
          </div>
          <div class="form-group ">
            <label for="section" class="control-label col-lg-2">Section <span class="required">*</span></label>
            <div class="col-lg-10">
             <input class="form-control " id="section" name="section" type="text" />
           </div>
         </div>
         <div class="form-group">
           <label for="datepicker" class="control-label col-lg-2">Date:<span class="required">*</span></label>									
           <div class="col-lg-10">
            <input type="text" class="form-control " id="datepicker" name="datepicker" />
          </div>


        </div>
        <div class="bootstrap-timepicker">
         <div class="form-group">
           <label for="time" class="control-label col-lg-2">Time:<span class="required">*</span></label>	


           <div class="col-lg-10">
             <input type="text" class="form-control timepicker" id="time" name="time" />
           </div>
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

             <th><i class="fa fa-book"></i> COURSE NAME</th>
             <th><i class="icon_cogs"></i> Action</th>
           </tr>
           @foreach ($courses as $course)
           <tr>

            <td>{{$course->course_name}}</td>

            <td>

              <a class="btn btn-primary"  title="ADD COURSE" onclick="fun('{{$course->course_id}}','{{$course->course_name}}');" data-dismiss="modal">Select</a>

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
    var classname=$('#classname').val();
    var section=$('#section').val();
    var date=$('#datepicker').val();
    var time=$('#time').val();
    var course_id=$('#course_id').val();
    $.post("{{ route('storeclass') }}", {classname:classname,section:section,date:date,time:time,course_id:course_id,'_token':$('input[name=_token]').val()}, function(data) {
     
     $("#sucess").fadeIn();
    $('#sucess').html('<div class="alert alert-success fade in"><strong>Success!</strong> Classroom has been added.</div>');
     $("#sucess").fadeOut(3000);
     scrollTo(0,0);
     console.log(data);
   }).fail(function(xhr, textStatus, errorThrown) { 
 		alert(xhr.responseText);
 		//$('#sucess').html('<div class="alert alert-block alert-danger fade in"><strong>Oh snap!!</strong> classroom name is already taken.</div>');
    $('#classname').after('<span class="text-danger"><strong>Oh snap!!</strong>Classname is already taken.</span>');
  });



 }, 



 rules: {
  classname: {
    required: true
  },
  course: {
    required: true
  },
  section: {
    required: true
  },
  datepicker: {
    required: true
  },
  time: {
    required: true
  }
},
messages: {                
  classname: {
    required: "Please enter a classname."
  },
  course: {
    required: "Please Select a Course."
  },
  section: {
    required: "Please provide a section."
  },
  datepicker: {
    required: "Please provide a date."

  },
  time: {
    required: "Please provide a time."

  }
}

});
 $(function () {


    //Datemask dd/mm/yyyy



    //Date range as a button
    $('#daterange-btn').daterangepicker(
    {
      ranges   : {
        'Today'       : [moment(), moment()],
        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate  : moment()
    },
    function (start, end) {
      $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    
    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })

    $(document).ready(function() {

     $('#time').val(' ');
   });
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



 function fun($id,$fname) {
  
  $('#course').val($fname);
   $('#course_id').val($id);
}
</script>


@endsection