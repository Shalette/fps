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

Route::get('/', 'Pages@main')->name('main');

Route::get('/account', 'Pages@account')->name('account')->middleware('auth');
Route::post('/account', 'Update@newprofile')->name('newprofile')->middleware('auth');

Route::get('/change-password', 'Pages@change')->name('change')->middleware('auth');
Route::post('/change-password', 'Update@newpassword')->name('newpassword')->middleware('auth');

Route::get('/delete/{pub_id}', [
  'uses' => 'Update@delete' ,
  'as' => 'delete' ,
])->where('pub_id', '[1-9][0-9]*')->middleware('auth');

Route::get('/edit/{pub_id}', [
  'uses' => 'Pages@edit' ,
  'as' => 'edit' ,
])->where('pub_id', '[1-9][0-9]*')->middleware('auth');
Route::post('/edit', 'Update@newedit')->name('newedit')->middleware('auth');

Route::get('/faculty/{id}', [
  'uses' => 'Pages@faculty' ,
  'as' => 'faculty' ,
])->where('id', '[1-9][0-9]*');

Route::get('/publications', 'Pages@publish')->name('publish')->middleware('auth');
Route::post('/publications', 'Update@upload')->name('upload')->middleware('auth');

Auth::routes([
    'register' => false,
    'verify' => true,
  ]);
Route::get('/home', 'HomeController@index')->name('home');
