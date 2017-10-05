<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Course;
use App\Course_teacher;
use App\Student_course;
use App\Students_attendence;
use App\Classroom;
use App\Exam;

class CoursesController extends Controller
{

	use AuthenticatesUsers;
    public function __construct()
    {
    	$this->middleware('web');
    }


    public function allCourses()
    {
        $courses=Course::all();
        return view('Layouts.Courses.allcourses',compact('courses'));
    }


    public function addCourse()
    {
    	return view('Layouts.Courses.addcourse');
    }


    public function findCourse(Request $request)
    {
      $course=Course::find($request->id);
      return view('Layouts.Courses.updatecourse',compact('course'));
  }


  public function storeCourse(Request $request)
  {

    $this->validate($request,[
        'course_name'=>'unique:courses'
    ]);

    $course=new Course;
    $course->course_name=$request->course_name;
    $course->course_description=$request->desc;
    $course->save();
    return $course->course_id;

}
public function storeupdateCourse(Request $request)
{
    $course=Course::find($request->course_id);
    if ($course->course_name!=$request->course_name)
    {
        $this->validate($request,[
            'course_name'=>'unique:courses'
        ]);
        
    }
    
    $course->course_name=$request->course_name;
    $course->course_description=$request->desc;
    $course->save();
    return $course->course_id;

}

public function deleteCourse(Request $request)
{
    Exam::where('course_id', $request->course_id)->update(['course_id' => 0]);
    Classroom::where('course_id', $request->course_id)->update(['course_id' => 0]);
    Course_teacher::where('course_id', $request->course_id)->delete();
    Student_course::where('course_id', $request->course_id)->delete();
    Students_attendence::where('course_id', $request->course_id)->delete();
    Course::where('course_id',$request->course_id)->delete();
    return $request->all();
}


}
