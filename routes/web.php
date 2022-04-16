<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Admin\GuideController;
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
    /** Dashboard */
    Route::get('/', [ProfileController::class, 'dashboard'])->name('users.dashboard');
    /** Issues */
    Route::resource('/issues', IssueController::class)->except(['show']) ;
    /** Users */
    Route::resource('/users', UserController::class)->except(['show']);
    /** Project */
    Route::resource('/projects', ProjectController::class);
    Route::prefix('guide')->group(function() {
        Route::get('list', [GuideController::class, 'index'])->name('guides.index');
        Route::get('create', [GuideController::class, 'create'])->name('guides.create');
        Route::post('store', [GuideController::class, 'store'])->name('guides.store');
        Route::get('edit/{id}', [GuideController::class, 'edit'])->name('guides.edit');
        Route::post('update/{id}', [GuideController::class, 'update'])->name('guides.update');
        Route::post('destroy/{id}', [GuideController::class, 'destroy'])->name('guides.delete');
    });
});
