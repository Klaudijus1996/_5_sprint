<?php

use Illuminate\Support\Facades\Route;
use App\pages;

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

$dir = '/_5_sprint/';
Route::get($dir.'/', 'StaffController@show')->name('home');
Route::get($dir.'projects/', 'ProjectsController@show')->name('projects');
Route::post($dir.'/', 'StaffController@add');
Route::post($dir.'projects/', 'ProjectsController@add');



