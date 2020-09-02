<?php

use App\Http\Controllers\StaffController;
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
Route::post($dir.'/', 'StaffController@add');
Route::get($dir.'del/{id}/', 'StaffController@delete')->name('edelete');
// Route::get($dir.'edit/{id}/', 'StaffController@edit')
Route::get($dir.'find/{id}', function($id){
    $employee = \App\Staff::find($id);
    return redirect()->route('home', ['foundEmployee' => ['id' => $employee->id, 'name' => $employee->name, 'surname' => $employee->surname, 'job_des' => $employee->job_description]]);
})->name('findEmployee');
Route::put($dir.'upd/{id}/', 'StaffController@update')->name('employee.update');


Route::get($dir.'projects/', 'ProjectsController@show')->name('projects');
Route::post($dir.'projects/', 'ProjectsController@add');
Route::get($dir.'projects/del/{id}/', 'ProjectsController@delete')->name('pdelete');
Route::get($dir.'projects/find/{id}', function($id){
    $project = \App\Projects::find($id);
    return redirect()->route('projects', ['foundProject' => ['id' => $project->id, 'title' => $project->title, 'deadline' => $project->deadline]]);
})->name('findProject');
Route::put($dir.'/projects/upd/{id}/', 'ProjectsController@update')->name('project.update');






