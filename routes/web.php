<?php

use App\Http\Controllers\AgentAuthController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('login',[AgentAuthController::class,"login"])->name('login')->middleware('AlreadyLoggedIn');
Route::get('logout',[AgentAuthController::class,"logout"])->name('logout');
Route::post('check',[AgentAuthController::class,"check"])->name('auth.check');
