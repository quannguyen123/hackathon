<?php

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
// use App\Http\Controllers\Admin\BasicController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::prefix('basic')->group(function() {
        Route::get('list', [App\Http\Controllers\Admin\BasicController::class, 'list'])->name('basic-list');

        Route::get('add', [App\Http\Controllers\Admin\BasicController::class, 'getAdd'])->name('basic-add');
        Route::post('add', [App\Http\Controllers\Admin\BasicController::class, 'postAdd'])->name('post-basic-add');

        Route::get('edit/{postMeta}', [App\Http\Controllers\Admin\BasicController::class, 'getEdit'])->name('basic-edit');
        Route::post('edit/{postMeta}', [App\Http\Controllers\Admin\BasicController::class, 'postEdit'])->name('post-basic-edit');

        Route::get('delete/{postMeta}', [App\Http\Controllers\Admin\BasicController::class, 'delete'])->name('basic-delete');
    });
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