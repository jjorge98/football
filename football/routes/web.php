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
        Route::post('/studentInfo', 'UserController@studentInfo');
        Route::post('/parentInfo', 'UserController@parentInfo');
        Route::post('/addressInfo', 'UserController@addressInfo');
        Route::get('/paymentRegister', 'UserController@paymentRegister')->name('paymentRegister');
        Route::get('/payment', 'UserController@payment')->name('payment');
        Route::post('/savePayment', 'UserController@savePayment')->name('savePayment');
        Route::post('/yearPayment', 'UserController@yearPayment')->name('yearPayment');
        Route::post('/deleteUser', 'UserController@deleteUser')->name('deleteUser');
        Route::get('/editStudent', 'UserController@editStudent')->name('editStudent');
        Route::post('/saveStudentData', 'UserController@saveStudentData')->name('saveStudentData');
    });
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/studentForm', 'StudentController@index')->name('student');
Route::post('/studentForm', 'StudentController@save')->name('studentsave');
