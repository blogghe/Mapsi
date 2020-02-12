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

use Illuminate\Support\Facades\Route;

//general pages
Route::get( '/', function () {
    return view( 'home' );
} );

Route::get( 'contact', function () {
    return view( 'contact' );
} );
//differently but cleaner written
Route::view( 'about', 'about' );

//User Pages
Route::view( 'user', 'userInfo' );

//Contacts
Route::get( 'contacts', 'ContactsController@index' );
Route::get( 'contacts/create', 'ContactsController@create' );
Route::post( 'contacts', 'ContactsController@store' );
Route::get( 'contacts/{contact}', 'ContactsController@show' );

//Services
Route::get( 'services', 'ServicesController@index' );
Route::get( 'services/create', 'ServicesController@create' );
Route::post( 'services', 'ServicesController@store' );
Route::get( 'services/{service}', 'ServicesController@show' );

//Labels
Route::get( 'labels', 'LabelsController@index' );
Route::get( 'labels/create', 'LabelsController@create' );
Route::post( 'labels', 'LabelsController@store' );
Route::get( 'labels/{label}', 'LabelsController@show' );

//Problems
//Route::get( 'problems', 'ProblemsController@index' );
//Route::get( 'problems/create', 'ProblemsController@create' );
//Route::post( 'problems', 'ProblemsController@store' );
//Route::get( 'problems/{problem}', 'ProblemsController@show' );
//Route::get( 'problems/{problem}/edit', 'ProblemsController@edit' );
//Route::patch( 'problems/{problem}', 'ProblemsController@update' );
//Route::delete('problems/{problem}','ProblemsController@destroy');

Route::resource('problems', 'ProblemsController');
