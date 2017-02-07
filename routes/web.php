<?php


Route::group(['middleware' => 'auth'],function(){

// Pages	
	Route::get('/dashboard', 'PagesController@dashboard');
	Route::get('/profile', 'PagesController@profile');
	Route::get('/messages', 'PagesController@messages');

	Route::get('notifications', ['uses' => 'PagesController@notifications','as' => 'notifications']);


	Route::get('/notifications/info/{id}', 'PagesController@notificationinfo');
	Route::get('/notifications/server/', 'PagesController@notificationServer');
	Route::get('/notifications/server/news/unread', 'PagesController@notificationNewsUnread');
	Route::get('/notifications/server/news/dropdown', 'PagesController@notificationNewsDropdown');


	
	Route::get('/notifications/markasread/', 'PagesController@notificationMarkAsRead');


	Route::post('/notifications/server/', 'PagesController@notificationPost');


	Route::get('/settings', 'PagesController@settings');

	Route::get('logout', 'Auth\LoginController@logout');
});



Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();







