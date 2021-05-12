<?php

use Illuminate\Support\Facades\Route;
use App\Models\Religion;
use App\Models\LearnerType;
use App\Models\MotherTongue;
use App\Models\Strand;
use App\Models\Schoolyear;

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
    return redirect('/registrationform');
});


Route::get('/registrationform', function () {
    $religions = Religion::all();
    $learnerTypes = LearnerType::all();
    $motherTongues = MotherTongue::all();
    $strands = Strand::all();
    // $schoolyears = Schoolyear::all();
    $schoolyears = Schoolyear::where('schoolyear_status', 'Active')->get();
    return view('registrationform')->with(['religions' => $religions, 'learnerTypes' => $learnerTypes, 'motherTongues' => $motherTongues, 'strands' => $strands, 'schoolyears' => $schoolyears]);
    
});
// Route::get('/students', function () {
//     $religions = Religion::all();
//     $learnerTypes = LearnerType::all();
//     $motherTongues = MotherTongue::all();
//     $strands = Strand::all();
//     $schoolyears = Schoolyear::all();
//     return view('/students')->with(['religions' => $religions, 'learnerTypes' => $learnerTypes, 'motherTongues' => $motherTongues, 'strands' => $strands, 'schoolyears' => $schoolyears]);
// });
Route::post('/registrationform', [App\Http\Controllers\API\StudentController::class, 'store'])->name('registrationform');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('{path}',"HomeController@index")->where('path','([A-z\d\-\/_.]+)?' );
Route::get('/{any}', [App\Http\Controllers\HomeController::class, 'index'])->where('any', '.*');