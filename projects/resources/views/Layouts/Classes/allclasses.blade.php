@extends('Layouts.Dashboard.admindashboard')


@section('content')

<div class="row">
  <div class="col-lg-12">
   <h3 class="page-header"><i class="icon_desktop"></i> ALL CLASSES</h3>
   <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
    <li><i class="icon_desktop"></i>CLASSES</li>
    <li><i class="icon_desktop"></i>ALL CLASSES</li>
  </ol>
</div>
</div>

<div class="row">
  <div class="col-lg-12" >
    <section class="panel">
      <span id="sucess"></span>
      <header class="panel-heading">
        REGISTERED CLASSES
      </header>
      <div id="re">
        <table class="table table-striped table-advance table-hover" id="rows">
         <tbody>
          <tr>
           <th><i class="icon_profile"></i> ID</th>
           <th><i class="icon_profile"></i> CLASSROOM NAME</th>
           <th><i class="icon_profile"></i> CLASSROOM SECTION</th>
           <th><i class="fa fa-calendar"></i > CLASSROOM DATE</th>	
           <th><i class="fa fa-clock-o"></i> CLASSROOM TIME</th>
           <th><i class="fa fa-book"></i> COURSE</th>
           <th><i class="icon_cogs"></i> Action</th>
         </tr>
         @foreach ($classrooms as $classroom)
         <tr>
           <td >{{$classroom->class_id}}</td>
           <td>{{$classroom->class_name}}</td>
           <td>{{$classroom->class_section}}</td>
           <td>{{$classroom->class_date}}</td>
           <td>{{$classroom->class_time}}</td>
           <td>{{$classroom->course->course_name}}</td>
           <td>
            <div class="btn-group">
             <a class="btn btn-primary attend-btn" title="CLASS ATTENDENCE" data-cid="{{$classroom->course->course_id}}" data-clid="{{$classroom->class_id}}"><i class="fa fa-calendar" ></i></a>
             <a class="btn btn-primary update-btn" title="EDIT CLASS" data-id="{{$classroom->class_id}}"><i class="fa fa-pencil-square-o" ></i></a>
             <a class="btn btn-danger"  title="DELETE CLASS" onclick="fun({{$classroom->class_id}})"> <i class="icon_close_alt2"></i></a>
           </div>
         </td>
       </tr>
       @endforeach                 
     </tbody>
   </table>
 </div>
</section>
</div>
</div>
<form action="{{ route('updateclassroom') }}" method="post" id="form-updatepost">
  {{csrf_field()}}
  <input type="hidden" name="id" id="class_id">


</form>

<form action="{{ route('classattdentencesheets') }}" method="post" id="form-post">
  {{csrf_field()}}
  <input type="hidden" name="class_id" id="classs_id">

  <input type="hidden" name="course_id" id="course_id">


</form>
@endsection

@section('script')

<script >
  function fun($class_id) {
   var r = confirm("Do you want to remove record?");
   if (r == true) {
    var class_id=$class_id;
     $.post('{{ route('deleteclass') }}',  {class_id:class_id,'_token':$('input[name=_token]').val()}, function(data) {
      console.log(data);
      $("#sucess").fadeIn();
      $('#sucess').html('<div class="alert alert-success fade in"><strong>Success!</strong> Classroom has been DELETED</div>');
      $("#sucess").fadeOut(5000);
      scrollTo(0,0);
      $("#re").load(location.href + " #re>*", "");
    }).fail(function(xhr, textStatus, errorThrown) { 
    alert(xhr.responseText);
   $("#sucess").fadeIn();
   $('#sucess').html('<div class="alert alert-block alert-danger fade in"><strong>Oh snap!!</strong> Course can not be deleted, it has registered Exams or Classrooms please remove them first.</div>');
   $("#sucess").fadeOut(5000);
   scrollTo(0,0);
 });
  } 

        /*var table=' <tbody> <tr><th><i class="icon_profile"></i> ID</th><th><i class="icon_profile"></i> USERNAME</th><th><i class="icon_mail_alt"></i> PASSWORD</th><th><i class="icon_mail_alt"></i> EMAIL</th><th><i class="icon_cogs"></i> Action</th></tr>';
          for (i in data)
         {
          table=table+' <tr> <td>'+data[i].id+'</td> <td>'+data[i].name+'</td> <td>'+data[i].password+'</td> <td>'+data[i].email+'</td> <td>'+' <div class="btn-group"><a class="btn btn-primary" href="#" ><i class="icon_plus_alt2"></i></a><a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a><a class="btn btn-danger" href="#" onclick="fun('+data[i].id+')"><i class="icon_close_alt2"></i></a></div></td></tr>';
         }
         table=table+'</tbody>';

        $('#rows').html(table);
        */
//loction.reload(true);

}
$(".table tr").each(function(index, val) {
  $(this).find('.update-btn').each(function(index, val) {
    $(this).click(function(event) {

      var id=$(this).data('id');

      $("#class_id").val(id);
      $("#form-updatepost").submit();

    });

  });

});

$(".table tr").each(function(index, val) {
  $(this).find('.attend-btn').each(function(index, val) {
    $(this).click(function(event) {

      var course_id=$(this).data('cid');
      var class_id=$(this).data('clid');
      $("#course_id").val(course_id);
      $("#classs_id").val(class_id);
      $("#form-post").submit();

    });

  });

});

</script>

@endsection