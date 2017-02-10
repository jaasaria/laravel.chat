<?php


Route::group(['middleware' => 'auth'],function(){

// Pages	
	Route::get('/dashboard', 'PagesController@dashboard');

	Route::get('/profile', 'ProfileController@index');
	Route::post('/profile', ['uses' => 'ProfileController@update','as' => 'profile.update']);


	Route::get('notifications', ['uses' => 'PagesController@notifications','as' => 'notifications']);
	Route::get('notifications/info/{data}', ['uses' => 'PagesController@notificationinfo','as' => 'notificationinfo']);
	Route::get('/notifications/server/', 'PagesController@notificationServer');
	Route::get('/notifications/server/news/unread', 'PagesController@notificationNewsUnread');
	Route::get('/notifications/server/news/dropdown', 'PagesController@notificationNewsDropdown');
	Route::post('/notifications/server/', 'PagesController@notificationPost');


	Route::get('/settings', 'PagesController@settings');
	Route::get('/messages', 'PagesController@messages');
	Route::get('logout', 'Auth\LoginController@logout');

});


// Route::get('login', array('uses' => 'HomeController@showLogin'));

// // route to process the form
// Route::post('login', array('uses' => 'HomeController@doLogin'));



Route::get('/', ['middleware' => 'guest', function()
{
    return view('auth.login');
}]);
Auth::routes();







