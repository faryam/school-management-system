<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Course;

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
}
