<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Exam;
use App\Course;
use App\Exam_class;
use App\Student_course;
use App\Student_exam_grade;


class ExamsController extends Controller
{
     use AuthenticatesUsers;
    public function __construct()
    {
    	$this->middleware('web');
    }


    public function allExams()
    {
        $exams=Exam::all();
    	return view('Layouts.Exams.allexams',compact('exams'));
    }


     public function addExam()
    {
        $courses=Course::all();
    	return view('Layouts.Exams.addexam',compact('courses'));
    }

     public function storeExam(Request $request)
    {
        
            $this->validate($request,[
                'exam_name'=>'unique:exams'
            ]);

            $exam=new Exam;
            $exam->exam_name=$request->exam_name;
            $exam->exam_description=$request->desc;
            $exam->course_id=$request->course_id;
            $exam->save();
            return $exam->exam_id;
        
    }


    public function examResults()
    {
        $exam_classes=Exam_class::all();
        $exams=Exam::all();
        return view('Layouts.Exams.examresults',compact('exam_classes','exams'));

    }


    public function storeexamResult(Request $request)
    {
        $students=Student_course::where('class_id',$request->class_id)->get();
        $exam=Exam::find($request->exam_id);
         return view('Layouts.Exams.addexamresult',compact('students','exam'));
    }


    public function viewexamResult(Request $request)
    {
        $student_exam_grade=Student_exam_grade::where('exam_id', $request->exam_id)->where('class_id', $request->class_id)->get();
         return view('Layouts.Exams.viewexamresult',compact('student_exam_grade'));
    }


    public function addexamresultClass(Request $request)
    {
        $exam_class=new Exam_class;
        $exam_class->exam_id=$request->exam_id;   
        $exam_class->class_id=$request->class_id;
        $exam_class->save();
        return $exam_class->exam_class_id;   
    }


    public function addexamResult(Request $request)
    {
        $student_exam_grade=new Student_exam_grade;
        $student_exam_grade->exam_id=$request->exam_id;   
        $student_exam_grade->class_id=$request->class_id;
        $student_exam_grade->student_id=$request->student_id;
        $student_exam_grade->exam_grade=$request->grade;
        $student_exam_grade->save();
        return $student_exam_grade->student_exam_grade_id;   
    }


    public function updateexamResult(Request $request)
    {
        Student_exam_grade::where('student_id', $request->student_id)
          ->where('exam_id', $request->exam_id)->where('class_id', $request->class_id)
          ->update(['exam_grade' => $request->grade]);   
    }
}
