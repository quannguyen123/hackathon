<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IssueController;
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
// use App\Http\Controllers\Admin\BasicController;

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [ProfileController::class, 'dashboard'])->name('users.dashboard');
});
Route::group(['middleware' => 'auth'], function () {
    Route::resource('/issues', IssueController::class)->except(['show']) ;
    Route::resource('/users', UserController::class)->except(['show']);
});


Route::prefix('project')->group(function() {
    Route::get('', [App\Http\Controllers\ProjectController::class, 'index'])->name('project-index');
    // Route::get('detail/{project}', [App\Http\Controllers\ProjectController::class, 'detail'])->name('project-detail');

    Route::get('create', [App\Http\Controllers\ProjectController::class, 'create'])->name('project-add');
    Route::post('store', [App\Http\Controllers\ProjectController::class, 'store'])->name('project-store');

    Route::get('edit/{project}', [App\Http\Controllers\ProjectController::class, 'edit'])->name('project-edit');
    Route::post('update/{project}', [App\Http\Controllers\ProjectController::class, 'update'])->name('project-update');

    Route::get('destroy/{project}', [App\Http\Controllers\ProjectController::class, 'destroy'])->name('project-destroy');
});