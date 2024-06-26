<?php

use App\Http\Controllers\Admin\DashboardController;
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
    return redirect()->route('web.files.index');
});

Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@register');

Route::prefix('/admin')->name('admin.')->group(function () {
    Route::prefix('/files')->name('files.')->group(function () {
        Route::get('/', 'App\Http\Controllers\Admin\DashboardController@index')->name('index')->middleware('auth');
        Route::get('/create', 'App\Http\Controllers\Admin\FilesController@create')->name('create');
        Route::post('/', 'App\Http\Controllers\Admin\FilesController@createPost')->name('createPost');
        Route::get('/update/{id}', 'App\Http\Controllers\Admin\FilesController@update')->name('update');
        Route::post('/update/{id}', 'App\Http\Controllers\Admin\FilesController@updatePost')->name('updatePost');
        Route::get('/delete/{id}', 'App\Http\Controllers\Admin\FilesController@delete')->name('delete');
        Route::get('/close/{id}', 'App\Http\Controllers\Admin\FilesController@closefl')->name('closefl');
    });
    Route::prefix('/filecategories')->name('filecategories.')->group(function () {
        Route::get('/', 'App\Http\Controllers\Admin\DashboardController@categoryindex')->name('index')->middleware('auth');
        Route::get('/create', 'App\Http\Controllers\Admin\FileCategoriesController@create')->name('create');
        Route::post('/', 'App\Http\Controllers\Admin\FileCategoriesController@createPost')->name('createPost');
        Route::get('/update/{id}', 'App\Http\Controllers\Admin\FileCategoriesController@update')->name('update');
        Route::post('/update/{id}', 'App\Http\Controllers\Admin\FileCategoriesController@updatePost')->name('updatePost');
        Route::get('/delete/{id}', 'App\Http\Controllers\Admin\FileCategoriesController@delete')->name('delete');
    });
});
Route::prefix('/web')->name('web.')->group(function () {
    Route::prefix('/files')->name('files.')->group(function () {
        Route::get('/', 'App\Http\Controllers\Web\FilesController@index')->name('index');
        Route::get('/show/{id}', 'App\Http\Controllers\Web\FilesController@show')->name('show');
    });
});
