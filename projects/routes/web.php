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
	Route::post('/dashboard/profile',['as'=>'adminprofile','uses'=>'AdminsController@adminProfile']);
	Route::post('/dashboard/profile/updateinfoadmin',['as'=>'updateinfoadmin','uses'=>'AdminsController@updateinfoAdmin']);
	Route::post('/dashboard/profile/adminpasswordchange',['as'=>'adminpasswordchange','uses'=>'AdminsController@adminpasswordChange']);
	
	Route::get('/courses',['as'=>'courses','uses'=>'CoursesController@allCourses']);
	Route::post('/courses/updatecourse',['as'=>'updatecourse','uses'=>'CoursesController@findCourse']);
	Route::post('/courses/updatecourse/editcourse',['as'=>'storeupdatecourse','uses'=>'CoursesController@storeupdateCourse']);
	Route::get('/courses/addcourse',['as'=>'addcourse','uses'=>'CoursesController@addCourse']);
	Route::post('/courses/addcourse/newcourse',['as'=>'storecourse','uses'=>'CoursesController@storeCourse']);
	Route::post('/courses/deletecourse',['as'=>'deletecourse','uses'=>'CoursesController@deleteCourse']);

	Route::get('/students',['as'=>'students','uses'=>'StudentsController@allStudents']);
	Route::post('/students/updatestudent',['as'=>'updatestudent','uses'=>'StudentsController@findStudent']);
	Route::post('/students/updatestudent/restpasswordstudent',['as'=>'restpasswordstudent','uses'=>'StudentsController@restpasswordStudent']);
	Route::post('/students/updatestudent/editstudent',['as'=>'storeupdatestudent','uses'=>'StudentsController@storeupdateStudent']);
	Route::get('/students/addstudent',['as'=>'addstudent','uses'=>'StudentsController@addStudent']);
	Route::post('/students/deletestudent',['as'=>'deletestudent','uses'=>'StudentsController@deleteStudent']);
	Route::post('/students/addstudent/newstudent',['as'=>'storestudent','uses'=>'StudentsController@storeStudent']);
	Route::post('/students/addstudent/searchparent',['as'=>'searchparent','uses'=>'StudentsController@seacrchParent']);
	Route::post('/students/studentcourses',['as'=>'allstudentcourses','uses'=>'StudentsController@studentCourses']);
	Route::post('/students/studentcourses/addstudentcourse',['as'=>'addstudentcourse','uses'=>'StudentsController@addstudentCourse']);

	Route::get('/classes',['as'=>'classes','uses'=>'ClassesController@allClasses']);
	Route::post('/classes/updateclassroom',['as'=>'updateclassroom','uses'=>'ClassesController@findClassroom']);
	Route::post('/classes/updateclassroom/editclassroom',['as'=>'storeupdateclassroom','uses'=>'ClassesController@storeupdateClass']);
	Route::post('/classes/classattdentencesheet',['as'=>'classattdentencesheet','uses'=>'ClassesController@classattdentenceSheet']);
	Route::post('/classes/classattdentencesheets',['as'=>'classattdentencesheets','uses'=>'ClassesController@classattdentenceSheets']);
	Route::post('/classes/addclassattdentencesheet',['as'=>'addclassattdentencesheet','uses'=>'ClassesController@addclassattdentenceSheet']);
	Route::post('/classes/addattendencesheet',['as'=>'addattendencesheet','uses'=>'ClassesController@addattendenceSheet']);
	Route::post('/classes/updateattendencesheet',['as'=>'updateattendencesheet','uses'=>'ClassesController@updateattendenceSheet']);
	Route::get('/classes/addclass',['as'=>'addclass','uses'=>'ClassesController@addClass']);
	Route::post('/classes/deleteclass',['as'=>'deleteclass','uses'=>'ClassesController@deleteClass']);
	Route::post('/classes/addclass/newclass',['as'=>'storeclass','uses'=>'ClassesController@storeClass']);
	Route::post('/classes/addclass/searchcourse',['as'=>'searchcourse','uses'=>'ClassesController@seacrchCourse']);

	Route::get('/teachers',['as'=>'teachers','uses'=>'TeachersController@allTeachers']);
	Route::post('/teachers/updateteacher',['as'=>'updateteacher','uses'=>'TeachersController@findTeacher']);
	Route::post('/teachers/updateteacher/restpasswordteacher',['as'=>'restpasswordteacher','uses'=>'TeachersController@restpasswordTeacher']);
	Route::post('/teachers/updateteacher/editteacher',['as'=>'storeupdateteacher','uses'=>'TeachersController@storeupdateTeacher']);
	Route::get('/teachers/addteacher',['as'=>'addteacher','uses'=>'TeachersController@addTeacher']);
	Route::post('/teachers/addteacher/newteacher',['as'=>'storeteacher','uses'=>'TeachersController@storeTeacher']);
	Route::post('/teachers/deleteteacher',['as'=>'deleteteacher','uses'=>'TeachersController@deleteTeacher']);
	Route::post('/teachers/teachercourses',['as'=>'allteachercourses','uses'=>'TeachersController@teacherCourses']);
	Route::post('/teachers/teachercourses/addteachercourse',['as'=>'addteachercourse','uses'=>'TeachersController@addteacherCourse']);

	Route::get('/parents',['as'=>'parents','uses'=>'ParentsController@allParents']);
	Route::post('/parents/updateparent',['as'=>'updateparent','uses'=>'parentsController@findParent']);
	Route::post('/parents/updateparent/restpasswordparent',['as'=>'restpasswordparent','uses'=>'parentsController@restpasswordParent']);
	Route::post('/parents/updateparent/editparent',['as'=>'storeupdateparent','uses'=>'parentsController@storeupdateParent']);
	Route::get('/parents/addparent',['as'=>'addparent','uses'=>'ParentsController@addParent']);
	Route::post('/parents/addparent/newparent',['as'=>'storeparent','uses'=>'ParentsController@storeParent']);
	Route::post('/parents/deleteparent',['as'=>'deleteparent','uses'=>'ParentsController@deleteParent']);

	Route::get('/exams',['as'=>'exams','uses'=>'ExamsController@allExams']);
	Route::post('/exams/updateexam',['as'=>'updateexam','uses'=>'ExamsController@findExam']);
	Route::post('/exams/updateexam/editexam',['as'=>'storeupdateexam','uses'=>'ExamsController@storeupdateExam']);
	Route::get('/exams/addexam',['as'=>'addexam','uses'=>'ExamsController@addExam']);
	Route::get('/exams/examresults',['as'=>'examresults','uses'=>'ExamsController@examResults']);
	Route::post('/exams/addexam/newexam',['as'=>'storeexam','uses'=>'ExamsController@storeExam']);
	Route::post('/exams/deleteexam',['as'=>'deleteexam','uses'=>'ExamsController@deleteExam']);
	Route::post('/exams/examresults/newexamresult',['as'=>'newexamresult','uses'=>'ExamsController@storeexamResult']);
	Route::post('/exams/examresults/viewexamresult',['as'=>'viewexamresult','uses'=>'ExamsController@viewexamResult']);
	Route::post('/exams/examresults/newexamresult/addexamresult/checkexamresultclass',['as'=>'checkexamresultclass','uses'=>'ExamsController@checkexamresultClass']);
	Route::post('/exams/examresults/newexamresult/addexamresult',['as'=>'addexamresult','uses'=>'ExamsController@addexamResult']);
	Route::post('/exams/examresults/newexamresult/updateexamresult',['as'=>'updateexamresult','uses'=>'ExamsController@updateexamResult']);
	Route::post('/exams/examresults/newexamresult/addexamresultclass',['as'=>'addexamresultclass','uses'=>'ExamsController@addexamresultClass']);

	Route::get('/fees',['as'=>'fees','uses'=>'FeeController@allFees']);
	Route::post('/fees/feestudentstatus',['as'=>'feestudentstatus','uses'=>'FeeController@feestudentStatus']);
	Route::post('/fees/feestudentstatus/updatefeestudentstatus',['as'=>'updatefeestudentstatus','uses'=>'FeeController@updatefeestudentStatus']);
	Route::post('/fees/updatefee',['as'=>'updatefee','uses'=>'FeeController@findfee']);
	Route::post('/fees/updatefee/editfee',['as'=>'storeupdatefee','uses'=>'FeeController@storeupdateFee']);
	Route::get('/fees/addfee',['as'=>'addfee','uses'=>'FeeController@addFee']);
	Route::post('/fees/addfee/newfee',['as'=>'storefee','uses'=>'FeeController@storeFee']);
	Route::post('/fees/deletefee',['as'=>'deletefee','uses'=>'FeeController@deleteFee']);

	Route::get('/finances',['as'=>'finances','uses'=>'FinanceController@allFinances']);
	Route::post('/finances/updatefinance',['as'=>'updatefinance','uses'=>'FinanceController@findFinance']);
	Route::post('/finances/updatefinance/editfinance',['as'=>'storeupdatefinance','uses'=>'FinanceController@storeupdateFinance']);
	Route::get('/finances/addfinance',['as'=>'addfinance','uses'=>'FinanceController@addFinance']);
	Route::post('/finances/addfinance/newfinance',['as'=>'storefinance','uses'=>'FinanceController@storeFinance']);
	Route::post('/finances/deletefinance',['as'=>'deletefinance','uses'=>'FinanceController@deleteFinance']);


	Route::get('/admins',['as'=>'admins','uses'=>'AdminsController@allAdmins']);
	Route::post('/admins/updateadmin',['as'=>'updateadmin','uses'=>'AdminsController@findAdmin']);
	Route::post('/admins/updateadmin/restpassword',['as'=>'restpasswordadmin','uses'=>'AdminsController@restpasswordAdmin']);
	Route::post('/admins/updateadmin/editadmin',['as'=>'storeupdateadmin','uses'=>'AdminsController@storeupdateAdmin']);
	Route::get('/admins/addadmin',['as'=>'addadmin','uses'=>'AdminsController@addadmin']);
	Route::post('/admins/addadmin/newadmin',['as'=>'storeadmin','uses'=>'AdminsController@storeAdmin']);
	Route::post('/admins/deleteadmin',['as'=>'deleteadmin','uses'=>'AdminsController@deleteAdmin']);


	Route::get('/financereport',['as'=>'financereport','uses'=>'ReportsController@financeReport']);
	Route::get('/webreport',['as'=>'webreport','uses'=>'ReportsController@webReport']);

});


Route::group(['middleware'=>['authen','roles:student']],function(){
	
	Route::get('/studentdashboard',['as'=>'studentdashboard','uses'=>'DashboardController@studentdashboard']);
	Route::post('/studentdashboard/profile',['as'=>'studentprofile','uses'=>'StudentsController@studentprofile']);
	Route::post('/studentdashboard/profile/updateinfostudent',['as'=>'updateinfostudent','uses'=>'StudentsController@updateinfoStudent']);
	Route::post('/studentdashboard/profile/studentpasswordchange',['as'=>'studentpasswordchange','uses'=>'StudentsController@studentpasswordChange']);
	Route::get('/studentcourses',['as'=>'studentcourses','uses'=>'StudentsController@showstudentCourses']);
	Route::get('/studentclasses',['as'=>'studentclasses','uses'=>'StudentsController@showstudentClasses']);
	Route::get('/studentexams',['as'=>'studentexams','uses'=>'StudentsController@showstudentExams']);
	Route::get('/studentteachers',['as'=>'studentteachers','uses'=>'StudentsController@showstudentTeachers']);
	Route::get('/studentresults',['as'=>'studentresults','uses'=>'StudentsController@showstudentResults']);
	Route::get('/studentattendence',['as'=>'studentattendence','uses'=>'StudentsController@showstudentAttendence']);
	Route::get('/studentfee',['as'=>'studentfee','uses'=>'StudentsController@showstudentFee']);
	
});

Route::group(['middleware'=>['authen','roles:teacher']],function(){
	
	Route::get('/teacherdashboard',['as'=>'teacherdashboard','uses'=>'DashboardController@teacherdashboard']);
	Route::post('/teacherdashboard/profile',['as'=>'teacherprofile','uses'=>'TeachersController@teacherProfile']);
	Route::post('/teacherdashboard/profile/updateinfoteacher',['as'=>'updateinfoteacher','uses'=>'TeachersController@updateinfoTeacher']);
	Route::post('/teacherdashboard/profile/teacherpasswordchange',['as'=>'teacherpasswordchange','uses'=>'TeachersController@teacherpasswordChange']);
	Route::get('/teacherclasses',['as'=>'teacherclasses','uses'=>'TeachersController@showteacherClasses']);
	Route::post('/teacherclasses/classteacherattdentencesheets',['as'=>'classteacherattdentencesheets','uses'=>'ClassesController@classteacherattdentenceSheets']);
	Route::post('/teacherclasses/classteacherattdentencesheet',['as'=>'classteacherattdentencesheet','uses'=>'ClassesController@classteacherattdentenceSheet']);
	Route::post('/teacherclasses/updateteacherattendencesheet',['as'=>'updateteacherattendencesheet','uses'=>'ClassesController@updateattendenceSheet']);
	Route::post('/teacherclasses/addteacherclassattdentencesheet',['as'=>'addteacherclassattdentencesheet','uses'=>'ClassesController@addclassteacherattdentenceSheet']);
	Route::post('/teacherclasses/addteacherattendencesheet',['as'=>'addteacherattendencesheet','uses'=>'ClassesController@addattendenceSheet']);

	Route::get('/teachercourses',['as'=>'teachercourses','uses'=>'TeachersController@showteacherCourses']);
	Route::get('/teachercourses/teachercoursesstudent',['as'=>'teachercoursesstudent','uses'=>'TeachersController@showteachercoursesStudent']);
	Route::get('/teachercourses/teachercoursesexams',['as'=>'teachercoursesexams','uses'=>'TeachersController@showteachercoursesExams']);
	Route::post('/teachercourses/teachercoursesexams/viewteacherexamresult',['as'=>'viewteacherexamresult','uses'=>'ExamsController@viewteacherexamResult']);
	Route::post('/exams/examresults/newexamresult/updateteacherexamresult',['as'=>'updateteacherexamresult','uses'=>'ExamsController@updateexamResult']);
});

Route::group(['middleware'=>['authen','roles:parent']],function(){
	
	Route::get('/parentdashboard',['as'=>'parentdashboard','uses'=>'DashboardController@parentdashboard']);
	Route::post('/parentdashboard/profile',['as'=>'parentprofile','uses'=>'ParentsController@parentProfile']);
	Route::post('/parentdashboard/profile/updateinfoparent',['as'=>'updateinfoparent','uses'=>'ParentsController@updateinfoParent']);
	Route::post('/parentdashboard/profile/parentpasswordchange',['as'=>'parentpasswordchange','uses'=>'ParentsController@parentpasswordChange']);
	Route::get('/childrenstudents',['as'=>'childrenstudents','uses'=>'ParentsController@showparentChildren']);
	Route::get('/childrenstudentsclasses',['as'=>'childrenstudentsclasses','uses'=>'ParentsController@showparentchildrenClasses']);
	Route::get('/childrenstudentsclassesattendence',['as'=>'childrenstudentsclassesattendence','uses'=>'ParentsController@showparentchildrenAttendence']);
	Route::get('/childrenstudentscourses',['as'=>'childrenstudentscourses','uses'=>'ParentsController@showparentchildrenCourses']);
	Route::get('/parentallcourses',['as'=>'parentallcourses','uses'=>'ParentsController@showparentallCourses']);
	Route::get('/parentallteachers',['as'=>'parentallteachers','uses'=>'ParentsController@showparentallTeachers']);
	Route::get('/childrenstudentsteachers',['as'=>'childrenstudentsteachers','uses'=>'ParentsController@showparentchildrenTeachers']);
	Route::get('/childrenstudentsexams',['as'=>'childrenstudentsexams','uses'=>'ParentsController@showparentchildrenExams']);
	Route::get('/childrenstudentsexamreults',['as'=>'childrenstudentsexamreults','uses'=>'ParentsController@showparentchildrenexamReults']);
	Route::get('/childrenstudentsfees',['as'=>'childrenstudentsfees','uses'=>'ParentsController@showparentchildrenFee']);
	Route::post('/childrenstudentsfees/parentstudentpayfee',['as'=>'parentstudentpayfee','uses'=>'ParentsController@parentstudentpayFee']);
});