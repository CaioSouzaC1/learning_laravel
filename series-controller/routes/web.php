<?php

use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
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
    // return view('welcome');

    return redirect("/series");
});


Route::controller(SeriesController::class)->group(function () {
    Route::get('/series', "index");
    Route::get('/series/create', "create");
    Route::post('/series/save', "store");
    Route::delete('/series/destroy/{id}', "destroy")->name("series.destroy");
    Route::patch('/series/update/{id}', "update")->name("series.update");
    Route::get("/series/edit/{id}", "edit")->name("series.edit");
});


Route::controller(SeasonsController::class)->group(function () {
    Route::get('/seasons/{series}/seasons', "index")->name("seasons.index");
});
