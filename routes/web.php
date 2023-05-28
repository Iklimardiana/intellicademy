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
Route::get('/admin', [AdminController::class, 'dashboard']);
Route::get('/admin/teachers', [AdminController::class, 'teachers']);
Route::get('/admin/students', [AdminController::class, 'students']);
Route::resource('/admin/course', CourseController::class);

route::get('/teacher', [TeacherController::class, 'dashboard']);
route::get('/teacher/students', [TeacherController::class, 'students']);
route::get('/teacher/courses/{id}', [TeacherController::class, 'courses']);

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);
