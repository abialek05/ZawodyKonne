<?php

use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\CompetitionEntryController;
use App\Http\Controllers\HorseController;
use App\Http\Controllers\RiderController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});
Route::get('/horses', [HorseController::class, "Index"]);
Route::get('/horses/edit/{id}', [HorseController::class, 'edit']);
Route::post('/horses/update/{id}', [HorseController::class, 'update']);
Route::get('/horses/delete/{id}', [HorseController::class, 'delete']);
Route::get('/horses/create', [HorseController::class, 'create']);
Route::post('/horses/create', [HorseController::class, 'addToDB']);
Route::post('/horses/validateModel', [HorseController::class, "validateModel"]);

Route::get('/riders', [RiderController::class, "Index"]);
Route::get('/riders/edit/{id}', [RiderController::class, 'edit']);
Route::post('/riders/update/{id}', [RiderController::class, 'update']);
Route::get('/riders/delete/{id}', [RiderController::class, 'delete']);
Route::get('/riders/create', [RiderController::class, 'create']);
Route::post('/riders/create', [RiderController::class, 'addToDB']);
Route::post('/riders/validateModel', [RiderController::class, "validateModel"]);

Route::get('/competitions', [CompetitionController::class, "Index"]);
Route::get('/competitions/edit/{id}', [CompetitionController::class, 'edit']);
Route::post('/competitions/update/{id}', [CompetitionController::class, 'update']);
Route::get('/competitions/delete/{id}', [CompetitionController::class, 'delete']);
Route::get('/competitions/create', [CompetitionController::class, 'create']);
Route::post('/competitions/create', [CompetitionController::class, 'addToDB']);
Route::post('/competitions/validateModel', [CompetitionController::class, "validateModel"]);

Route::post('/competitions/filterByType', 'CompetitionController@filterByType');
Route::post('/competitions/filterByType', [CompetitionController::class, "filterByType"]);
Route::post('/competitions/filterByType', 'CompetitionController@filterByType')->name('competition.filterByType');
Route::post('/competitions/search', 'CompetitionController@search')->name('competition.search');
Route::get('/competitions', [CompetitionController::class, "Index"])->name('competition.index');

Route::get('/competition-entries', [CompetitionEntryController::class, "Index"])->name('competition-entries.index');
Route::post('/competition-entries/update/{id}', [CompetitionEntryController::class, 'update'])->name('competition-entries.update');
Route::get('/competition-entries/edit/{id}', [CompetitionEntryController::class, 'edit']);
Route::get('/competition-entries/delete/{id}', [CompetitionEntryController::class, 'delete']);
Route::post('/competition-entries/validateModel', [CompetitionEntryController::class, "validateModel"]);
Route::get('/competition-entries/create', [CompetitionEntryController::class, 'create']);
Route::post('/competition-entries/create', [CompetitionEntryController::class, 'addToDB']);


