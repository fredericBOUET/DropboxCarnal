<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DropboxController;
use App\Http\Controllers\LoginController;
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

Route::get('/', function () {
    return view('connexion');
});


Route::get('/dropboxForm', [DropboxController::class, 'dropboxForm']);



Route::post('/postFormDropbox', [DropboxController::class, 'testPost']);

Route::post('user/login/{id}',[LoginController::class, 'AjaxSignIn']);

Route::get('/redirect', [LoginController::class, 'redirectToProvider']);
Route::get('/callback', [LoginController::class, 'handleProviderCallback']);
Route::get('/dashboard', [LoginController::class, 'confirmLogin']);
Route::get("/logout", [LoginController::class, 'logout']);


