<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Classroom;
use App\Course;
use App\Students_attendence;
use App\Student_course;
use App\Course_teacher;
use App\Student_exam_grade;
use App\Exam_class;

class ClassesController extends Controller
{
   use AuthenticatesUsers;
   public function __construct()
   {
     $this->middleware('web');
 }


 public function allClasses()
 {
    $classrooms=Classroom::all();
       // return $classrooms;
    return view('Layouts.Classes.allclasses',compact('classrooms'));
}


public function addClass()
{
    $courses=Course::all();
    return view('Layouts.Classes.addclass',compact('courses'));
}

public function seacrchCourse(Request $request)
{

    if($request->input=="")
    {
        return $courses=Course::all();
    }
    else
    {
        return $courses=Course::where('course_name','LIKE','%'.$request->input.'%')->get();

    }
}


public function storeClass(Request $request)
{

    $this->validate($request,[
        'class_name'=>'unique:classrooms'
    ]);

    $classroom=new Classroom;
    $classroom->class_name=$request->classname;
    $classroom->class_section=$request->section;
    $classroom->class_date=$request->date;
    $classroom->class_time=$request->time;
    $classroom->course_id=$request->course_id;
    $classroom->save();
    return $classroom->class_id;

}

public function findClassroom(Request $request)
{
  $classroom=Classroom::find($request->id);
  $courses=Course::all();
  return view('Layouts.Classes.updateclass',compact('classroom','courses'));
}

public function storeupdateClass(Request $request)
{
 $classroom=Classroom::find($request->class_id);
 if ($classroom->class_name!=$request->classname) 
 {
     $this->validate($request,[
        'class_name'=>'unique:classrooms'
    ]);
 }


 $classroom->class_name=$request->classname;
 $classroom->class_section=$request->section;
 $classroom->class_date=$request->date;
 $classroom->class_time=$request->time;
 $classroom->course_id=$request->course_id;
 $classroom->save();

 Students_attendence::where('class_id', $request->class_id)->update(['course_id' => $request->course_id]); 
 Course_teacher::where('class_id', $request->class_id)->update(['course_id' => $request->course_id]); 
 Student_course::where('class_id', $request->class_id)->update(['course_id' => $request->course_id]); 


 return $classroom->class_id;

}

public function deleteClass(Request $request)
{
    Student_exam_grade::where('class_id', $request->class_id)->delete();
    Exam_class::where('class_id',$request->class_id)->delete();
    Course_teacher::where('class_id', $request->class_id)->delete();
    Student_course::where('class_id', $request->class_id)->delete();
    Students_attendence::where('class_id', $request->class_id)->delete();
    Classroom::where('class_id', $request->class_id)->delete();
    return $request->all();
}


public function classattdentenceSheets(Request $request)
{

    
    $attdentencedates=Students_attendence::where('class_id',$request->class_id)->where('course_id',$request->course_id)->distinct()->get(['attendence_date']);
    $classroom=Classroom::find($request->class_id);


    return view('Layouts.Classes.classattdentencesheets',compact('attdentencedates','classroom'));


}

public function classteacherattdentenceSheets(Request $request)
{

    $attdentencedates=Students_attendence::where('class_id',$request->class_id)->where('course_id',$request->course_id)->distinct()->get(['attendence_date']);
    $classroom=Classroom::find($request->class_id);


    return view('Layouts.Classes.classteacherattendencesheets',compact('attdentencedates','classroom'));


}


public function addclassattdentenceSheet(Request $request)
{

    $students=Student_course::where('class_id',$request->class_id)->where('course_id',$request->course_id)->get();
    return view('Layouts.Classes.addclassattdentencesheet',compact('students'));


}

public function addclassteacherattdentenceSheet(Request $request)
{

    $students=Student_course::where('class_id',$request->class_id)->where('course_id',$request->course_id)->get();
    return view('Layouts.Classes.addclassteacherattendencesheet',compact('students'));


}

public function classattdentenceSheet(Request $request)
{

    $attendencesheets=Students_attendence::where('class_id',$request->class_id)->where('course_id',$request->course_id)->where('attendence_date',$request->date)->get();
    return view('Layouts.Classes.classattendencesheet',compact('attendencesheets'));


}

public function classteacherattdentenceSheet(Request $request)
{

    $attendencesheets=Students_attendence::where('class_id',$request->class_id)->where('course_id',$request->course_id)->where('attendence_date',$request->date)->get();
    return view('Layouts.Classes.classteacherattendencesheet',compact('attendencesheets'));


}


public function addattendenceSheet(Request $request)
{

    $students_attendence=new Students_attendence;
    $students_attendence->course_id=$request->course_id;   
    $students_attendence->class_id=$request->class_id;
    $students_attendence->student_id=$request->student_id;
    $students_attendence->attendence_status=$request->status;
    $students_attendence->attendence_date=$request->date;
    $students_attendence->save();
    return $students_attendence->student_attendence_id;   
}


public function updateattendenceSheet(Request $request)
{
    Students_attendence::where('student_id', $request->student_id)
    ->where('course_id', $request->course_id)->where('class_id', $request->class_id)->where('attendence_date', $request->date)->update(['attendence_status' => $request->status]);   
}
}
