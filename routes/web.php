<?php

use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;
use App\Projects;
use App\Staff;

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
Route::post($dir.'/', 'StaffController@add');
Route::get($dir.'del/{id}/', 'StaffController@delete')->name('edelete');
Route::get($dir.'find/{id}/', 'StaffController@find')->name('findEmployee');
Route::put($dir.'upd/{id}/', 'StaffController@update')->name('employee.update');


Route::get($dir.'projects/', function() {
    $link = preg_match('/\?add/i', $_SERVER['REQUEST_URI']) ? preg_replace('/\?add/i', '', $_SERVER['REQUEST_URI']) : NULL ;
    $group = DB::select(DB::raw("SELECT projects.id, title, GROUP_CONCAT(' ',CONCAT_WS(' ', ".'name'.", surname)) as fullname, deadline FROM projects left join staff on projects.id = staff.project_id
    GROUP BY projects.id;"));
    return view('projects', ['projects' => $group, 'staff' => \App\Staff::all(), 'link' => $link]);
})->name('projects');
Route::post($dir.'projects/', 'ProjectsController@store')->name('add.project');
Route::get($dir.'projects/del/{id}/', 'ProjectsController@delete')->name('pdelete');
Route::get($dir.'projects/find/{id}/', 'ProjectsController@find')->name('findProject');
Route::put($dir.'projects/upd/{id}/', 'ProjectsController@update')->name('project.update');
Route::get($dir.'projects/finde/{id}/', 'ProjectsController@getID')->name('get.project.id');
Route::put($dir.'projects/assign/{id}', 'ProjectsController@assign')->name('assign.employee');






