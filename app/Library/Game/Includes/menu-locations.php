<?php

use Ghost\Library\Game\Facades\MenuLocation;

/**
 * Add a menu location to a theme.
 *
 * @since 1.0
 * @param array $args 	An array of arguments for the location.
 */
function add_menu_location(array $args) {
	MenuLocation::add_location($args);
}

/**
 * Display the menu at a location in a theme.
 *
 * @since 1.0
 * @param string $location 	The slug of the menu location to display.
 * @param array $args 		Any additional arguments to pass to the display.
 * @return string
 */
function display_menu($location, array $args = []) {
	init_menu_locations();
	MenuLocation::display_location($location, $args);
}

/**
 * Fetch all of the available menu locations.
 *
 * @since 1.0
 * @return array
 */
function get_menu_locations() {
	init_menu_locations();
	return MenuLocation::display_locations();
}

/**
 * Check a location key and value pair exists.
 *
 * @since 1.0
 * @param string $value 	The value to check against the key.
 * @param string $key 		The key to check.
 * @return boolean
 */
function check_menu_location_exists($value, $key = 'slug') {
	init_menu_locations();
	return MenuLocation::check_exists($value, $key);
}

/**
 * Initialize the menu locations.
 *
 * @since 1.0
 */
function init_menu_locations() {
	Hook::run('menu_locations');
}