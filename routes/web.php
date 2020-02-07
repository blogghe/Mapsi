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
Route::view( 'viewContact', 'contact.view' );
Route::get( 'listContacts', 'ContactsController@listContacts' );
Route::post( 'listContacts', 'ContactsController@createContact' );
Route::view( 'createContact', 'contact.create' );

//Services
Route::view( 'viewService', 'service.view' );
Route::get( 'listServices', 'ServicesController@listServices' );
Route::post( 'listServices', 'ServicesController@createService' );
Route::view( 'createService', 'service.create' );

//Labels
Route::view( 'viewLabel', 'label.view' );
Route::get( 'listLabels', 'LabelsController@listLabels' );
Route::post( 'listLabels', 'LabelsController@createLabel' );
Route::view( 'createLabel', 'label.create' );

//Problems
Route::view( 'viewProblem', 'problem.view' );
Route::get( 'listProblems', 'ProblemsController@listProblems' );
Route::post( 'listProblems', 'ProblemsController@createProblem' );
Route::view( 'createProblem', 'problem.create' );