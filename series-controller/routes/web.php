<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticator;
use App\Mail\SeriesCreated;
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
    return redirect("/series");
});


Route::controller(SeriesController::class)->group(function () {
    Route::get('/series', "index")->name("series.index");
    Route::get('/series/create', "create");
    Route::post('/series/save', "store");
    Route::delete('/series/destroy/{id}', "destroy")->name("series.destroy");
    Route::patch('/series/update/{id}', "update")->name("series.update");
    Route::get("/series/edit/{id}", "edit")->name("series.edit");
});


Route::controller(SeasonsController::class)->group(function () {
    Route::get('/seasons/{series}/seasons', "index")->name("seasons.index");
});


Route::controller(EpisodesController::class)->group(function () {
    Route::get('/seasons/{season}/episodes', "index")->name("episodes.index");
    Route::post('/seasons/{season}/episodes', "update")->name("episodes.update");
});


Route::controller(LoginController::class)->group(function () {
    Route::get('/login', "index")->name("login");
    Route::post('/login', "store")->name("login.store");
    Route::get('/logout', "destroy")->name("login.destroy");
});


Route::controller(UserController::class)->group(function () {
    // Route::get('/user', "index")->name("user.index");
    Route::get('/user', "create")->name("user.create");
    Route::post('/user', "store")->name("user.store");
});

Route::get("/mail", function () {
    return view('mail.series-created');
});
