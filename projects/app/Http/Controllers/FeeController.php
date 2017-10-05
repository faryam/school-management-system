<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use App\Fee;
use App\Student;
use App\Fee_student;


class FeeController extends Controller
{
    use AuthenticatesUsers;
   public function __construct()
   {
       $this->middleware('web');
   }

   public function allfees()
    {
        $fees=Fee::all();
        return view('Layouts.Fees.allfees',compact('fees'));
    }


    public function addFee()
    {
    	return view('Layouts.Fees.addfee');
    }


    public function findFee(Request $request)
    {
      $fee=Fee::find($request->id);
      return view('Layouts.Fees.updatefee',compact('fee'));
  }


  public function storeFee(Request $request)
  {

    $fee=new Fee;
    $fee->fee_name=$request->fee_name;
    $fee->fee_amount=$request->amount;
    $fee->fee_duedate=$request->duedate;
    $fee->fee_details=$request->desc;
    $fee->save();

    $students=Student::all();
    foreach ($students as $student) {
    	$fee_student=new Fee_student;
    	$fee_student->fee_id=$fee->fee_id;
    	$fee_student->student_id=$student->student_id;
    	$fee_student->fee_status="unpaid";
    	$fee_student->save();
    }
    return $fee->fee_id;

}
public function storeupdateFee(Request $request)
{
    $fee=Fee::find($request->fee_id);
    $fee->fee_name=$request->fee_name;
    $fee->fee_amount=$request->amount;
    $fee->fee_duedate=$request->duedate;
    $fee->fee_details=$request->desc;
    $fee->save();
    return $fee->fee_id;

}

public function deleteFee(Request $request)
{
    
    Fee_student::where('fee_id', $request->fee_id)->delete();
    Fee::where('fee_id',$request->fee_id)->delete();
    return $request->all();
}

public function feestudentStatus(Request $request)
{
	
    $feestudents=Fee_student::where('fee_id',$request->fee_id)->get();
    return view('Layouts.Fees.feestudentstatus',compact('feestudents'));


}

public function updatefeestudentStatus(Request $request)
{
    Fee_student::where('student_id', $request->student_id)
    ->where('fee_id', $request->fee_id)->update(['fee_status' => $request->status]);   
}



}
