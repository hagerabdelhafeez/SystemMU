<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes(['register' => true]);
Route::group(['middleware'=>['guest']],function(){
    Route::get('/', function()
{
    return view('auth.login');
});

});

Route::group(['middleware'=>['auth']],function(){

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::resource('colleges', 'App\Http\Controllers\Colleges\CollegeController');
Route::resource('departments', 'App\Http\Controllers\Departments\DepartmentController');
Route::resource('years', 'App\Http\Controllers\Years\YearController');
Route::resource('semesters', 'App\Http\Controllers\Semesters\SemesterController');
Route::resource('courses', 'App\Http\Controllers\Courses\CourseController');
Route::resource('sliders', 'App\Http\Controllers\Sliders\SliderController');
Route::resource('calendars', 'App\Http\Controllers\Calendars\CalendarController');
Route::resource('news', 'App\Http\Controllers\News\NawController');
Route::resource('teachers', 'App\Http\Controllers\Teachers\TeacherController');
Route::resource('employees', 'App\Http\Controllers\Employees\EmployeeController');
Route::resource('students', 'App\Http\Controllers\Students\StudentController');

});
