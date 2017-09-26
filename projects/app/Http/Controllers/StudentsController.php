<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Student;
use App\ParentModel;
use App\User;
use App\Student_course;
use App\Course;

class StudentsController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {
    	$this->middleware('web');
    }


    public function allStudents()
    {
        $students=Student::all();
    	return view('Layouts.Students.allstudents',compact('students'));
    }


     public function addStudent()
    {
        $parents=ParentModel::all();
    	return view('Layouts.Students.addstudent',compact('parents'));
    }

    public function seacrchParent(Request $request)
    {
        
            if($request->input=="")
            {
                return $parents=ParentModel::all();
            }
            else
            {
                return $parents=ParentModel::where('parent_first_name','LIKE','%'.$request->input.'%')->get();

            }
    }


     public function storeStudent(Request $request)
    {
        
            $this->validate($request,[
                'name'=>'unique:users'
            ]);
            $user=new User;
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=bcrypt($request->password);
            $user->role_name=$request->role_name;
            $user->remember_token=str_random(10);
            $user->save();
           
            $student=new Student;
            $student->student_first_name=$request->first_name;
            $student->student_last_name=$request->last_name;
            $student->student_sex=$request->sex;
            $student->student_dob=$request->dob;
            $student->student_phone_number=$request->phone_number;
            $student->student_address=$request->address;
            $student->user_id=$user->id;
            $student->parent_id=$request->parentid;
            $student->save();
            return $student->student_id;
    }


    public function studentCourses(Request $request)
    {
        $student_courses=Student_course::where('student_id',$request->id)->get();
        $student_id=$request->id;
        $courses=Course::all();
        return view('Layouts.Students.studentcourses',compact('student_courses','courses','student_id'));
    }


    public function addstudentCourse(Request $request)
    {
        $student_courses=Student_course::where(['student_id'=>$request->student_id,'course_id'=>$request->course_id,'class_id'=>$request->class_id])->get();
        if(count($student_courses)==0)
        {
            $student_course=new Student_course;
            $student_course->student_id=$request->student_id;
            $student_course->course_id=$request->course_id;
            $student_course->class_id=$request->class_id;
            $student_course->save();
            return $student_course->student_course_id;
        }
        else
            return "false";
        
    }
}
