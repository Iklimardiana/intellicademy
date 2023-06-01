<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AttachmentController;

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
    return view('index');
});


Route::resource('/module', ModuleController::class);
Route::resource('/attachment', AttachmentController::class);

Route::middleware('admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard']);
    Route::get('/admin/teachers', [AdminController::class, 'teachers']);
    Route::delete('/admin/teachers/{id}', [AdminController::class, 'destroyTeacher']);

    Route::get('/admin/students', [AdminController::class, 'students']);
    Route::delete('/admin/students/{id}', [AdminController::class, 'destroyStudent']);
    
    Route::resource('/admin/course', CourseController::class);
});

route::get('/courses', [CourseController::class, 'indexGeneral']);

Route::middleware('teacher')->group(function () {
    route::get('/teacher', [TeacherController::class, 'dashboard']);
    route::get('/teacher/students', [TeacherController::class, 'students']);
    route::get('/teacher/courses/{id}', [TeacherController::class, 'courses']);
    route::get('/teacher/modules/create/{idCourse}', [TeacherController::class, 'createModule']);
    route::get('/teacher/modules/{id}', [TeacherController::class, 'modules']);
    route::post('/teacher/modules/{idCourse}', [TeacherController::class, 'storeModule']);
    route::get('/teacher/assigment/{id}', [TeacherController::class, 'assigments']);
    route::get('/teacher/profile/{id}/edit', [TeacherController::class, 'editProfile']);
    route::post('/teacher/profile', [TeacherController::class, 'storeProfile']);
    route::get('/teacher/profile', [TeacherController::class, 'indexProfile']);
    route::get('/teacher/profile', [TeacherController::class, 'indexProfile']);
});

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);
