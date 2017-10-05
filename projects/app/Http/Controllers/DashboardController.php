<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Finance;
use App\Fee;
use App\Fee_student;
use App\Student;
use App\ParentModel;
use App\Course;
use App\Teacher;
use App\User;
use App\Exam;
use App\Classroom;
use App\Course_teacher;
use App\Student_course;

class DashboardController extends Controller
{

	use AuthenticatesUsers;
    public function __construct()
    {
    	$this->middleware('web');
    }


    public function dashboard()
    {
        $students=count(Student::all());
        $teachers=count(Teacher::all());
        $courses=count(Course::all());
        $classes=count(Classroom::all());
        $revenue=0;
        $finances=Finance::where('finance_status',"received")->get();
        foreach ($finances as $finance) {
            $revenue=$revenue+$finance->finance_amount;
        }
        $expense=0;
        $finances=Finance::where('finance_status',"paid")->get();
        foreach ($finances as $finance) {
            $expense=$expense+$finance->finance_amount;
        }

        return view('Layouts.Admins.adminhome',compact('students','teachers','courses','classes','revenue','expense'));
    }



    public function studentdashboard()
    {
        $student=Student::where('user_id',Auth::guard('web')->user()->id)->first();
        $courses=count(Student_course::where('student_id',$student->student_id)->distinct()->get(['course_id']));
        $classes=count(Student_course::where('student_id',$student->student_id)->get());
        return view('Layouts.Students.studenthome',compact('student','courses','classes'));
    }



    public function teacherdashboard()
    {
        $teacher=Teacher::where('user_id',Auth::guard('web')->user()->id)->first();
        $courses=count(Course_teacher::where('teacher_id',$teacher->teacher_id)->distinct()->get(['course_id']));
        $classes=count(Course_teacher::where('teacher_id',$teacher->teacher_id)->get());

        return view('Layouts.Teachers.teacherhome',compact('teacher','courses','classes'));
    }


    public function parentdashboard()
    {
       $parent=ParentModel::where('user_id',Auth::guard('web')->user()->id)->first();
       $courses=count(Course::all());
       $teachers=count(Teacher::all());
       $students=count(Student::where('parent_id',$parent->parent_id)->get());
       $fees=count(Fee::all());
       return view('Layouts.Parents.parenthome',compact('students','courses','teachers','fees','parent'));
   }
}
