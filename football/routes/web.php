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

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('/user')->group(function () {
        Route::get('/home', 'UserController@index')->name('homeUser');
        Route::get('/register', 'UserController@register')->name('studentRegister');
        Route::get('/studentList', 'UserController@studentList')->name('studentList');
    });
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/studentForm', 'StudentController@index')->name('student');
Route::post('/studentForm', 'StudentController@save')->name('studentsave');
