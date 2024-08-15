<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\OauthController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);

// 
Route::middleware('auth:sanctum')->group(function () {
    Route::put('/updateprofile', [ProfileController::class, 'update']);
    Route::get('/users', [ProfileController::class, 'listUsers']);
    Route::get('/profile', [ProfileController::class, 'show']);
    Route::put('/definepassword', [ProfileController::class, 'definepassword']);
});

Route::get('auth/{provider}/redirect', [OauthController::class, 'redirectToProvider']);
Route::get('auth/{provider}/callback', [OauthController::class, 'handleProviderCallback']);

