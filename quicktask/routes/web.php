<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
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
Route::resources([
    'products' => 'ProductController',
    'types' => 'TypeController',
]);
Route::get('/languages/{language}', 'LanguageController@change')->middleware('Locale')->name('language');
Route::get('show-user/{id}', 'AccountController@showUser')->name('show.user');
Route::get('show-role/{id}', 'AccountController@showRole')->name('show.role');
Route::get('pivot/{id}', 'AccountController@testPivot')->name('pivot');

