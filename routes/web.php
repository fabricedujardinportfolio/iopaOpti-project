<?php

use App\Http\Controllers\AgentAuthController;
use App\Http\Controllers\CreateReservationController;
use App\Http\Controllers\FicheController;
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



Auth::routes();


Route::get('login',[AgentAuthController::class,"login"])->name('')->middleware('AlreadyLoggedIn');
Route::get('logout',[AgentAuthController::class,"logout"])->name('logout');
Route::post('check',[AgentAuthController::class,"check"])->name('auth.check');

// Route tout role
Route::get('/', [AgentAuthController::class,"home"])->name("accueil")->middleware('isLogged');
Route::get('/addCandidate', [AgentAuthController::class,"read"])->name("readaddCandidate")->middleware('isLogged');
Route::post('/addCandidate',[AgentAuthController::class,"add"])->name("addPost")->middleware('isLogged');



Route::get('/addCandidate/{name_individu}', [AgentAuthController::class,"addCandidate"])->name("addCandidate")->middleware('isLogged');

Route::resource('fiche',FicheController::class)->except('index');

Route::get('fiche/{id}', [FicheController::class,"show"])->name("showFiche")->middleware('isLogged');
Route::post('fiche/{id}', [FicheController::class,"updateIndividu"])->name("updateFiche")->middleware('isLogged');
Route::get('fiche/diplomeDest/{id}', [FicheController::class,"destroy"])->name("destroyDiplome")->middleware('isLogged');
Route::get('fiche/permisDest/{id}', [FicheController::class,"destroypermi"])->name("destroyPermi")->middleware('isLogged');
Route::get('fiche/experDest/{id}', [FicheController::class,"destroyexperience"])->name("destroyExper")->middleware('isLogged');
Route::post('fiche/diplomeUpdate/{id}', [FicheController::class,"update"])->name("updateDiplomeFiche")->middleware('isLogged');
Route::post('fiche/permiUpdate/{id}', [FicheController::class,"updatepermi"])->name("updatePermiFiche")->middleware('isLogged');
Route::post('fiche/experUpdate/{id}', [FicheController::class,"updateExper"])->name("updateExperFiche")->middleware('isLogged');
// Route::upda('fiche/{id}', [FicheController::class,"updateDiplomeIndividu"])->name("updateDiplomeFiche")->middleware('isLogged');
Route::get('fiche/ficheCandidate/{id}', [FicheController::class,"addFicheCandidat"])->name("addFicheCandidat")->middleware('isLogged');


Route::post('/autocompletee',[FicheController::class,"autocompletee"])->name("searchAjaxautocompletetes")->middleware('isLogged');
// Route::get('/dashboard/{id}', [listingStudentController::class, 'showTable'])->name('dashboard-formation');
// AJAX

Route::post('/autocomplete',[CreateReservationController::class,"autocomplete"])->name("searchAjaxautocomplete")->middleware('isLogged');