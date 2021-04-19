<?php

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
    return redirect('/register');
});

Route::get('/registrationform', function () {
    return view('registrationform');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('{path}',"HomeController@index")->where('path','([A-z\d\-\/_.]+)?' );
Route::get('/{any}', [App\Http\Controllers\HomeController::class, 'index'])->where('any', '.*');