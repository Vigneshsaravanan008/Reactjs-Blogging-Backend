<?php

use App\Http\Controllers\Admin\AdminController;
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

Route::prefix(env('ADMIN_PREFIX'))->group(function () {
    Route::match(['get', 'post'], '/login', [AdminController::class, 'home'])->name('admin_login');
    Route::group(['middleware' => ['admin']], function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/file-manager', [AdminController::class, 'filemanager'])->name('admin.filemanager');
    });
});
