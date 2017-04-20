<?php
Route::group(['as' => 'dashboard.', 'namespace' => 'Dashboard', 'prefix' => '', 'middleware' => []], function() {

	/**
	 * Handle the home page.
	 *
	 * @since 1.0
	 */
	Route::get('/', ['as' => 'home', 'uses' => 'HomeController@getHome']);
	
});