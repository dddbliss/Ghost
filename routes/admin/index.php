<?php
/**
 * Routes in the 'Content' section.
 *
 * @since 1.0
 */
Route::group(['as' => 'content.', 'namespace' => 'Content'], function() {
	require_once('content/pages.php');
	require_once('content/pets.php');
	require_once('content/users.php');
});

/**
 * Routes in the 'Overview' section.
 *
 * @since 1.0
 */
Route::group(['as' => 'overview.', 'namespace' => 'Overview'], function() {
	require_once('overview/appearance.php');
	require_once('overview/dashboard.php');
	require_once('overview/settings.php');
});