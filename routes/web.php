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
use App\Title;

Route::get('/', function () {
    if (Auth::user()) {
        return view('home')->with('vacations', Auth::user()->vacation()->get());
    }
    return view('welcome');
});

Route::get('/welcomeNewUser', function () {
    return view('auth.welcomeNew');
})->middleware('auth');

Route::get('/new_vacation', 'VacationController@index')->middleware('auth');

Route::post('/new_vacation', 'VacationController@store')->middleware('auth');

Auth::routes();

Route::get('/allvacations','VacationController@list')->middleware('auth');

Route::get('/home', 'HomeController@index');

Route::get('debug', function () {
    $provider = \Michalmanko\Holiday\HolidayFactory::createProvider('SK');
    return $holidays = $provider->getHolidays(new \DateTime('2017-05-01'));
});
