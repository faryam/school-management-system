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
    <h3 class="page-header"><i class="fa fa-child"></i> ALL STUDENTS</h3>
    <ol class="breadcrumb">
     <li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
     <li><i class="fa fa-child"></i>STUDENTS</li>
     <li><i class="fa fa-child"></i>ALL STUDENTS</li>
   </ol>
 </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <span id="sucess"></span>
      <header class="panel-heading">
       REGISTERED STUDENTS
     </header>

     <div id="re">
      <table class="table table-striped table-advance table-hover" id="rows">
       <tbody>
        <tr>
          <th><i class="icon_profile"></i> ID</th>
          <th><i class="icon_profile"></i> NAME</th>
          <th><i class="icon_profile"></i> SEX</th>
          <th><i class="icon_profile"></i> DATE OF BIRTH</th>
          <th><i class="icon_mail_alt"></i> EMAIL</th>
          <th><i class="fa fa-phone"></i> PHONE NUMBER</th>
          <th><i class="icon_profile"></i> ADDRESS</th>
          <th><i class="fa fa-user"></i> PARENT NAME</th>
          <th><i class="icon_cogs"></i> Action</th>
        </tr>
        @foreach ($students as $student)
        <tr>
          <td >{{$student->student_id}}</td>
          <td>{{$student->student_first_name}} {{$student->student_last_name}}</td>
          <td> @if ($student->student_sex=="1") MALE @else FEMALE @endif</td>
          <td>{{$student->student_dob}}</td>
          <td>{{$student->user->email}}</td>
          <td>{{$student->student_phone_number}}</td>
          <td>{{$student->student_address}}</td>
          <td>{{$student->parent->parent_first_name}} {{$student->parent->parent_last_name}}</td>
          <td>
            <div class="btn-group">
              
              <a class="btn btn-primary update-btn sameline" title="EDIT STUDENT" data-id="{{$student->student_id}}"><i class="fa fa-pencil-square-o" ></i></a>
              <form action="{{ route('allstudentcourses') }}" method="post" class="sameline">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$student->student_id}}">
                <button type="submit" class="btn btn-primary sameline"> <i class="fa fa-book" title="STUDENT COURSES"></i></button>
              </form>
              <a class="btn btn-danger" title="DELETE STUDENT" onclick="fun({{$student->student_id}})"> <i class="icon_close_alt2"></i></a>
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

<form action="{{ route('updatestudent') }}" method="post" id="form-post">
  {{csrf_field()}}
  <input type="hidden" name="id" id="student_id">


</form>



@endsection


@section('script')

<script >
 function fun($student_id) {
   var r = confirm("Do you want to remove record?");
   if (r == true) {
    var student_id=$student_id;
     $.post('{{ route('deletestudent') }}',  {student_id:student_id,'_token':$('input[name=_token]').val()}, function(data) {
      console.log(data);
      $("#sucess").fadeIn();
      $('#sucess').html('<div class="alert alert-success fade in"><strong>Success!</strong> Student has been DELETED</div>');
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

        $("#student_id").val(id);
        $("#form-post").submit();

      });

    });

  });




</script>




@endsection