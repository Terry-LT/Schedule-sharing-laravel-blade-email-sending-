<?php

use App\Http\Controllers\AdminDashboard\AdminDashboardController;
use App\Http\Controllers\AdminDashboard\AdminScheduleFileController;
use App\Http\Controllers\AdminDashboard\AdminUsersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Registration\ForgotPasswordController;
use App\Http\Controllers\Registration\LoginController;
use App\Http\Controllers\Registration\LogoutController;
use App\Http\Controllers\Registration\ResettingPasswordController;
use Illuminate\Support\Facades\Route;


Route::get('login/',[LoginController::class,'index'])->middleware(['guest'])->name('login');
Route::post('login/',[LoginController::class,'store'])->middleware(['guest']);

Route::get('logout/',[LogoutController::class,'index'])->middleware(['auth'])->name('logout');
Route::post('logout/',[LogoutController::class,'store'])->middleware(['auth']);

Route::middleware(['guest'])->group(function(){
    Route::get('/forgot-password',[ForgotPasswordController::class,'index'])->name('password.request');
    Route::post('/forgot-password',[ForgotPasswordController::class,'store']);

    Route::get('/reset-password/{token}',[ResettingPasswordController::class,'index'])->name('password.reset');
    Route::post('/reset-password/{token}',[ResettingPasswordController::class,'store']);
});

Route::get('profile/',[ProfileController::class,'index'])->name('profile')->middleware('auth');

Route::group(['prefix' => 'admin','middleware' => ['auth','admin']],function() {
    Route::get('dashboard',[AdminDashboardController::class,'index'])->name('admin.dashboard');

    Route::get('users',[AdminUsersController::class,'index'])->name('admin.users');
    Route::get('users/create',[AdminUsersController::class,'create'])->name('admin.users.create');
    Route::post('users/create',[AdminUsersController::class,'store']);
    Route::get('users/{user}/edit',[AdminUsersController::class,'edit'])->name('admin.users.edit');
    Route::put('users/{user}/edit',[AdminUsersController::class,'update']);
    Route::delete('users/{user}',[AdminUsersController::class,'destroy'])->name('admin.users.delete');

    Route::get('scheduleFiles',[AdminScheduleFileController::class,'index'])->name('admin.scheduleFiles');
    Route::get('scheduleFiles/add',[AdminScheduleFileController::class,'create'])->name('admin.scheduleFiles.create');
    Route::post('scheduleFiles/add',[AdminScheduleFileController::class,'store']);
    Route::delete('scheduleFiles/{scheduleFile}',[AdminScheduleFileController::class,'destroy'])->name('admin.scheduleFiles.delete');
    Route::get('scheduleFiles/{scheduleFile}/edit',[AdminScheduleFileController::class,'edit'])->name('admin.scheduleFiles.edit');
    Route::put('scheduleFiles/{scheduleFile}/edit',[AdminScheduleFileController::class,'update']);
    Route::post('scheduleFiles/{scheduleFile}/download',[AdminScheduleFileController::class,'download'])->name('admin.scheduleFiles.download');
 });