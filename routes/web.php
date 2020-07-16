<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('projects', 'ProjectController');

Route::post('projects/{project}/tasks/{task}/status', 'ProjectTaskController@changeStatus')->name('change_status');

Route::resource('projects.tasks', 'ProjectTaskController');

Auth::routes();

Route::get('/storage/{task}', 'DownloadController')->name('download');

Route::get('/home', 'HomeController@index')->name('home');
