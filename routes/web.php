<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::match(['get', 'post'], '/', [AdminController::class, 'home'])->name('admin.login');
Route::group(['middleware' => ['admin']], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    //Users
    Route::get('/users',[UserController::class,'index'])->name('user.index');

    //Settings
    Route::get('/setting', [SettingController::class, 'setting'])->name('admin.settings');
    Route::get('/setting/store', [SettingController::class, 'store'])->name('settings.store');

    //Profile
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/profile/update', [AdminController::class, 'profileupdate'])->name('admin.profile.update');
    Route::get('/password/update', [AdminController::class, 'passwordsettings'])->name('admin.profile.setting');
});

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
