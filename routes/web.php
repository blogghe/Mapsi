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

Route::get('/contact','ContactFormController@create');
Route::post('/contact', 'ContactFormController@store');


//differently but cleaner written
Route::view( 'about', 'about' );

//User Pages
Route::view( 'user', 'userInfo' );

//Contacts
//Route::get( 'contacts', 'ContactsController@index' );
//Route::get( 'contacts/create', 'ContactsController@create' );
//Route::post( 'contacts', 'ContactsController@store' );
//Route::get( 'contacts/{contact}', 'ContactsController@show' );
//Route::get( 'contacts/{contact}/edit', 'ContactsController@edit' );
//Route::patch( 'contacts/{contact}', 'ContactsController@update' );
//Route::delete('contacts/{contact}','ContactsController@destroy');
Route::resource('contacts', 'ContactsController');

//Services
//Route::get( 'services', 'ServicesController@index' );
//Route::get( 'services/create', 'ServicesController@create' );
//Route::post( 'services', 'ServicesController@store' );
//Route::get( 'services/{service}', 'ServicesController@show' );
//Route::get( 'services/{service}/edit', 'ServicesController@edit' );
//Route::patch( 'services/{service}', 'ServicesController@update' );
//Route::delete('services/{service}','ServicesController@destroy');
Route::resource('services', 'ServicesController');

//Labels
//Route::get( 'labels', 'LabelsController@index' );
//Route::get( 'labels/create', 'LabelsController@create' );
//Route::post( 'labels', 'LabelsController@store' );
//Route::get( 'labels/{label}', 'LabelsController@show' );
//Route::get( 'labels/{label}/edit', 'LabelsController@edit' );
//Route::patch( 'labels/{label}', 'LabelsController@update' );
//Route::delete('labels/{label}','LabelsController@destroy');
Route::resource('labels', 'LabelsController');

//Problems
//Route::get( 'problems', 'ProblemsController@index' );
//Route::get( 'problems/create', 'ProblemsController@create' );
//Route::post( 'problems', 'ProblemsController@store' );
//Route::get( 'problems/{problem}', 'ProblemsController@show' );
//Route::get( 'problems/{problem}/edit', 'ProblemsController@edit' );
//Route::patch( 'problems/{problem}', 'ProblemsController@update' );
//Route::delete('problems/{problem}','ProblemsController@destroy');
Route::resource('problems', 'ProblemsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
