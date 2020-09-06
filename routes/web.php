<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Auth::routes();

Route::get('/', 'PostController@index')->name('posts');

Route::post('/posts/add', 'PostController@store')->name('/posts/add')->middleware('auth');
Route::get('posts/{id}', 'PostController@show')->name('post_id');
Route::post('/posts/{id}/addComment', 'CommentController@store')->name('add_comment');
