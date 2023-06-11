<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ResetPasswordController;

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
    Route::get('admin/teachers/create', [AdminController::class, 'createTeacher']);
    Route::post('admin/teachers', [AdminController::class, 'storeTeacher']);

    Route::get('/admin/students', [AdminController::class, 'students']);
    Route::delete('/admin/students/{id}', [AdminController::class, 'destroyStudent']);
    
    Route::resource('/admin/course', CourseController::class);
});

route::get('/courses', [CourseController::class, 'indexGeneral']);

Route::middleware('teacher')->group(function () {
    route::get('/teacher', [TeacherController::class, 'dashboard']);
    route::get('/teacher/students/{id}', [TeacherController::class, 'students']);

    route::get('/teacher/courses/{id}', [TeacherController::class, 'courses']);

    route::get('/teacher/modules/create/{idCourse}', [TeacherController::class, 'createModule']);
    route::get('/teacher/modules/{id}', [TeacherController::class, 'modules']);
    route::put('/teacher/modules/{idCourse}', [TeacherController::class, 'updateModule']);
    route::post('/teacher/modules/{idCourse}', [TeacherController::class, 'storeModule']);
    route::get('/teacher/modules/{id}/edit', [TeacherController::class, 'editModule']);
    route::get('/teacher/modules/{id}/detail', [TeacherController::class, 'showModule']);
    route::delete('/teacher/modules/{idCourse}', [TeacherController::class, 'destroyModule']);

    route::get('/teacher/assigment/{id}', [TeacherController::class, 'assigments']);
    Route::resource('/teacher/attachment', AttachmentController::class);
    
    route::get('/teacher/profile/{id}/edit', [TeacherController::class, 'editProfile']);
    route::put('/teacher/profile/{id}', [TeacherController::class, 'updateProfile']);
    route::get('/teacher/profile/{id}', [TeacherController::class, 'indexProfile']);
});

Route::middleware('student')->group(function () {
    Route::get('/student', [StudentController::class, 'dashboard']);
    Route::get('/student/profile/{id}', [StudentController::class, 'indexProfile']);
    Route::put('/student/profile/{id}', [StudentController::class, 'updateProfile']);
    Route::get('/student/profile/{id}/edit', [StudentController::class, 'editProfile']);
    Route::get('/student/transaction', [TransactionController::class, 'index']);
    Route::post('/checkout/{id}', [TransactionController::class, 'checkout']);
    Route::get('student/learning-page/{id}', [StudentController::class, 'learningPage'])->name('learning-page');
    Route::post('student/learning-page/{id}', [StudentController::class, 'storeAssignment']);
});

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/register/{key}', [RegisterController::class, 'verify'])->name('verify');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/forgot', [ResetPasswordController::class, 'forgot_password']);
Route::post('/forgot', [ResetPasswordController::class, 'store']);
Route::get('/reset/{token}', [ResetPasswordController::class, 'verify'])->name('verify');
Route::post('/reset', [ResetPasswordController::class, 'reset']);

