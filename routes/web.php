<?php

Route::get('/', function () {
    return view('welcome');
});


Route::get('facebook/redirect', 'FacebookAuthController@redirectToProvider'); 

Route::get('facebook/redirect/callback', 'FacebookAuthController@handleProviderCallback'); 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('posts',"FacebookController@displayUserPosts"); 
