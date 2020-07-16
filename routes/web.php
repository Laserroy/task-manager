<?php

use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::group(
    [
        'middleware' => ['auth']
    ],
    function () {
        Route::resource('projects', 'ProjectController')->except(['edit', 'update']);
        Route::post('projects/{project}/tasks/{task}/status', 'ProjectTaskController@changeStatus')
            ->name('change_status');
        Route::resource('projects.tasks', 'ProjectTaskController');
        Route::get('/storage/{task}', 'DownloadController')->name('download');
    }
);

Route::get('/home', 'HomeController@index')->name('home');
