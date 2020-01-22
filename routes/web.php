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

Route::get('/', function () {
    return redirect('notes');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/library', [
    'uses' => 'LibraryController@index',
    'as' => 'library.index'
]);

Route::get('/notes', [
    'uses' => 'NoteController@index',
    'as' => 'notes.index'
]);

Route::post('/note', [
    'uses' => 'NoteController@store',
    'as' => 'notes.store'
]);

Route::post('/note/{note}/edit', [
    'uses' => 'NoteController@edit',
    'as' => 'notes.edit'
]);

Route::delete('/note/{note}', [
    'uses' => 'NoteController@destroy',
    'as' => 'notes.destroy'
]);

Route::get('/library', [
    'uses' => 'LibraryController@index',
    'as' => 'library.index'
]);