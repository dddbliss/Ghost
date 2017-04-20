<?php
/**
 * Initiate the theme.
 *
 * @since 1.0
 */
function i17_game_init() {
	theme_init([
		'name' => 'I17 Game',
	]);
}
Hook::add('theme', 'i17_game_init');

/**
 * Add the menu locations.
 *
 * @since 1.0
 */
function i17_ashen_menu_locations() {
	add_menu_location(array(
		'name' => 'Topbar',
		'slug' => 'topbar'
	));
}
Hook::add('menu_locations', 'i17_ashen_menu_locations');

/**
 * Queue all stylesheets.
 *
 * @since 1.0
 */
function i17_game_queue_global_stylesheets() {
	add_queue_stylesheet('css/fonts.css', 'global-game', 1);
	add_queue_stylesheet('css/elementary.css', 'global-game', 2);
	add_queue_stylesheet('css/app.css', 'global-game', 3);
}
Hook::add('queue_stylesheets', 'i17_game_queue_global_stylesheets');