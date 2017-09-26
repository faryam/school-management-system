<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',['as'=>'/','uses'=>'LoginController@getLogin']);

Route::post('/dashboard',['as'=>'login','uses'=>'LoginController@postLogin']);

Route::get('/nopermisson',function()
	{
		return view('Layouts.Nopermisson.nopermission');
	});


Route::group(['middleware'=>['authen']],function(){
	Route::get('/logout',['as'=>'logout','uses'=>'LoginController@getLogout']);
	
});

Route::group(['middleware'=>['authen','roles:admin']],function(){
	
	Route::get('/dashboard',['as'=>'dashboard','uses'=>'DashboardController@dashboard']);
	
	Route::get('/courses',['as'=>'courses','uses'=>'CoursesController@allCourses']);
	Route::get('/courses/addcourse',['as'=>'addcourse','uses'=>'CoursesController@addCourse']);
	Route::post('/courses/addcourse/newcourse',['as'=>'storecourse','uses'=>'CoursesController@storeCourse']);

	Route::get('/students',['as'=>'students','uses'=>'StudentsController@allStudents']);
	Route::get('/students/addstudent',['as'=>'addstudent','uses'=>'StudentsController@addStudent']);
	Route::post('/students/addstudent/newstudent',['as'=>'storestudent','uses'=>'StudentsController@storeStudent']);
	Route::post('/students/addstudent/searchparent',['as'=>'searchparent','uses'=>'StudentsController@seacrchParent']);
	Route::post('/students/studentcourses',['as'=>'studentcourses','uses'=>'StudentsController@studentCourses']);
	Route::post('/students/studentcourses/addstudentcourse',['as'=>'addstudentcourse','uses'=>'StudentsController@addstudentCourse']);

	Route::get('/classes',['as'=>'classes','uses'=>'ClassesController@allClasses']);
	Route::get('/classes/addclass',['as'=>'addclass','uses'=>'ClassesController@addClass']);
	Route::post('/classes/addclass/newclass',['as'=>'storeclass','uses'=>'ClassesController@storeClass']);
	Route::post('/classes/addclass/searchcourse',['as'=>'searchcourse','uses'=>'ClassesController@seacrchCourse']);

	Route::get('/teachers',['as'=>'teachers','uses'=>'TeachersController@allTeachers']);
	Route::get('/teachers/addteacher',['as'=>'addteacher','uses'=>'TeachersController@addTeacher']);
	Route::post('/teachers/addteacher/newteacher',['as'=>'storeteacher','uses'=>'TeachersController@storeTeacher']);
	Route::post('/teachers/teachercourses',['as'=>'teachercourses','uses'=>'TeachersController@teacherCourses']);
	Route::post('/teachers/teachercourses/addteachercourse',['as'=>'addteachercourse','uses'=>'TeachersController@addteacherCourse']);

	Route::get('/parents',['as'=>'parents','uses'=>'ParentsController@allParents']);
	Route::get('/parents/addparent',['as'=>'addparent','uses'=>'ParentsController@addParent']);
	Route::post('/parents/addparent/newparent',['as'=>'storeparent','uses'=>'ParentsController@storeParent']);

	Route::get('/exams',['as'=>'exams','uses'=>'ExamsController@allExams']);
	Route::get('/exams/addexam',['as'=>'addexam','uses'=>'ExamsController@addExam']);
	Route::get('/exams/examresults',['as'=>'examresults','uses'=>'ExamsController@examResults']);
	Route::post('/exams/addexam/newexam',['as'=>'storeexam','uses'=>'ExamsController@storeExam']);
	Route::post('/exams/examresults/newexamresult',['as'=>'newexamresult','uses'=>'ExamsController@storeexamResult']);

	Route::get('/admins',['as'=>'admins','uses'=>'AdminsController@allAdmins']);
	Route::get('/admins/addadmin',['as'=>'addadmin','uses'=>'AdminsController@addadmin']);
	Route::post('/admins/addadmin/newadmin',['as'=>'storeadmin','uses'=>'AdminsController@storeAdmin']);
	Route::post('/admins/addadmin/deleteadmin',['as'=>'deleteadmin','uses'=>'AdminsController@deleteAdmin']);


});


Route::group(['middleware'=>['authen','roles:student']],function(){
	
	Route::get('/studentdashboard',['as'=>'studentdashboard','uses'=>'DashboardController@studentdashboard']);
	
});

Route::group(['middleware'=>['authen','roles:teacher']],function(){
	
	Route::get('/teacherdashboard',['as'=>'teacherdashboard','uses'=>'DashboardController@teacherdashboard']);
	Route::get('/teacherclasses',['as'=>'teacherclasses','uses'=>'TeachersController@showteacherClasses']);
	Route::get('/teachercourses',['as'=>'teachercourses','uses'=>'TeachersController@showteacherCourses']);
	Route::get('/teachercourses/teachercoursesstudent',['as'=>'teachercoursesstudent','uses'=>'TeachersController@showteachercoursesStudent']);
	Route::get('/teachercourses/teachercoursesexams',['as'=>'teachercoursesexams','uses'=>'TeachersController@showteachercoursesExams']);
});

Route::group(['middleware'=>['authen','roles:parent']],function(){
	
	Route::get('/parentdashboard',['as'=>'parentdashboard','uses'=>'DashboardController@parentdashboard']);
	Route::get('/childrenstudents',['as'=>'childrenstudents','uses'=>'ParentsController@showparentChildren']);
	Route::get('/childrenstudentsclasses',['as'=>'childrenstudentsclasses','uses'=>'ParentsController@showparentchildrenClasses']);
});