<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\AdminController;

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

Route::resource('/course', CourseController::class);
Route::resource('/module', ModuleController::class);
Route::resource('/attachment', AttachmentController::class);
Route::get('/dashboard', [AdminController::class, 'dashboard']);
Route::get('/teachers', [AdminController::class, 'teachers']);
Route::get('/students', [AdminController::class, 'students']);