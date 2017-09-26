<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class DashboardController extends Controller
{

	use AuthenticatesUsers;
    public function __construct()
    {
    	$this->middleware('web');
    }


    public function dashboard()
    {
    	
    	return view('Layouts.Dashboard.admindashboard');
    }



    public function studentdashboard()
    {
    	return view('Layouts.Dashboard.studentdashboard');
    }



    public function teacherdashboard()
    {
    	return view('Layouts.Dashboard.teacherdashboard');
    }


    public function parentdashboard()
    {
    	return view('Layouts.Dashboard.parentdashboard');
    }
}
