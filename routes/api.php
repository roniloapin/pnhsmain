<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\LearnerTypeController;
use App\Http\Controllers\API\ReligionController;
use App\Http\Controllers\API\MotherTongueController;
use App\Http\Controllers\API\StrandController;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\SchoolyearController;
use App\Http\Controllers\API\SubjectController;
use App\Http\Controllers\API\RoomController;
use App\Http\Controllers\API\ScheduleController;
use App\Http\Controllers\API\AnnouncementController;
use App\Http\Controllers\API\PublicAnnouncementController;
use Illuminate\Support\Facades\Auth;






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
Route::get('teacher', [UserController::class, 'indexTeacher']);


Route::apiResource('learner_type', LearnerTypeController::class);
Route::get('findLearnerType', [LearnerTypeController::class, 'search']);

Route::apiResource('religion', ReligionController::class);
Route::get('findReligion', [ReligionController::class, 'search']);

Route::apiResource('mother_tongue', MotherTongueController::class);
Route::get('findMotherTongue', [MotherTongueController::class, 'search']);

Route::apiResource('strand', StrandController::class);
Route::get('findStrand', [StrandController::class, 'search']);

Route::apiResource('approved_student', StudentController::class);
Route::apiResource('pending_student', StudentController::class);
// Route::apiResource('student', StudentController::class);
Route::get('shsstudent', [StudentController::class, 'indexSHS']);
Route::get('findStudent', [StudentController::class, 'search']);
Route::apiResource('student', StudentController::class);

Route::apiResource('schoolyear', SchoolyearController::class);
Route::get('findSchoolyear', [SchoolyearController::class, 'search']);

Route::apiResource('subject', SubjectController::class);
Route::get('findSubject', [SubjectController::class, 'search']);

Route::apiResource('room', RoomController::class);
Route::get('findRoom', [RoomController::class, 'search']);

Route::apiResource('schedule', ScheduleController::class);
Route::get('scheduleSHS', [ScheduleController::class,'indexSHS']);
Route::get('findSchedule', [ScheduleController::class, 'search']);

Route::apiResource('announcement', AnnouncementController::class);
Route::get('findAnnouncement', [AnnouncementController::class, 'search']);

Route::apiResource('publicannouncement', PublicAnnouncementController::class);
Route::get('findPublicAnnouncement', [PublicAnnouncementController::class, 'search']);