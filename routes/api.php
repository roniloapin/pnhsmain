<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\LearnerTypeController;
use App\Http\Controllers\API\ReligionController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('user', UserController::class);
// Route::get('findUser', 'API\UserController@search');
Route::get('findUser', [UserController::class, 'search']);
Route::get('profile', [UserController::class, 'profile']);


Route::apiResource('learner_type', LearnerTypeController::class);
Route::get('findLearnerType', [LearnerTypeController::class, 'search']);

Route::apiResource('religion', ReligionController::class);
Route::get('findReligion', [ReligionController::class, 'search']);

