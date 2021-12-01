<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/cache-clear', function(){
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');

    return redirect()->back();
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// User Panel Routes
Route::prefix('user')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('dashboard', [App\Http\Controllers\User\UserController::class, 'index'])->name('home');
        Route::get('job',[App\Http\Controllers\User\JobController::class, 'index'])->name('user.job');
        Route::get('job/details/{id}',[App\Http\Controllers\User\JobController::class, 'show']);
        Route::get('job/apply/{token}/{job_id}',[App\Http\Controllers\User\JobController::class, 'store']);
    });
});

// Admin Panel Routes
Route::prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login']);
    // Admin Middleware
    Route::middleware(['admin'])->group(function () {
        Route::get('register', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showRegistrationForms'])->name('admin.register');
        Route::get('register', [App\Http\Controllers\Admin\Auth\LoginController::class, 'register']);
        Route::get('dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');
        // Job Routes
        Route::get('job',[App\Http\Controllers\Admin\JobController::class, 'index'])->name('admin.job');
        Route::post('job',[App\Http\Controllers\Admin\JobController::class, 'store']);
        Route::post('job/edit', [App\Http\Controllers\Admin\JobController::class, 'show'])->name('admin.job.edit');
        Route::post('job/update', [App\Http\Controllers\Admin\JobController::class, 'update'])->name('admin.job.update');
        Route::post('job/delete', [App\Http\Controllers\Admin\JobController::class, 'destroy'])->name('admin.job.delete');
        // User Routes
        Route::get('user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users');
        Route::post('user/view', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('admin.user.show');
        Route::post('user/delete', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.user.delete');

    });
});


