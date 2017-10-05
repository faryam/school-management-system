@extends('Layouts.Dashboard.admindashboard')


@section('content')

<div class="row">
  <div class="col-lg-12">
   <h3 class="page-header"><i class="fa fa-user"></i> ALL PARENTS</h3>
   <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
    <li><i class="fa fa-user"></i>PARENTS</li>
    <li><i class="fa fa-user"></i>ALL PARENTS</li>
  </ol>
</div>
</div>

<div class="row">
  <div class="col-lg-12" >
    <section class="panel">
      <span id="sucess"></span>
      <header class="panel-heading">
        REGISTERED PARENTS
      </header>
      <div id="re">
        <table class="table table-striped table-advance table-hover" id="rows">
         <tbody>
          <tr>
            <th><i class="icon_profile"></i> ID</th>
            <th><i class="icon_profile"></i> NAME</th>
            <th><i class="icon_profile"></i> SEX</th>
            <th><i class="icon_mail_alt"></i> EMAIL</th>
            <th><i class="fa fa-phone"></i> PHONE NUMBER</th>
            <th><i class="icon_profile"></i> ADDRESS</th>
            <th><i class="icon_cogs"></i> Action</th>
          </tr>
          @foreach ($parents as $parent)
          <tr>
           <td >{{$parent->parent_id}}</td>
           <td>{{$parent->parent_first_name}} {{$parent->parent_last_name}}</td>
           <td>{{$parent->parent_sex}}</td>
           <td>{{$parent->user->email}}</td>
           <td>{{$parent->parent_phone_number}}</td>
           <td>{{$parent->parent_address}}</td>
           <td>
            <div class="btn-group">

              <a class="btn btn-primary update-btn sameline" title="EDIT PARENT" data-id="{{$parent->parent_id}}"><i class="fa fa-pencil-square-o" ></i></a>
              <a class="btn btn-danger" title="DELETE PARENT" onclick="fun({{$parent->parent_id}})"> <i class="icon_close_alt2"></i></a>
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
<form action="{{ route('updateparent') }}" method="post" id="form-post">
  {{csrf_field()}}
  <input type="hidden" name="id" id="parent_id">


</form>



@endsection
{{csrf_field()}}

@section('script')

<script >
  function fun($parent_id) {
     var r = confirm("Do you want to remove record?");
    if (r == true) {
       var parent_id=$parent_id;
      $.post('{{ route('deleteparent') }}',  {parent_id:parent_id,'_token':$('input[name=_token]').val()}, function(data) {
        console.log(data);
        $("#sucess").fadeIn();
    $('#sucess').html('<div class="alert alert-success fade in"><strong>Success!</strong> Parent has been DELETED</div>');
     $("#sucess").fadeOut(5000);
      scrollTo(0,0);
          
        $("#re").load(location.href + " #re>*", "");
        }).fail(function(xhr, textStatus, errorThrown) { 
    //alert(xhr.responseText);
     $("#sucess").fadeIn();
     $('#sucess').html('<div class="alert alert-block alert-danger fade in"><strong>Oh snap!!</strong> Parent can not be deleted, it has registered Children please remove them first.</div>');
     $("#sucess").fadeOut(5000);
      scrollTo(0,0);
     });
    } 
    

  }

  $(".table tr").each(function(index, val) {
    $(this).find('.update-btn').each(function(index, val) {
      $(this).click(function(event) {

        var id=$(this).data('id');

        $("#parent_id").val(id);
        $("#form-post").submit();

      });

    });

  });


</script>>




@endsection