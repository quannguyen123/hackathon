<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ProjectController;
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
   
});
