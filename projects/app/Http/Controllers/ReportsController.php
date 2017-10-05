<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
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


class ReportsController extends Controller
{
    use AuthenticatesUsers;
   public function __construct()
   {
       $this->middleware('web');
   }


   public function financeReport(Request $request)
   {
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

   		return view('Layouts.Reports.financereport',compact('revenue','expense'));

   }

   public function webReport(Request $request)
   {

   		$students=count(Student::all());
   		$teachers=count(Teacher::all());
   		$parents=count(ParentModel::all());
   		$courses=count(Course::all());
   		$exams=count(Exam::all());
   		$classes=count(Classroom::all());
   		$fees=count(Fee::all());
         $finances=count(Finance::all());
   		$admins=count(User::where('role_name',"admin")->get());
   		return view('Layouts.Reports.webreport',compact('students','teachers','parents','courses','exams','classes','fees','admins','finances'));
   }
}


