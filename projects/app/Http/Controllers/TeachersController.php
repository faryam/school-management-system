<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;
use App\Teacher;
use Carbon\Carbon;
use App\Course_teacher;
use App\Course;

class TeachersController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {
    	$this->middleware('web');
    }

    public function teacherProfile(Request $request)
 {
    $teacher=Teacher::where('user_id',$request->id)->first();
    return view('Layouts.Teachers.teacherprofile',compact('teacher'));
 }


    public function allTeachers()
    {
       $teachers=Teacher::all();
       return view('Layouts.Teachers.allteachers',compact('teachers'));
   }


   public function addTeacher()
   {
       return view('Layouts.Teachers.addteacher');
   }



   public function findTeacher(Request $request)
   {
      $teacher=Teacher::find($request->id);
      return view('Layouts.Teachers.updateteacher',compact('teacher'));
  }

  public function restpasswordTeacher(Request $request)
  {
      $student=User::find($request->id);
      $student->password=bcrypt('abcde');
      $student->save();
  }

  public function storeTeacher(Request $request)
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

    $teacher=new Teacher;
    $teacher->teacher_first_name=$request->first_name;
    $teacher->teacher_last_name=$request->last_name;
    $teacher->teacher_sex=$request->sex;
    $teacher->teacher_dob=$request->dob;
    $teacher->teacher_phone_number=$request->phone_number;
    $teacher->teacher_address=$request->address;
    $teacher->teacher_join_at=Carbon::now()->format('Y-m-d H:i:s');
    $teacher->user_id=$user->id;
    $teacher->save();
    return $teacher->teacher_id;
}

public function storeupdateTeacher(Request $request)
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

    $teacher=Teacher::find($request->teacher_id);
    $teacher->teacher_first_name=$request->first_name;
    $teacher->teacher_last_name=$request->last_name;
    $teacher->teacher_sex=$request->sex;
    $teacher->teacher_dob=$request->dob;
    $teacher->teacher_phone_number=$request->phone_number;
    $teacher->teacher_address=$request->address;
    $teacher->save();
    return $teacher->teacher_id;
}
public function updateinfoTeacher(Request $request)
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

    $teacher=Teacher::find($request->teacher_id);
    $teacher->teacher_first_name=$request->first_name;
    $teacher->teacher_last_name=$request->last_name;
    $teacher->teacher_sex=$request->sex;
    $teacher->teacher_dob=$request->dob;
    $teacher->teacher_phone_number=$request->phone_number;
    $teacher->teacher_address=$request->address;
    $teacher->save();
    return $teacher->teacher_id;
}

public function teacherpasswordChange(Request $request)
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

public function deleteTeacher(Request $request)
{
    $id=Teacher::find($request->teacher_id)->user_id;
    Course_teacher::where('teacher_id',$request->teacher_id)->delete();
    Teacher::where('teacher_id',$request->teacher_id)->delete();
    User::where('id',$id)->delete();
    return $request->all();
}


public function teacherCourses(Request $request)
{
    $teacher_courses=Course_teacher::where('teacher_id',$request->id)->get();
    $teacher_id=$request->id;
    $courses=Course::all();
    return view('Layouts.Teachers.teachercourses',compact('teacher_courses','courses','teacher_id'));
}

public function addteacherCourse(Request $request)
{
    $teacher_courses=Course_teacher::where(['teacher_id'=>$request->teacher_id,'course_id'=>$request->course_id,'class_id'=>$request->class_id])->get();
    if(count($teacher_courses)==0)
    {
        $teacher_course=new Course_teacher;
        $teacher_course->teacher_id=$request->teacher_id;
        $teacher_course->course_id=$request->course_id;
        $teacher_course->class_id=$request->class_id;
        $teacher_course->save();
        return $teacher_course->course_teacher_id;
    }
    else
        return "false";

}


public function showteacherClasses()
{


    $teacher=Teacher::where('user_id',Auth::guard('web')->user()->id)->first();
    return view('Layouts.Classes.teacherclasses',compact('teacher'));


}


public function showteacherCourses()
{


    $teacher=Teacher::where('user_id',Auth::guard('web')->user()->id)->first();
    return view('Layouts.Courses.teachercourses',compact('teacher'));


}

public function showteachercoursesStudent()
{


    $teacher=Teacher::where('user_id',Auth::guard('web')->user()->id)->first();
    return view('Layouts.Students.teachercoursestudents',compact('teacher'));


}


public function showteachercoursesExams()
{


    $teacher=Teacher::where('user_id',Auth::guard('web')->user()->id)->first();
    return view('Layouts.Exams.teachercoursesexams',compact('teacher'));


}


}
