<?php
Route::group(['as' => 'users.', 'namespace' => 'Users', 'prefix' => 'users'], function() {

	/**
	 * Handle the 'view all users' page.
	 *
	 * @since 1.0
	 */
	Route::get('/', ['as' => 'all', 'uses' => 'AllController@getAll']);

});