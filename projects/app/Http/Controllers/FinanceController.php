<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Carbon\Carbon;
use App\Finance;

class FinanceController extends Controller
{
    use AuthenticatesUsers;
   public function __construct()
   {
       $this->middleware('web');
   }

   public function allFinances()
    {
        $finances=Finance::all();
        return view('Layouts.Finances.allfinances',compact('finances'));
    }


    public function addFinance()
    {
    	return view('Layouts.Finances.addfinance');
    }


    public function findFinance(Request $request)
    {
      $finance=Finance::find($request->id);
      return view('Layouts.Finances.updatefinance',compact('finance'));
  }


  public function storeFinance(Request $request)
  {

    $finance=new Finance;
    $finance->finance_name=$request->finance_name;
    $finance->finance_amount=$request->amount;
    $finance->finance_status=$request->status;
    $finance->finance_time=Carbon::now()->format('Y-m-d H:i:s');
    $finance->save();

    return $finance->finance_id;

}
public function storeupdateFinance(Request $request)
{
    $finance=Finance::find($request->finance_id);
    $finance->finance_name=$request->finance_name;
    $finance->finance_amount=$request->amount;
    $finance->finance_status=$request->status;
    $finance->save();
    return $finance->finance_id;

}

public function deleteFinance(Request $request)
{
    
    Finance::where('finance_id',$request->finance_id)->delete();
    return $request->all();
}

}
