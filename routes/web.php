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

// Route tout role
Route::get('/', [AgentAuthController::class,"profilereservation"])->name("accueil")->middleware('isLogged');
Route::get('/addCandidate', [AgentAuthController::class,"read"])->name("readaddCandidate")->middleware('isLogged');
Route::post('/addCandidate',[AgentAuthController::class,"add"])->name("addPost")->middleware('isLogged');