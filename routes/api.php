<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1'], function () {

    //Auth
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

    //error
    Route::get('/error', function () {
        return response()->json(['status' => 403, 'is_token_expired' => true]);
    });

    Route::middleware(['auth:api'])->group(function () {
        Route::get('profile', [AuthController::class, 'profile']);

        //Blogs
        Route::post('/blog/posts', [BlogController::class, 'blog']);
        Route::post('/blog/create', [BlogController::class, 'create']);
        Route::post('/blog/edit', [BlogController::class, 'edit']);
        Route::post('/blog/update', [BlogController::class, 'update']);
        Route::post('/blog/delete', [BlogController::class, 'delete']);
    });
});
