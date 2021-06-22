<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/student/request', 'App\http\Controllers\StudentController@Sendrequest');
Route::get('/student/activity', 'App\http\Controllers\StudentController@activity');
Route::get('/student/activity/delete/{r_id}', 'App\http\Controllers\StudentController@Deleteactivity');
Route::get('/student/profile','App\http\Controllers\StudentController@Profile');
Route::post('/profile/update','App\http\Controllers\StudentController@Profileupdate');
Route::get('/profile/delete','App\http\Controllers\StudentController@Profiledelete');
Route::post('/profile/changepassword','App\http\Controllers\StudentController@Profilechangepass');
Route::get('/admin','App\http\Controllers\AdminController@index');
Route::get('student/dashboard', 'App\http\Controllers\StudentController@StudentDashboardView');
Route::get('teacher/dashboard', 'App\http\Controllers\TeacherController@index');
Route::get('/joinus','App\http\Controllers\HomeController@joinus');
Route::get('/home','App\http\Controllers\HomeController@index');
Route::post('/joinus','App\http\Controllers\HomeController@create');
//Admin Routes
Route::get('/users','App\http\Controllers\AdminController@usersList');
Route::post('/admin/addteacher','App\http\Controllers\AdminController@Addteacher');
Route::get('/accept/{t_id}','App\http\Controllers\AdminController@Acceptteacher');
Route::get('/teacheredit/{t_id}','App\http\Controllers\AdminController@Editteacher');
Route::post('/updateteacher','App\http\Controllers\AdminController@Updateteacher');
Route::get('/deleteteacher/{t_id}','App\http\Controllers\AdminController@Deleteteacher');
Route::post('/admin/addstudent','App\http\Controllers\AdminController@Addstudent');
Route::get('/teachers','App\http\Controllers\AdminController@teachersList');
Route::get('/edit/{id}','App\http\Controllers\AdminController@edit');
Route::post('/update','App\http\Controllers\AdminController@update');
Route::get('/delete/{id}','App\http\Controllers\AdminController@delete');
Route::get('/requests','App\http\Controllers\AdminController@Requestlist');
Route::post('/admin/addrequest','App\http\Controllers\AdminController@Addrequest');
Route::get('/editrequest/{r_id}','App\http\Controllers\AdminController@Editrequest');
Route::post('/updaterequest','App\http\Controllers\AdminController@Updaterequest');
Route::get('/deleterequest/{t_id}','App\http\Controllers\AdminController@Deleterequest');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/Subject/{sub}', 'App\http\Controllers\StudentController@GetTeacherSubject');
Route::get('/teacherdetails/{id}', 'App\http\Controllers\StudentController@TeacherDetails');
Route::get('/teacher/profile','App\http\Controllers\TeacherController@Profile');
Route::post('/profile/updateteacher','App\http\Controllers\TeacherController@Profileupdate');
Route::get('/profile/deleteteacher','App\http\Controllers\TeacherController@Profiledelete');
Route::post('/profile/changepasswordteacher','App\http\Controllers\TeacherController@Profilechangepass');
Route::post('/profile/addworkexperience','App\http\Controllers\TeacherController@AddWorkExperience');
Route::get('/teacher/workexperience', 'App\http\Controllers\TeacherController@ViewWorkExperience');
Route::get('/teacher/workexperience/{id}', 'App\http\Controllers\TeacherController@DeleteWorkExperience');
Route::get('/teacher/editworkexperience/{id}','App\http\Controllers\TeacherController@EditWorkExperience');
Route::post('/teacher/editworkexperience/{id}','App\http\Controllers\TeacherController@SaveEditWorkExperience');
Route::get('AdminResponse','App\http\Controllers\HomeController@Response');
Route::get('/teacher/activity',  'App\http\Controllers\TeacherController@ViewActivity');
Route::get('/teacher/editactivity/{id}', 'App\http\Controllers\TeacherController@EditActivity');
Route::post('/teacher/editactivity/{id}','App\http\Controllers\TeacherController@SaveActivity');
Route::get('/viewnotification','App\http\Controllers\StudentController@ViewNotification');

Route::get('/livemeet','App\http\Controllers\HomeController@Livechat');
Route::post('/pusher/auth', 'App\http\Controllers\HomeController@authenticate');


Route::get('/teacher/assignments','App\http\Controllers\TeacherController@ViewAssignments');
Route::get('/teacher/createassignmnet','App\http\Controllers\TeacherController@CreateAssignment');
Route::post('/teacher/addassignment','App\http\Controllers\TeacherController@AddAssignment');

//Student Schedule
Route::get('/student/schedule','App\http\Controllers\StudentController@Schedule');

//Teacher creating schedule
Route::get('/teacher/schedule','App\http\Controllers\TeacherController@Schedule');
Route::post('/teacher/createschedule','App\http\Controllers\TeacherController@CreateSchedule');
Route::post('/teacher/addschedule/{id}','App\http\Controllers\TeacherController@AddSchedule');
Route::get('/teacher/schedule/{id}','App\http\Controllers\TeacherController@ViewSchedule');

Route::get('/teacher/question/{id}','App\http\Controllers\TeacherController@CreateQuestion');
Route::post('/teacher/question/createquestion/{id}','App\http\Controllers\TeacherController@AddQuestion');

Route::get('/teacher/assignment/{id}','App\http\Controllers\TeacherController@ViewTheAssignment');
Route::post('/Teacher/UpdateAssignment/{id}','App\http\Controllers\TeacherController@UpdateAssignment');
Route::get('/teacher/Assignment/DeleteQuestion/{id}','App\http\Controllers\TeacherController@DeleteQuestionAssignment');

Route::get('/student/assignments','App\http\Controllers\StudentController@ViewAssignments');
Route::get('/student/ViewAssignment/{id}','App\http\Controllers\StudentController@TakeAssignment');
Route::post('/student/SubmitAssignment/{id}','App\http\Controllers\StudentController@SubmitAssignment');
Route::get('/student/ViewAssignmentSolution/{id}','App\http\Controllers\StudentController@ReviewAssignment');

Route::get('/teacher/viewstudentassignment/{id}','App\http\Controllers\TeacherController@viewStudentAnswers');

Route::get('/Certificate/{id}','App\http\Controllers\TeacherController@ViewCertificate');
Route::get('/download/{id}','App\http\Controllers\TeacherController@DownloadCertificate');

Route::get('/student/certificates','App\http\Controllers\StudentController@Certificates');
Route::get('/ViewCertificate/{id}','App\http\Controllers\StudentController@ViewCertificate');
Route::get('/downloadCertificate/{id}','App\http\Controllers\StudentController@DownloadCertificate');
Route::get('/student/feedback/{id}','App\http\Controllers\StudentController@Feedback');
Route::post('/student/submitfeeddback/{id}','App\http\Controllers\StudentController@SubmitFeedback');
Route::get('/teacher/feedbacks','App\http\Controllers\TeacherController@ViewFeedbacks');

Route::get('/livechat','App\http\Controllers\HomeController@live_chat');
Route::get('userlist', [App\Http\Controllers\HomeController::class, 'user_list'])->name('user.list');
Route::get('usermessage/{id}', [App\Http\Controllers\HomeController::class, 'user_message'])->name('user.message');
Route::post('sendmessage', [App\Http\Controllers\HomeController::class, 'send_message'])->name('user.message.send');
Route::get('deletesinglemessage/{id}', [App\Http\Controllers\HomeController::class, 'delete_single_message'])->name('delete.single.message');
Route::get('deleteallmessage/{id}', [App\Http\Controllers\HomeController::class, 'delete_all_message'])->name('delete.all.message');
