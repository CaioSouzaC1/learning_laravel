<?php

use App\Http\Controllers\ApiController;
use App\Models\Episodes;
use App\Models\Season;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::controller(ApiController::class)->group(function () {
//     Route::get('/', "index")->name("api.index");
//     Route::post('/series', "store")->name("api.store");

Route::apiResource("/series", ApiController::class);
Route::get("/series/{serie}/seasons", function (Serie $serie) {
    return $serie->seasons;
});

Route::get("/series/{serie}/episodes", function (Season $season) {
    return $season->episodes;
});

Route::patch("/episodes/{episode}", function (Episodes $episode, Request $request) {
    $episode->watched = $request->watched;
    $episode->save();

    return $episode;
});
