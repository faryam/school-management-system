@extends('Layouts.Dashboard.teacherdashboard')


@section('content')

<div class="row">
  <div class="col-lg-12">
   <h3 class="page-header"><i class="fa fa-clipboard"></i>TEACHER COURSES EXAMS</h3>
   <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="{{ route('teacherdashboard') }}">Home</a></li>
    <li><i class="fa fa-book"></i>COURSES</li>
    <li><i class="fa fa-clipboard"></i>TEACHER COURSES EXAMS</li>
  </ol>
</div>
</div>

<div class="row">
  <div class="col-lg-12" >
    <section class="panel">
      <span id="sucess"></span>
      <header class="panel-heading">
        TEACHER COURSES EXAMS
      </header>
      <div id="re">
        <table class="table table-striped table-advance table-hover" id="rows">
         <tbody>
          <tr>
           <th><i class="icon_profile"></i> ID</th>
           <th><i class="fa fa-clipboard"></i> NAME</th>
           <th><i class="fa fa-book"></i> COURSE NAME</th>
           <th><i class="icon_desktop"></i> CLASS NAME</th>
           <th><i class="fa fa-list-alt"></i> RESULT</th>
           

         </tr>
         @foreach ($teacher->teachercourses as $course)
         @foreach ($course->course->exams as $exam)


         <tr>
           <td >{{$exam->exam_id}}</td>
           <td>{{$exam->exam_name}}</td>
           <td>{{$exam->course->course_name}}</td>
           <td>{{$course->class->class_name}}</td>
           <td>
                  
                  <a class="btn btn-primary view-btn"  data-eid="{{$exam->exam_id}}" data-clid="{{$course->class->class_id}}" data-cid="{{$exam->course->course_id}}" title="VIEW EXAM RESULT"><i class="fa fa-eye"></i>VIEW</a>
              </td>
         </tr>
         @endforeach  
         @endforeach                 
       </tbody>
     </table>
   </div>
 </section>
</div>
</div>
<form action="{{ route('viewteacherexamresult') }}" method="post" id="form-postupdate">
      {{csrf_field()}}
      <input type="hidden" name="exam_id" id="exam_id">
      
      <input type="hidden" name="class_id" id="class_id">
      <input type="hidden" name="course_id" id="course_id">


    </form>



@endsection


@section('script')

<script type="text/javascript">
  
  $(".table tr").each(function(index, val) {
  $(this).find('.view-btn').each(function(index, val) {
    $(this).click(function(event) {
        var exam_id=$(this).data('eid');
        var class_id=$(this).data('clid');
        var course_id=$(this).data('cid');
        //alert(exam_id+"  "+class_id);
        $("#course_id").val(course_id);
        $("#exam_id").val(exam_id);
        $("#class_id").val(class_id);
        $("#form-postupdate").submit();




      });

    });

  });




</script>



@endsection