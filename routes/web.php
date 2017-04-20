<?php
/**
 * The route to include the applications assets.
 *
 * @since 1.0
 */
Route::get('/assets/{params}', ['as' => 'assets', 'uses' => 'AssetController@getFile'])->where('params', '.*');

/**
 * All routes for each part of the applcation that
 * are associated with the backend of the game.
 *
 * @since 1.0
 */
Route::group(['as' => 'admin.', 'namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['admin']], function() {
	require_once('admin/index.php');
});

/**
 * All routes for each part of the applcation that
 * are associated with the main parts of the game.
 *
 * @since 1.0
 */
Route::group(['as' => 'game.', 'namespace' => 'Game', 'middleware' => ['game']], function() {
	require_once('game/index.php');
});