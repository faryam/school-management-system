<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Classroom;
use App\Course;

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
}
