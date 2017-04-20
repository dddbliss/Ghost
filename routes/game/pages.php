<?php
Route::group(['as' => 'pages.', 'namespace' => 'Pages'], function() {

	/**
	 * Handle the page request.
	 *
	 * @since 1.0
	 */
	Route::get('/', ['as' => 'page', 'uses' => 'PageController@getPage']);
	Route::get('/{slug}', ['as' => 'page', 'uses' => 'PageController@getPage']);
	
});