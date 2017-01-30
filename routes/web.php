<?php


Route::group(['middleware' => 'auth'],function(){

// Pages	
	Route::get('/dashboard', 'PagesController@dashboard');
	Route::get('/profile', 'PagesController@profile');
	Route::get('/messages', 'PagesController@messages');

	Route::get('/notifications', 'PagesController@notifications');
	Route::get('/notifications/info/{id}', 'PagesController@notificationinfo');

	Route::get('/settings', 'PagesController@settings');

	Route::get('logout', 'Auth\LoginController@logout');
});



Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();







