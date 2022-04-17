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
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    /** Dashboard */
    Route::get('/', [ProfileController::class, 'dashboard'])->name('users.dashboard');
    /** Issues */
    Route::resource('/issues', IssueController::class)->except(['show'])->middleware(['role:2|3|4']);
    /** Users */
    Route::resource('/users', UserController::class)->except(['show'])->middleware(['role:1']);
    /** Project */
    // Route::resource('/projects', ProjectController::class)->middleware(['role:2|3|4']);
    // Route::get('/projects/{project}', [ProjectController::class,'show'])->name('projects.show');
    Route::post('projects/quick_update', [ProjectController::class,'quickUpdate'])->name('projects.quick_update');
    
    Route::prefix('projects')->group(function() {
        Route::get('list', [ProjectController::class, 'index'])->middleware(['role:1|2'])->name('projects.index');
        Route::get('show/{project}', [ProjectController::class, 'show'])->middleware(['role:1|2|3|4'])->name('projects.show');

        // admin có quyền tạo
        Route::get('create', [ProjectController::class, 'create'])->middleware(['role:1'])->name('projects.create');
        Route::post('store', [ProjectController::class, 'store'])->middleware(['role:1'])->name('projects.store');

        // admin và manager có quyền chỉnh sửa, manager chỉ có quyền chỉnh sửa project add cho mình
        Route::get('edit/{project}', [ProjectController::class, 'edit'])->middleware(['role:1|2'])->name('projects.edit');
        Route::put('update/{project}', [ProjectController::class, 'update'])->middleware(['role:1|2'])->name('projects.update');
        Route::post('destroy/{project}', [ProjectController::class, 'destroy'])->middleware(['role:1|2'])->name('projects.destroy');
    });

    Route::prefix('guide')->group(function() {
        Route::get('list', [GuideController::class, 'index'])->name('guides.index');
        Route::get('create', [GuideController::class, 'create'])->name('guides.create');
        Route::post('store', [GuideController::class, 'store'])->name('guides.store');
        Route::get('edit/{id}', [GuideController::class, 'edit'])->name('guides.edit');
        Route::post('update/{id}', [GuideController::class, 'update'])->name('guides.update');
        Route::post('destroy/{id}', [GuideController::class, 'destroy'])->name('guides.delete');
    });
});
