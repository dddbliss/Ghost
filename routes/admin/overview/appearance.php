<?php
Route::group(['as' => 'appearance.', 'namespace' => 'Appearance', 'prefix' => 'appearance'], function() {

	/**
	 * Handle the themes page.
	 *
	 * @since 1.0
	 */
	Route::get('/', ['as' => 'themes', 'uses' => 'ThemeController@getThemes']);

	/**
	 * Handle the menus page.
	 *
	 * @since 1.0
	 */
	Route::group(['as' => 'menus', 'prefix' => 'menus'], function() {
		Route::get('/', ['uses' => 'MenuController@getMenus']);
		Route::get('/{id}', ['as' => '.menu', 'uses' => 'MenuController@getMenu']);
		Route::post('/create', ['as' => '.create', 'uses' => 'MenuController@postCreate']);
		Route::post('/edit/{id}', ['as' => '.edit', 'uses' => 'MenuController@postEdit']);
	});

});