<?php

use App\Http\Controllers\Api\PlayController;
use App\Http\Controllers\Api\PredictionController;
use App\Http\Controllers\Api\SeasonController;
use App\Http\Controllers\Api\SimulationController;
use App\Http\Controllers\Api\WeekController;
use App\Http\Controllers\Api\WeeklyStandingController;
use App\Models\Prediction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('/season', SeasonController::class)->only([
  'index', // lists all seasons
  'store', // to start new season
]);
Route::get('/week/{season}', [WeekController::class, 'index']);
Route::get('/weekly-standings/{week}', [WeeklyStandingController::class, 'index']);
Route::apiResource('/plays/{week}', PlayController::class)->only([
  'index', 'update'
]);
Route::get('/prediction/{season}', [PredictionController::class, 'index']);
Route::post('/simulate/season/{season}', [SimulationController::class, 'simulateSeason']);
Route::post('/simulate/week/{week}', [SimulationController::class, 'simulateWeek']);
