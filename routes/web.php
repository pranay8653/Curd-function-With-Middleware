<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StudentController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/','login')->name('login');
Route::post('/login_user', [SessionController::class,'login'])->name('login.user');

// student
Route::get('/create_student_data', [StudentController::class, 'create']);
Route::post('/sudent_store', [StudentController::class,'store'])->name('student.store');


// admin
Route::get('/create_admin_data', [AdminController::class, 'create']);
Route::post('admin_store', [AdminController::class,'store'])->name('admin.store');


// Route::view('/student_dashboard','student.student_dashboard');
Route::middleware('auth:web')->group(function(){
    Route::get('/logout', [SessionController::class, 'logout'])->name('logout');

    // Admin
    Route::group(['middleware' => ['loginuser:Admin']], function(){
        Route::view('/admin_dashboard','admin.admin_dashboard');
        Route::get('/show_admin', [AdminController::class, 'show'])->name('show.admin');
    });

    // Student
    Route::group(['middleware' => ['loginuser:Student']], function(){
        Route::view('/student_dashboard','student.student_dashboard');
        Route::get('/show_student', [StudentController::class, 'show'])->name('show.student');
        Route::get('/edit_data/{id}', [StudentController::class, 'edit'])->name('edit.student');
        Route::put('/update_data/{id}', [StudentController::class, 'update'])->name('update.data');
        Route::get('/delete_data/{id}', [StudentController::class, 'destroy'])->name('delete.data');
    });
});
