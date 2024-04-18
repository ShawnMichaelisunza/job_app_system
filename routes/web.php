<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// view job
Route::get('/jobs', [JobController::class, 'view'])->name('job.table');

// create job
Route::get('/job/create', [JobController::class, 'create'])->name('job.create')->middleware('auth', 'admin');
Route::post('/job/create/store', [JobController::class, 'store'])->name('job.store');

// view job
Route::get('/job/{job}', [JobController::class, 'details'])->name('job.details');

// apply job
Route::get('/apply/create/{job}', [ApplicantController::class, 'create'])->name('apply.create');
Route::post('/apply/store/{job}', [ApplicantController::class, 'store'])->name('applicant.store');



// admin ----------------

// register
Route::get('/regist3r', [UserController::class, 'register'])->name('admin.register');
Route::post('/regist3r/store', [UserController::class, 'store'])->name('admin.store');

// login
Route::get('/l0gin@dmin', [UserController::class, 'create'])->name('admin.create');
Route::post('/l0gin@dmin/login', [UserController::class, 'login'])->name('admin.login');

// logout

Route::post('/logout', [UserController::class, 'logout'])->name('admin.logout');


// admin dashbaord
Route::get('/admin/dashboard', [AdminController::class, 'index' ])->name('admin.dashboard')->middleware('auth', 'admin');

// edit

Route::get('/admin/edit/{edit}', [AdminController::class, 'edit' ])->name('admin.edit')->middleware('auth', 'admin');
Route::put('/admin/update/{job}', [AdminController::class, 'update' ])->name('admin.update');

// delete
Route::delete('/delete/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

// view all applicants
Route::get('/applicant/{jobs}', [ApplicantController::class, 'index'])->name('admin.applicant')->middleware('auth', 'admin');


// view a aplicant
Route::get('/applicant/{applicants}/view', [ApplicantController::class, 'view'])->name('applicant.view')->middleware('auth', 'admin');

// invited
Route::post('/invite/{id}', [ApplicantController::class, 'invite'])->name('applicant.invite');

// reject
Route::delete('/reject/{id}', [ApplicantController::class, 'reject'])->name('applicant.reject');
