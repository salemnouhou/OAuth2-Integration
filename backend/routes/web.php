<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\OauthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route::get('auth/{provider}/redirect', [OauthController::class, 'redirectToProvider']);
// Route::get('auth/{provider}/callback', [OauthController::class, 'handleProviderCallback']);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
