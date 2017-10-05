@extends('Layouts.Dashboard.admindashboard')

@section('style')

<style>
.sameline
{
  display: inline-block;
}

</style>

@section('content')

<div class="row">
  <div class="col-lg-12">
   <h3 class="page-header"><i class="fa fa-group"></i> ALL TEACHERS</h3>
   <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
    <li><i class="fa fa-group"></i>TEACHERS</li>
    <li><i class="fa fa-group"></i>ALL TEACHERS</li>
  </ol>
</div>
</div>

<div class="row">
  <div class="col-lg-12" >
    <section class="panel">
      <span id="sucess"></span>
      <header class="panel-heading">
        REGISTERED TEACHERS
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
            
            <th><i class="icon_cogs"></i> Action</th>
          </tr>
          @foreach ($teachers as $teacher)
          <tr>
            <td >{{$teacher->teacher_id}}</td>
            <td>{{$teacher->teacher_first_name}} {{$teacher->teacher_last_name}}</td>
            <td>{{$teacher->teacher_sex}}</td>
            <td>{{$teacher->teacher_dob}}</td>
            <td>{{$teacher->user->email}}</td>
            <td>{{$teacher->teacher_phone_number}}</td>
            <td>{{$teacher->teacher_address}}</td>
            
            <td>
              <div class="btn-group">
                <form action="{{ route('allteachercourses') }}" method="post" class="sameline">
                  {{csrf_field()}}
                  <input type="hidden" name="id" value="{{$teacher->teacher_id}}">
                  <button class="btn btn-primary" type="submit" title="TEACHER COURSES"> <i class="fa fa-book"></i></button>
                </form>
                <a class="btn btn-primary update-btn sameline" title="EDIT TEACHER" data-id="{{$teacher->teacher_id}}"><i class="fa fa-pencil-square-o" ></i></a>
                <a class="btn btn-danger"  title="DELETE TEACHER" onclick="fun({{$teacher->teacher_id}})"> <i class="icon_close_alt2"></i></a>
              </div>
            </td>
          </td>
        </tr>
        @endforeach                 
      </tbody>
    </table>
  </div>
</section>
</div>
</div>

<form action="{{ route('updateteacher') }}" method="post" id="form-post">
  {{csrf_field()}}
  <input type="hidden" name="id" id="teacher_id">


</form>



@endsection
{{csrf_field()}}

@section('script')

<script >
  function fun($teacher_id) {
     var r = confirm("Do you want to remove record?");
    if (r == true) {
       var teacher_id=$teacher_id;
      $.post('{{ route('deleteteacher') }}',  {teacher_id:teacher_id,'_token':$('input[name=_token]').val()}, function(data) {
        console.log(data);
         $("#sucess").fadeIn();
    $('#sucess').html('<div class="alert alert-success fade in"><strong>Success!</strong> Teacher has been DELETED</div>');
     $("#sucess").fadeOut(5000);
      scrollTo(0,0);
         
        $("#re").load(location.href + " #re>*", "");
        });
    } 
    
    
  }
  $(".table tr").each(function(index, val) {
    $(this).find('.update-btn').each(function(index, val) {
      $(this).click(function(event) {

        var id=$(this).data('id');

        $("#teacher_id").val(id);
        $("#form-post").submit();

      });

    });

  });

</script>

@endsection