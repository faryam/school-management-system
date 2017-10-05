<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\ParentModel;
use App\User;
use App\Course;
use App\Teacher;
use App\Student;
use App\Fee_Student;


class ParentsController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {
    	$this->middleware('web');
    }

    public function parentProfile(Request $request)
 {
   $parent=ParentModel::where('user_id',$request->id)->first();
   return view('Layouts.Parents.parentprofile',compact('parent'));
 }

    public function allParents()
    {   
        $parents=ParentModel::all();
    	return view('Layouts.Parents.allparents',compact('parents'));
    }


     public function addParent()
    {
    	return view('Layouts.Parents.addparent');
    }


     public function storeParent(Request $request)
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
           
            $parent=new ParentModel;
            $parent->parent_first_name=$request->first_name;
            $parent->parent_last_name=$request->last_name;
            $parent->parent_sex=$request->sex;
            $parent->parent_dob=$request->dob;
            $parent->parent_phone_number=$request->phone_number;
            $parent->parent_address=$request->address;
            $parent->user_id=$user->id;
            $parent->save();
            return $parent->parent_id;
    }

    public function findParent(Request $request)
   {
      $parent=ParentModel::find($request->id);
      return view('Layouts.Parents.updateparent',compact('parent'));
  }

  public function restpasswordParent(Request $request)
  {
      $student=User::find($request->id);
      $student->password=bcrypt('abcde');
      $student->save();
  }

  public function storeupdateParent(Request $request)
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

    $parent=ParentModel::find($request->parent_id);
    $parent->parent_first_name=$request->first_name;
    $parent->parent_last_name=$request->last_name;
    $parent->parent_sex=$request->sex;
    $parent->parent_dob=$request->dob;
    $parent->parent_phone_number=$request->phone_number;
    $parent->parent_address=$request->address;
    $parent->save();
    return $parent->parent_id;
}

public function updateinfoParent(Request $request)
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
    
    $parent=ParentModel::find($request->parent_id);
    $parent->parent_first_name=$request->first_name;
    $parent->parent_last_name=$request->last_name;
    $parent->parent_sex=$request->sex;
    $parent->parent_dob=$request->dob;
    $parent->parent_phone_number=$request->phone_number;
    $parent->parent_address=$request->address;
    $parent->save();
    return $parent->parent_id;
}

public function parentpasswordChange(Request $request)
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


public function deleteParent(Request $request)
{
    $id=ParentModel::find($request->parent_id)->user_id;
    Student::where('parent_id', $request->parent_id)->update(['parent_id' => 0]); 
    ParentModel::where('parent_id',$request->parent_id)->delete();
    User::where('id',$id)->delete();
    return $request->all();
}

     public function showparentChildren()
    {

        $parent=ParentModel::where('user_id',Auth::guard('web')->user()->id)->first();
        return view('Layouts.Students.parentchild',compact('parent'));
    }


     public function showparentchildrenClasses()
    {

        $parent=ParentModel::where('user_id',Auth::guard('web')->user()->id)->first();
        return view('Layouts.Classes.parentchildclasses',compact('parent'));
    }



    public function showparentallCourses()
    {
        $courses=Course::all();
        return view('Layouts.Courses.parentallcourses',compact('courses'));
    }

    public function showparentallTeachers()
    {
        $teachers=Teacher::all();
        return view('Layouts.Teachers.parentallteachers',compact('teachers'));
    }


     public function showparentchildrenCourses()
    {
        
        $parent=ParentModel::where('user_id',Auth::guard('web')->user()->id)->first();
        return view('Layouts.Courses.parentchildrencourses',compact('parent'));
    }


    public function showparentchildrenTeachers()
    {

        $parent=ParentModel::where('user_id',Auth::guard('web')->user()->id)->first();
        return view('Layouts.Teachers.parentchildrenteachers',compact('parent'));
    }


    public function showparentchildrenExams()
    {

        $parent=ParentModel::where('user_id',Auth::guard('web')->user()->id)->first();
        return view('Layouts.Exams.parentchildrenexams',compact('parent'));
    }

    public function showparentchildrenFee()
    {

        $parent=ParentModel::where('user_id',Auth::guard('web')->user()->id)->first();
        return view('Layouts.Fees.parentchildrenfees',compact('parent'));
    }


    public function showparentchildrenexamReults()
    {
        $parent=ParentModel::where('user_id',Auth::guard('web')->user()->id)->first();
        return view('Layouts.Exams.parentchildrenexamresults',compact('parent'));
    }

     public function showparentchildrenAttendence()
    {
        $parent=ParentModel::where('user_id',Auth::guard('web')->user()->id)->first();
        return view('Layouts.Parents.parentchildrenattencence',compact('parent'));
    }


    public function parentstudentpayFee(Request $request)
    {
        Fee_Student::where('student_id', $request->student_id)
    ->where('fee_id', $request->fee_id)->update(['fee_status' => "paid"]); 
    }
     



}
