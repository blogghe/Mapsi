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
Route::view( 'listContact', 'contact.list' );
Route::view( 'createContact', 'contact.create' );

//Services
Route::view( 'viewService', 'service.view' );
Route::view( 'listService', 'service.list' );
Route::view( 'createService', 'service.create' );

//Labels
Route::view( 'viewLabel', 'label.view' );
Route::view( 'listLabel', 'label.list', [ 'labels' => [ 'label1', 'label2', 'label3' ] ] );
Route::view( 'createLabel', 'label.create' );

//Problems
Route::view( 'viewProblem', 'problem.view' );
Route::view( 'listProblem', 'problem.list' );
Route::view( 'createProblem', 'problem.create' );