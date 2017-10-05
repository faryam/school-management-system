<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Student;
use App\ParentModel;
use App\User;
use App\Student_course;
use App\Course;
use App\Student_exam_grade;
use App\Students_attendence;


class StudentsController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {
    	$this->middleware('web');
    }

    public function studentProfile(Request $request)
    {
       $student=Student::where('user_id',$request->id)->first();
       return view('Layouts.Students.studentprofile',compact('student'));
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


public function findStudent(Request $request)
{
    
  $student=Student::find($request->id);
  $parents=ParentModel::all();
  return view('Layouts.Students.updatestudent',compact('student','parents'));
}

public function restpasswordStudent(Request $request)
{
  $student=User::find($request->id);
  $student->password=bcrypt('abcde');
  $student->save();
}

public function storeupdateStudent(Request $request)
{
    $user=User::find($request->id);
    if($user->name!=$request->name)
    {
        $this->validate($request,[
            'name'=>'unique:users'
        ]);
    }
    $user->name=$request->name;
    $user->email=$request->email;
    $user->save();

    $student=Student::find($request->student_id);
    $student->student_first_name=$request->first_name;
    $student->student_last_name=$request->last_name;
    $student->student_sex=$request->sex;
    $student->student_dob=$request->dob;
    $student->student_phone_number=$request->phone_number;
    $student->student_address=$request->address;
    $student->parent_id=$request->parentid;
    $student->save();
    return $student->student_id;
}

public function updateinfoStudent(Request $request)
{
    $user=User::find($request->id);
    if($user->name!=$request->name)
    {
        $this->validate($request,[
            'name'=>'unique:users'
        ]);
    }
    $user->name=$request->name;
    $user->email=$request->email;
    $user->save();

    $student=Student::find($request->student_id);
    $student->student_first_name=$request->first_name;
    $student->student_last_name=$request->last_name;
    $student->student_sex=$request->sex;
    $student->student_dob=$request->dob;
    $student->student_phone_number=$request->phone_number;
    $student->student_address=$request->address;;
    $student->save();
    return $student->student_id;
}


public function studentpasswordChange(Request $request)
{
    $user=User::find($request->id);
    if(Hash::check($request->old_password, $user->password)) 
        {
            $user->password=bcrypt($request->password);
            $user->save();
            return "true";
        }
        else
            return "false";
    }


    public function deleteStudent(Request $request)
    {
        $id=Student::find($request->student_id)->user_id;
        Student_exam_grade::where('student_id', $request->student_id)->delete();
        Student_course::where('student_id', $request->student_id)->delete();
        Students_attendence::where('student_id', $request->student_id)->delete();
        Student::where('student_id', $request->student_id)->delete();
        User::where('id',$id)->delete();
        return $request->all();
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


    public function showstudentCourses()
    {


        $student=Student::where('user_id',Auth::guard('web')->user()->id)->first();
        return view('Layouts.Courses.studentcourses',compact('student'));


    }

    public function showstudentClasses()
    {


        $student=Student::where('user_id',Auth::guard('web')->user()->id)->first();
        return view('Layouts.Classes.studentClasses',compact('student'));


    }

    public function showstudentExams()
    {


        $student=Student::where('user_id',Auth::guard('web')->user()->id)->first();
        return view('Layouts.Exams.studentexams',compact('student'));


    }

    public function showstudentTeachers()
    {


        $student=Student::where('user_id',Auth::guard('web')->user()->id)->first();
        return view('Layouts.Teachers.studentteachers',compact('student'));


    }


    public function showstudentResults()
    {


        $student=Student::where('user_id',Auth::guard('web')->user()->id)->first();
        return view('Layouts.Exams.studentexamresults',compact('student'));


    }


    public function showstudentAttendence()
    {


        $student=Student::where('user_id',Auth::guard('web')->user()->id)->first();
        return view('Layouts.Students.studentattendence',compact('student'));


    }

    public function showstudentFee()
    {


        $student=Student::where('user_id',Auth::guard('web')->user()->id)->first();
        return view('Layouts.Students.studentfee',compact('student'));


    }
}
