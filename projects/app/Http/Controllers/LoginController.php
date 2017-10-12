<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
 use AuthenticatesUsers;

 protected $name='name';
 protected $redirectTo = '/dashboard';
 protected $guard='web';
 private $redirect='dashboard';


 public function getlogin()
 {
   if (Auth::guard('web')->check())
     {
      if(Auth::guard('web')->user()->role_name=='admin')
        return redirect()->route('dashboard');
        elseif(Auth::guard('web')->user()->role_name=='student')
          return redirect()->route('studentdashboard');
          elseif(Auth::guard('web')->user()->role_name=='teacher')
            return redirect()->route('teacherdashboard');
            elseif(Auth::guard('web')->user()->role_name=='parent')
              return redirect()->route('parentdashboard');
            }

            return view('login');
          }

          public function postLogin(Request $request)
          {

           $auth=Auth::guard('web')->attempt(['name'=>$request->username,'password'=>$request->password,'role_name'=>'admin']);
           $auth1=Auth::guard('web')->attempt(['name'=>$request->username,'password'=>$request->password,'role_name'=>'student']);
           $auth2=Auth::guard('web')->attempt(['name'=>$request->username,'password'=>$request->password,'role_name'=>'teacher']);
           $auth3=Auth::guard('web')->attempt(['name'=>$request->username,'password'=>$request->password,'role_name'=>'parent']);



           if($auth)
           {
            return "true";
            //return redirect()->route('dashboard');

          }
          else if ($auth1) {
           // $redirectTo='/studentdashboard';
            //$redirect='studentdashboard';
             return "true";
            //return redirect()->route('studentdashboard');
          }
          elseif ($auth2) {
            //$redirectTo='/teacherdashboard';
            //$redirect='teacherdashboard';
             return "true";
            //return redirect()->route('teacherdashboard');
          }
          elseif ($auth3) {
            //$redirectTo='/parentdashboard';
            //$redirectTo='parentdashboard';
             return "true";
            //return redirect()->route('parentdashboard');
          }
          else
            return "false";
        }

        


        public function getLogout()
        {
         Auth::guard('web')->logout();
         return redirect()->route('/');
       }
     }
