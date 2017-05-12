<?php

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


use App\Http\Controllers\VacationController;
use App\Vacation;

Route::get('/', function () {
    if (Auth::user()) {
        return view('home')->with('vacations', Auth::user()->getLastVacations());
    }
    return view('welcome');
});

Route::get('welcomeNewUser', function () {
    return view('auth.welcomeNew');
})->middleware('auth');

Route::get('new_vacation', 'VacationController@create')->middleware('auth');

Route::post('new_vacation', 'VacationController@store')->middleware('auth');

Auth::routes();

Route::get('all_vacations', 'VacationController@index')->middleware('auth');

Route::get('home', 'HomeController@index');
Route::get('debug', 'VacationController@freeDays');

Route::get('vacation_detail/{id}', ['uses' =>'VacationController@show']);

Route::post('declineVacation/{id}','VacationController@declineVacation' )->middleware('admin');
Route::post('confirmVacation/{id}','VacationController@confirmVacation' )->middleware('admin');
Route::post('cancelVacation/{id}','VacationController@cancelVacation' );

Route::get('vacation_administration','VacationController@admin')->middleware('admin');

Route::get('profile', 'Auth\UserController@show');