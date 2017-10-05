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


// test表示用
Route::get('/bbc/test', function() {
    return view('bbc.test', ['name' => 'James']);
});


// 簡単フォーム用
Route::group(['as' => 'form::'], function() {
    // 入力画面
    Route::get('/input', ['as' => 'input', 'uses' => 'FormController@input']);
    // 完了画面
    Route::post('/save', ['as' => 'save', 'uses' => 'FormController@save']);
});


// 掲示板用
Route::get('/bbc', function() {
    return view('bbc.index');
});
Route::get('bbc/category/{id}', 'PostsController@showCategory');
Route::resource('bbc', 'PostsController');
Route::resource('comment', 'CommentsController',['only' => ['store']]);
