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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::resource('/', 'LoginController');

Route::resource('login', 'LoginController');
Route::resource('dashboard', 'DashboardController');
Route::resource('course', 'CourseController');
Route::resource('subject', 'SubjectController');
Route::resource('user', 'UserController');
Route::resource('schedule', 'ScheduleController');
Route::resource('classroom', 'ClassroomController');
Route::resource('subjectstudent', 'SubjectStudentController');
Route::resource('exam', 'ExamController');
Route::resource('work', 'WorkController');


Route::get('logout', 'LoginController@logout')->name('logout');
Route::get('/classroom/{id}/student', 'ClassroomController@student');
Route::get('/course/{id}/subject', 'CourseController@subject');
Route::get('/subjectstudent/{id}/add', 'SubjectStudentController@add');
Route::get('/subjectstudent/{id}/data', 'SubjectStudentController@data');
Route::get('/subjectstudent/{id}/exam', 'ExamController@add');
Route::get('/subjectstudent/{id}/exam/calculate', 'ExamController@calculate');
Route::get('/subjectstudent/{id}/work', 'WorkController@add');
Route::get('/subjectstudent/{id}/work/calculate', 'WorkController@calculate');

Route::get('/classrooms', 'DashboardController@classrooms')->name('dashboard.classrooms');
Route::get('/subjects', 'DashboardController@subjects')->name('dashboard.subjects');
Route::get('/exams', 'DashboardController@exams')->name('dashboard.exams');
Route::get('/works', 'DashboardController@works')->name('dashboard.works');


Route::post('auth', 'LoginController@auth')->name('auth');
Route::post('classroom/{id}/storeStudent', 'ClassroomController@storeStudent')->name('storeStudent');
Route::post('course/{id}/storeSubject', 'CourseController@storeSubject')->name('storeSubject');
Route::post('subject/{id}/storeStudent', 'SubjectController@storeStudent')->name('storeStudent');
//Route::post('/subjectstudent/{id_subject}/{id_student}/exam/store', 'ExamController@storeExam')->name('storeExam');
//Route::post('/subjectstudent/{id_subject}/{id_student}/work/store', 'WorkController@storeWork')->name('storeWork');


Route::get('/clear', function() {
   	Artisan::call('cache:clear');
   	Artisan::call('config:clear');
   	Artisan::call('config:cache');
   	Artisan::call('view:clear');

	echo "clear";
    // return what you want
});

Route::get('/migrate', function() {
    $exitCode = Artisan::call('migrate');
    echo "migrate :" . $exitCode;
    // return what you want
});
