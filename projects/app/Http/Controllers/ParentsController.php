<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\ParentModel;
use App\User;


class ParentsController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {
    	$this->middleware('web');
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

     public function showparentChildren()
    {

        
        $parent=ParentModel::where('user_id',Auth::guard('web')->user()->id)->get();
        return view('Layouts.Students.parentchild',compact('parent'));


    }


     public function showparentchildrenClasses()
    {

        
        $parent=ParentModel::where('user_id',Auth::guard('web')->user()->id)->get();
        return view('Layouts.Classes.parentchildclasses',compact('parent'));


    }

     



}
