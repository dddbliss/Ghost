<?php
Route::group(['as' => 'pets.', 'namespace' => 'Pets', 'prefix' => 'pets'], function() {

	/**
	 * Handle the 'view all pets' page.
	 *
	 * @since 1.0
	 */
	Route::get('/', ['as' => 'all', 'uses' => 'AllController@getAll']);

	/**
	 * Handle the 'create new pet' page.
	 *
	 * @since 1.0
	 */
	Route::get('/create', ['as' => 'create', 'uses' => 'CreateController@getCreate']);
	Route::post('/create', ['as' => 'create', 'uses' => 'CreateController@postCreate']);

	/**
	 * Handle the 'edit pet' page.
	 *
	 * @since 1.0
	 */
	Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'EditController@getEdit']);
	Route::post('/edit/{id}', ['as' => 'edit', 'uses' => 'EditController@postEdit']);

});