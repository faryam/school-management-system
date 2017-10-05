@extends('Layouts.Dashboard.admindashboard')


@section('content')

<div class="row">
  <div class="col-lg-12">
   <h3 class="page-header"><i class="fa fa-usd"></i> ALL FINANCES</h3>
   <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
    <li><i class="fa fa-usd"></i>FINANCES</li>
    <li><i class="fa fa-usd"></i>ALL FINANCES</li>
  </ol>
</div>
</div>

<div class="row">
  <div class="col-lg-12" >
    <section class="panel">
      <span id="sucess"></span>
      <header class="panel-heading">
        REGISTERED FINANCES
      </header>
      <div id="re">
        <table class="table table-striped table-advance table-hover" id="rows">
         <tbody>
          <tr>
           <th><i class="icon_profile"></i> ID</th>
           <th><i class="fa fa-usd"></i> FINANCE NAME</th>
           <th><i class="fa fa-money"></i> FINANCE AMOUNT</th>
           <th><i class="fa fa-thumb-tack"></i> FINANCE STATUS</th>	
           <th><i class="fa fa-clock-o"></i> FINANCE TIMESTAMP</th>
           <th><i class="icon_cogs"></i> Action</th>
         </tr>
         @foreach ($finances as $finance)
         <tr>
           <td >{{$finance->finance_id}}</td>
           <td>{{$finance->finance_name}}</td>
           <td>{{$finance->finance_amount}}</td>
           <td>{{$finance->finance_status}}</td>
           <td>{{$finance->finance_time}}</td>
           <td>
            <div class="btn-group">
             <a class="btn btn-primary update-btn" title="EDIT FINANCE" data-fid="{{$finance->finance_id}}"><i class="fa fa-pencil-square-o" ></i></a>
             <a class="btn btn-danger" title="DELETE FINANCE" onclick="fun({{$finance->finance_id}})"> <i class="icon_close_alt2"></i></a>
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
<form action="{{ route('updatefinance') }}" method="post" id="form-updatepost">
  {{csrf_field()}}
  <input type="hidden" name="id" id="finance_id">
</form>
@endsection

@section('script')

<script >
  function fun($finance_id) {
   var r = confirm("Do you want to remove record?");
   if (r == true) {
    var finance_id=$finance_id;
     $.post('{{ route('deletefinance') }}',  {finance_id:finance_id,'_token':$('input[name=_token]').val()}, function(data) {
      console.log(data);
      $("#sucess").fadeIn();
      $('#sucess').html('<div class="alert alert-success fade in"><strong>Success!</strong> Finance has been DELETED</div>');
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

      $("#finance_id").val(id);
      $("#form-updatepost").submit();

    });

  });

});



</script>

@endsection