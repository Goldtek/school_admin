<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

/*
Default route for the homepage
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/user/register', 'UserController@register')->name('auth.user.register'); //load registration page

Route::post('/user/register', 'UserController@reg'); //load registration page

Route::get('/user/login','UserController@index')->name('auth.user.login'); //load view of user login

Route::post('/user/login','UserController@login');// perform actual login of user

Route::get('/user/logout','UserController@logOut')->name('auth.user.logout');// perform actual logout of user

Route::get('/user/freelancers', 'UserController@freelancers')->name('freelancers'); //load freelancers page

//job view and freelance job view
Route::get('user/job/view/{id}', 'UserController@viewJob')->name('user.jobdetail'); //load job view page
Route::get('user/freelance/view/{id}', 'UserController@viewFreelance')->name('view_freelance'); //load freelance view page
//user protected routes

Route::group(['middleware' => ['auth']], function () {
Route::get('/user/class/{class_id}/course/{course_id}','UserController@getCourse')->name('user.dashboard');
Route::get('/user/courses','UserController@loadCourses')->name('courses');
Route::post('/upload/assignment','UserController@uploadAssignment')->name('uploadAssignment');
Route::post('/upload/material','UserController@uploadMaterial')->name('uploadMaterial');
Route::post('/upload/answer','UserController@uploadAnswer')->name('uploadAnswer');
});



//admin

Route::get('/employer/login', 'CompanyController@index')->name('auth.employer.login'); //load registration page
Route::post('/employer/login', 'CompanyController@login'); //login page

Route::get('/employer/register', 'CompanyController@register')->name('auth.employer.register'); //load registration page
Route::post('/employer/register', 'CompanyController@reg'); //load registration page

Route::group(['middleware' => ['auth:admin']], function () {
Route::get('/company/profile/edit', 'CompanyController@edit_profile')->name('company.edit'); //load edit profile 
Route::post('/company/profile/edit/{id}', 'CompanyController@updateRecord')->name('company.editProfile'); //edit profile 
Route::get('/search','CompanyController@getResumes')->name('company.returncv');       
Route::get('/company/active/jobs', 'CompanyController@jobs')->name('company.jobs'); //load active jobs page
Route::get('/company/featured/jobs', 'CompanyController@featured')->name('company.featured'); //load featured jobs page
Route::get('/delete/featured/{id}', 'CompanyController@deleteFeatured')->name('delete_featured'); //del featured jobs page
Route::get('/company/resume', 'CompanyController@resume')->name('company.resume'); //load resume page
Route::get('/company/followers', 'CompanyController@followers')->name('company.followers'); //load company followers page
Route::get('/company/dashboard/','CompanyController@getDashboard')->name('company.dashboard');
Route::get('/company/logout','CompanyController@logout')->name('company.logout');// perform actual logout of user
Route::get('/company/postJob','CompanyController@showPost')->name('company.post');// show post job
Route::post('/company/post/Job','CompanyController@postjob');// show post job
Route::get('/company/view/resumes','CompanyController@seekersResume')->name('company.viewCv');// show
Route::get('/company/delete/jobs/{id}','CompanyController@deleteJob')->name('delete_jobs');// show
Route::get('/modal','CompanyController@getmodal')->name('company.modal');// show
Route::get('/shortlist','CompanyController@shortlist')->name('shortlist');// shorlist action
Route::get('/company/shortlist','CompanyController@showShortlist')->name('show_shortlist');// show shorlisted users
Route::get('/delete/user/{id}','CompanyController@deleteUser')->name('delete_user');// delete shorlisted user

 });

//Administrators Routes

Route::get('/admin/login', 'AdminController@index')->name('admin.login'); //load registration page
Route::post('/admin/login', 'AdminController@login'); //login page
Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout'); //logout 


Route::group(['middleware' => ['auth:ad']], function () {
Route::get('/admin/register', 'AdminController@register')->name('admin.register'); //load registration page
Route::post('/admin/register', 'AdminController@reg');
Route::get('/admin/dashboard','AdminController@dashboard')->name('admin.dashboard');
Route::get('/delete/post/{id}','AdminController@deletePost')->name('delete_post');
Route::get('/update/staff/department','AdminController@updateDept')->name('system_update_user_department');        
Route::get('/save/staff/department','AdminController@postUserDept')->name('saveStaffDept');
Route::get('/admin/departments/view','AdminController@viewUserDept')->name('view_user_dept');

Route::get('/update/course','AdminController@updateCourse')->name('updateCourse');        
Route::get('/save/course','AdminController@postCourse')->name('saveCourse');
Route::get('/admin/courses/view','AdminController@viewCourse')->name('view_courses');

Route::get('/update/level','AdminController@updateLevel')->name('updateLevel');         
Route::get('/save/level','AdminController@postLevel')->name('saveLevel');
Route::get('/admin/levels/view','AdminController@viewLevel')->name('view_level');

Route::get('/update/class','AdminController@updateClass')->name('updateClass');          
Route::get('/save/class','AdminController@postClass')->name('saveClass');
Route::get('/admin/classes/view','AdminController@viewClass')->name('view_class');


Route::get('/update/students','AdminController@updateStudent')->name('updateStudent');          
Route::get('/save/students','AdminController@postStudent')->name('saveStudent');
Route::get('/admin/students/view','AdminController@viewStudent')->name('view_student');

Route::get('/update/ta','AdminController@updateTa')->name('updateTa');          
Route::get('/save/ta','AdminController@postTa')->name('saveTa');
Route::get('/admin/lecturers/view','AdminController@viewTa')->name('view_ta');

Route::get('/update/assigned','AdminController@updateAssigned')->name('updateAssigned');          
Route::get('/save/assigned','AdminController@postAssigned')->name('saveAssigned');
Route::get('/admin/assigned/courses','AdminController@viewAssigned')->name('view_assigned');

//load dynamics for edit of service vendors
Route::get('/dynamics/edit','AdminController@dynamics')->name('dynamics');
Route::get('/vendor/services','AdminController@vendorServices')->name('vendorServices');
Route::get('/admin/save/class/courses','AdminController@saveClassCourses')->name('saveClassCourses');
 

 });