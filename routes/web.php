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
Route::get('/', function () {
    return view('welcome');
});

Route::get('contact', function (){
	return 'Contacteer ons';
});

Route::get('about', function (){
	return 'Over ons';
});

//User Pages
Route::get('user', function (){
	return 'gebruikers_info';
});

//Contacts
Route::get('viewContact', function (){
	return 'Contact info';
});
Route::get('ListContact', function (){
	return 'Lijst van contacts';
});
Route::get('CreateContact', function (){
	return 'Maak ontact';
});

//Services
Route::get('viewService', function (){
	return 'Service info';
});
Route::get('ListService', function (){
	return 'Lijst van services';
});
Route::get('CreateService', function (){
	return 'Maak service';
});

//Labels
Route::get('viewLabel', function (){
	return 'Contact info';
});
Route::get('ListLabel', function (){
	return 'Lijst van contacts';
});
Route::get('CreateLabel', function (){
	return 'Maak contact';
});

//Problems
Route::get('viewProblem', function (){
	return 'Probleem info';
});
Route::get('ListProblem', function (){
	return 'Lijst van problemen';
});
Route::get('CreateProblem', function (){
	return 'Maak probleem';
});