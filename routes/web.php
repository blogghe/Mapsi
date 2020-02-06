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
	return view( 'welcome' );
} );

Route::get( 'contact', function () {
	return view( 'contact' );
} );
//differently but cleaner written
Route::view( 'about', 'about' );

//User Pages
Route::view( 'user', 'userInfo' );

//Contacts
Route::view( 'viewContact', 'contact.view' );
Route::view( 'ListContact', 'contact.list' );
Route::view( 'CreateContact', 'contact.create' );

//Services
Route::view( 'viewService', 'service.view' );
Route::view( 'ListService', 'service.list' );
Route::view( 'CreateService', 'service.create' );

//Labels
Route::view( 'viewLabel', 'label.view' );
Route::view( 'ListLabel', 'label.list' );
Route::view( 'CreateLabel', 'label.create' );

//Problems
Route::view( 'viewProblem', 'problem.view' );
Route::view( 'ListProblem', 'problem.list' );
Route::view( 'CreateProblem', 'problem.create' );