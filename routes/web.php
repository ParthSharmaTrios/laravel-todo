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
    return view('welcome');
});



//Route::group(['prefix'=>'task','middleware'=>'auth'],function(){
Route::group(['prefix'=>'task'],function(){

    Route::get('/add','TasksController@add');
    Route::post('/store','TasksController@store');

    Route::get('/list','TasksController@index');

    Route::get('/delete/{task_id}','TasksController@delete');

    Route::get('/update/{task}','TasksController@update');
    Route::post('/update/{id}','TasksController@updateTask');

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
