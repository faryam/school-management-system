@extends('Layouts.Dashboard.teacherdashboard')


@section('content')

 <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="icon_documents_alt"></i> CLASS ATTENDENCE SHEETS</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{{ route('teacherdashboard') }}">Home</a></li>
            <li><i class="icon_desktop"></i>CLASSES</li>
            <li><i class="icon_desktop"></i>ALL CLASSES</li>
            <li><i class="icon_documents_alt"></i>CLASS ATTENDENCE SHEETS</li>
          </ol>
        </div>
      </div>

<div class="row">
  <div class="col-lg-12" >
    <section class="panel">
      <span id="sucess"></span>
      <header class="panel-heading">
        CLASS ATTENDENCE SHEETS 
        <a class="btn btn-primary pull-right" id="add-btn"><i class="icon_plus_alt2 "></i> Add Attencence Sheet</a>
      </header>
      <div id="re">
        @if (count($attdentencedates)!=0)
        <table class="table table-striped table-advance table-hover" id="rows">
         <tbody>
          <tr>
           
           <th><i class="icon_desktop"></i> CLASSROOM NAME</th>
           <th><i class="fa fa-book"></i> COURSE NAME</th>
           <th><i class="fa fa-clock-o"></i> ATTENDENCE DATE</th>
           <th><i class="icon_cogs"></i> Action</th>
         </tr>
         @foreach ($attdentencedates as $date)
         <tr>
           <td>{{$classroom->class_name}}</td>
           <td>{{$classroom->course->course_name}}</td>
           <td>{{$date->attendence_date}}</td>
           <td>
            <div class="btn-group">
             <a class="btn btn-primary attend-btn"  data-date="{{$date->attendence_date}}" data-cid="{{$classroom->course->course_id}}" data-clid="{{$classroom->class_id}}" title="VIEW ATTENDENCE SHEET"><i class="fa fa-eye"></i> VIEW</a>
           </div>
         </td>
       </tr>
       @endforeach                 
     </tbody>
   </table>
   @else
         <span class="text-danger"><strong>No Attendence Sheets for this class.</strong></span>
    @endif
 </div>
</section>
</div>
</div>


<form action="{{ route('classteacherattdentencesheet') }}" method="post" id="form-post">
  {{csrf_field()}}
  <input type="hidden" name="class_id" id="classs_id">
   <input type="hidden" name="date" id="date">

  <input type="hidden" name="course_id" id="courses_id">


</form>
<form action="{{ route('addteacherclassattdentencesheet') }}" method="post" id="form-addpost">
  {{csrf_field()}}
  <input type="hidden" name="class_id" value="{{$classroom->class_id}}">

  <input type="hidden" name="course_id" value="{{$classroom->course->course_id}}">


</form>
@endsection

@section('script')

<script >
  
$('#add-btn').click(function(event) {
  $('#form-addpost').submit();

});

$(".table tr").each(function(index, val) {
  $(this).find('.attend-btn').each(function(index, val) {
    $(this).click(function(event) {
      var date=$(this).data('date');
      var course_id=$(this).data('cid');
      var class_id=$(this).data('clid');
      $("#courses_id").val(course_id);
      $("#classs_id").val(class_id);
       $("#date").val(date);
      $("#form-post").submit();

    });

  });

});




</script>




@endsection