@extends('Layouts.Dashboard.admindashboard')


@section('content')

<div class="row">
  <div class="col-lg-12">
   <h3 class="page-header"><i class="fa fa-money"></i> ALL FEES</h3>
   <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
    <li><i class="fa fa-money"></i>FEES</li>
    <li><i class="fa fa-money"></i>ALL FEES</li>
  </ol>
</div>
</div>

<div class="row">
  <div class="col-lg-12" >
    <section class="panel">
      <span id="sucess"></span>
      <header class="panel-heading">
        REGISTERED FEES
      </header>
      <div id="re">
        <table class="table table-striped table-advance table-hover" id="rows">
         <tbody>
          <tr>
           <th><i class="icon_profile"></i> ID</th>
           <th><i class="fa fa-money"></i> FEE NAME</th>
           <th><i class="fa fa-money"></i> FEE AMOUNT</th>
           <th><i class="fa fa-calendar"></i> FEE DUE DATE</th>	
           <th><i class="fa fa-file-o"></i> FEE DETAILS</th>
           <th><i class="icon_cogs"></i> Action</th>
         </tr>
         @foreach ($fees as $fee)
         <tr>
           <td >{{$fee->fee_id}}</td>
           <td>{{$fee->fee_name}}</td>
           <td>{{$fee->fee_amount}}</td>
           <td>{{$fee->fee_duedate}}</td>
           <td>{{$fee->fee_details}}</td>
           <td>
            <div class="btn-group">
             <a class="btn btn-primary attend-btn"  title="FEE STATUS" data-fid="{{$fee->fee_id}}" ><i class="fa fa-qrcode" ></i></a>
             <a class="btn btn-primary update-btn" title="EDIT FEE" data-fid="{{$fee->fee_id}}"><i class="fa fa-pencil-square-o" ></i></a>
             <a class="btn btn-danger"  title="DELETE FEE" onclick="fun({{$fee->fee_id}})"> <i class="icon_close_alt2"></i></a>
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
<form action="{{ route('updatefee') }}" method="post" id="form-updatepost">
  {{csrf_field()}}
  <input type="hidden" name="id" id="fee_id">


</form>

<form action="{{ route('feestudentstatus') }}" method="post" id="form-post">
  {{csrf_field()}}
  <input type="hidden" name="fee_id" id="feee_id">

</form>
@endsection

@section('script')

<script >
  function fun($fee_id) {
   var r = confirm("Do you want to remove record?");
   if (r == true) {
    var fee_id=$fee_id;
     $.post('{{ route('deletefee') }}',  {fee_id:fee_id,'_token':$('input[name=_token]').val()}, function(data) {
      console.log(data);
      $("#sucess").fadeIn();
      $('#sucess').html('<div class="alert alert-success fade in"><strong>Success!</strong> Fee has been DELETED</div>');
      $("#sucess").fadeOut(5000);
      scrollTo(0,0);
      $("#re").load(location.href + " #re>*", "");
    }).fail(function(xhr, textStatus, errorThrown) { 
    alert(xhr.responseText);
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

      var id=$(this).data('fid');

      $("#fee_id").val(id);
      $("#form-updatepost").submit();

    });

  });

});

$(".table tr").each(function(index, val) {
  $(this).find('.attend-btn').each(function(index, val) {
    $(this).click(function(event) {

      var fee_id=$(this).data('fid');
      $("#feee_id").val(fee_id);
      $("#form-post").submit();

    });

  });

});

</script>

@endsection