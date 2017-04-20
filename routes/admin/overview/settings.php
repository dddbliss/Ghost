<?php
Route::group(['as' => 'settings.', 'namespace' => 'Settings', 'prefix' => 'settings', 'middleware' => []], function() {

	/**
	 * Handle the 'general settings' page.
	 *
	 * @since 1.0
	 */
	Route::get('/', ['as' => 'general', 'uses' => 'GeneralController@getGeneral']);
	Route::post('/', ['as' => 'general', 'uses' => 'GeneralController@postGeneral']);
	
});