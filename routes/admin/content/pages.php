<?php
Route::group(['as' => 'pages.', 'namespace' => 'Pages', 'prefix' => 'pages'], function() {

	/**
	 * Handle the 'view all pages' page.
	 *
	 * @since 1.0
	 */
	Route::get('/', ['as' => 'all', 'uses' => 'AllController@getAll']);

	/**
	 * Handle the 'create new page' page.
	 *
	 * @since 1.0
	 */
	Route::get('/create', ['as' => 'create', 'uses' => 'CreateController@getCreate']);
	Route::post('/create', ['as' => 'create', 'uses' => 'CreateController@postCreate']);

	/**
	 * Handle the 'edit page' page.
	 *
	 * @since 1.0
	 */
	Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'EditController@getEdit']);
	Route::post('/edit/{id}', ['as' => 'edit', 'uses' => 'EditController@postEdit']);

});