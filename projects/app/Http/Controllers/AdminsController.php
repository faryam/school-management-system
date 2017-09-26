<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\User;
use Validator;

class AdminsController extends Controller
{
  use AuthenticatesUsers;
  public function __construct()
  {
     $this->middleware('web');
 }


 public function allAdmins()
 {
     $admins=User::where('role_name','admin')->get();
     return view('Layouts.Admins.alladmins',compact('admins'));
 }


 public function addAdmin()
 {

     return view('Layouts.Admins.addadmin');
 }


public function validateName(Request $request)
{
    $rule=[ 'name'=>'unique:users'];

    $msg=['name.unique'=>'Username is already taken'];
    $validate=Validator::make($request->all(),$rule,$msg);

    if($validate->fail())
    {
        return response($validate->errors,401);
    }

}


 public function storeAdmin(Request $request)
 {
    try
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
        return $user->id;
    }
    catch(Exception $e)
    {
        return $e->errors();

    }
}


public function deleteAdmin(Request $request)
{
    User::where('id',$request->id)->delete();
    return $request->all();
}
}
