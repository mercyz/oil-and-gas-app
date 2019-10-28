<?php

Route::get('/', 'Front\HomeController@index')->name('front');
Route::get('/about', 'Front\HomeController@about')->name('about');

//Courses
Route::get('/courses', 'Front\CoursesController@index')->name('frontCourses');
Route::get('/courses/{course}', 'Front\CoursesController@singleCourse')->name('showCourse');

//Services
Route::get('/services', 'Front\ServicesController@index')->name('frontServices');
Route::get('/services/{services}', 'Front\ServicesController@singleService')->name('showService');

//Products
Route::get('/products', 'Front\ProductsController@index')->name('frontProducts');
Route::get('/products/{products}', 'Front\ProductsController@singleProduct')->name('showProduct');

//Projects
Route::get('/projects', 'Front\ProjectsController@index')->name('frontProjects');
Route::get('/projects/{projects}', 'Front\ProjectsController@singleProject')->name('showProject');
//Contact Us 
Route::get('/contact/create', 'Front\ContactMailsController@create')->name('createContact');
Route::post('/contact', 'Front\ContactMailsController@sendMessage')->name('contact');


Route::get('/student', function(){
	return redirect('/student/dashboard');
})->name('home')->middleware(['auth', 'completeprofile']);

Auth::routes(['verify'=>true]);
Route::get('verify/user/{token}', 'UsersController@verify')->name('verify');
Route::get('verify/logout', 'UsersController@verifyLogout')->name('verifyLogout');

//student
Route::group(['prefix' => 'student', 'middleware' => ['completeprofile']], function() {
Route::get('/dashboard', 'StudentPortal\DashboardController@index')->name('studentdashboard');
Route::get('/updateprofile', 'StudentPortal\DashboardController@profileForm')->name('profileForm');
Route::post('/updateprofile', 'StudentPortal\DashboardController@UpdateProfile')->name('updateprofile');
Route::get('/course-list', 'StudentPortal\CoursesController@course')->name('course-list');
Route::get('/course-detail/{course}', 'StudentPortal\CoursesController@courseDetail')->name('course-detail');
Route::get('/my-courses', 'StudentPortal\CoursesController@myCourses')->name('my-courses');
Route::post('/course-detail/{course}/pay', 'StudentPortal\CoursesController@makePayments')->name('course-pay');
});


//StaffsRoom
Route::group(['prefix' => 'staffroom'], function(){
	Route::get('/dashboard', 'Staffs\StaffsController@index')->name('staffsdashboard');
	Route::get('/staff-profile/{staff}', 'Staffs\StaffsController@viewProfile')->name('viewprofile');
	Route::get('/editprofile/{staff}', 'Staffs\StaffsController@updateForm')->name('editStaffProfile');
	Route::post('/updateprofile/{staff}', 'Staffs\StaffsController@updateStaffRecord')->name('updateStaffRecord');
	Route::get('/login', 'Auth\StaffsController@staffLoginForm')->name('staffsLoginForm');
	Route::post('/login', 'Auth\StaffsController@doStaffLogin')->name('doStaffLogin');
});

//Administrator 
Route::group(['prefix' => 'hmgaccess'], function(){

Route::get('/dashboard', 'Hmgaccess\AdminsController@index')->name('dashboard');
Route::get('/profile', 'Hmgaccess\AdminsController@profile')->name('adminprofile');

//Messages
Route::get('/message/inbox', 'Hmgaccess\AdminSendMessagesController@index')->name('adminEmail');
Route::get('/message/compose', 'Hmgaccess\AdminSendMessagesController@createMessageForm')->name('adminMessage');
Route::post('/message/send', 'Hmgaccess\AdminSendMessagesController@storeMessage')->name('adminMessage-send');
Route::post('/message/mail', 'Hmgaccess\AdminSendMessagesController@sendMessage')->name('adminEmail-send');

/*Authentication*/

Route::get('/login', 'Auth\AdminsController@showLoginForm')->name('admin-login-form');
Route::post('/login', 'Auth\AdminsController@doLoginAdmin')->name('dologinadmin');
Route::post('/logout', 'Auth\AdminsController@doLogout')->name('dologout');

// Courses 

Route::get('/course', 'Hmgaccess\CoursesController@index')->name('coursesManagement');
Route::get('/course/create', 'Hmgaccess\CoursesController@create')->name('createcourse');
Route::post('/course', 'Hmgaccess\CoursesController@store')->name('storecourse');
Route::get('/course/{course}/edit', 'Hmgaccess\CoursesController@editCourse')->name('editcourse');
Route::patch('/course/{course}', 'Hmgaccess\CoursesController@updateCourse')->name('updateCourse');
Route::delete('/course/{course}', 'Hmgaccess\CoursesController@deleteCourse')->name('deletecourse');


//Students
Route::get('/students', 'Hmgaccess\StudentsController@index')->name('students');
Route::get('/students/{user}', 'Hmgaccess\StudentsController@studentDetail')->name('studentdetail');
Route::get('/student/create', 'Hmgaccess\StudentsController@createStudent')->name('createstudent');
Route::post('/students', 'Hmgaccess\StudentsController@addStudent')->name('storestudent');
Route::get('/students/{user}/edit', 'Hmgaccess\StudentsController@editStudent')->name('editStudent');
Route::patch('/students/{user}', 'Hmgaccess\StudentsController@updateStudent')->name('updateStudent');
Route::delete('/students/{user}', 'Hmgaccess\StudentsController@deleteStudent')->name('deleteStudent');


//Services
Route::get('/services', 'Hmgaccess\ServicesController@index')->name('services');
Route::get('/services/create', 'Hmgaccess\ServicesController@createService')->name('createservice');
Route::post('/serevice', 'Hmgaccess\ServicesController@addService')->name('storeservice');
Route::get('/services/{service}/edit', 'Hmgaccess\ServicesController@editService')->name('editservice');
Route::patch('/service/{service}', 'Hmgaccess\ServicesController@updateService')->name('updateservice');
Route::delete('/services/{service}', 'Hmgaccess\ServicesController@deleteService')->name('deleteservice');


//Products
Route::get('/products', 'Hmgaccess\ProductsController@index')->name('products');
Route::get('/products/create', 'Hmgaccess\ProductsController@createProduct')->name('createproduct');
Route::post('/products', 'Hmgaccess\ProductsController@storeProduct')->name('storeproduct');
Route::get('/products/{product}/edit', 'Hmgaccess\ProductsController@editProduct')->name('editproduct');
Route::patch('/products/{product}', 'Hmgaccess\ProductsController@updateProduct')->name('updateproduct');
Route::delete('/products/{product}', 'Hmgaccess\ProductsController@deleteProduct')->name('deleteproduct');
Route::post('/products/{id}/deleteImage', 'Hmgaccess\ProductsController@deleteImage')->name('deleteImage');

//Projects
Route::get('/projects', 'Hmgaccess\ProjectsController@index')->name('projects');
Route::get('/projects/create', 'Hmgaccess\ProjectsController@createProject')->name('createproject');
Route::post('/projects', 'Hmgaccess\ProjectsController@storeProject')->name('projectstore');
Route::get('/projects/{projects}/edit', 'Hmgaccess\ProjectsController@editProject')->name('editproject');
Route::patch('/projects/{project}', 'Hmgaccess\ProjectsController@updateProject')->name('updateproject');
Route::delete('/projects/{project}', 'Hmgaccess\ProjectsController@deleteProject')->name('deleteproject');
Route::post('/projects/{id}/deleteImage', 'Hmgaccess\ProjectsController@deleteImage')->name('deleteImage');


//Careers
Route::get('/careers', 'Hmgaccess\CareersController@index')->name('careers');
Route::get('/careers/create', 'Hmgaccess\CareersController@careerCreate')->name('addcareer');
Route::post('/careers', 'Hmgaccess\CareersController@storeCareer')->name('storecareer');
Route::get('/careers/{career}/edit', 'Hmgaccess\CareersController@editCareer')->name('editcareer');
Route::patch('/careers/{career}', 'Hmgaccess\CareersController@updateCareer')->name('updatecareer');
Route::delete('/careers/{career}', 'Hmgaccess\CareersController@deleteCareer')->name('deletecareer');

//Staffs
Route::get('/staffs', 'Hmgaccess\StaffsController@index')->name('staffs');
Route::get('/create-staff', 'Hmgaccess\StaffsController@createStaffForm')->name('createStaff');
Route::post('/add-staff', 'Hmgaccess\StaffsController@addStaff')->name('addStaff');
Route::get('/edit-staff/{staff}/edit', 'Hmgaccess\StaffsController@editStaff')->name('editStaff');
Route::post('/update-staff/{staff}', 'Hmgaccess\StaffsController@updateStaff')->name('staffUpdate');
Route::get('/staff-details/{staff}', 'Hmgaccess\StaffsController@StaffDetails')->name('staffDetails');
Route::delete('/staff-delete/{staff}', 'Hmgaccess\StaffsController@deleteStaff')->name('deleteStaff');

});



