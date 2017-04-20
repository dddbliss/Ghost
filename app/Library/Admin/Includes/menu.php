<?php

use Ghost\Library\Admin\Facades\Menu;

/**
 * Adds a section to the admin menu.
 *
 * @since 1.0
 * @param string $name 			The name of the section.
 * @param integer $priority 	The order in which to display the sections.
 */
function add_admin_section($name, $priority = 20) {
	return Menu::add_section($name, $priority);
}

/**
 * Get an id for a section.
 *
 * @since 1.0
 * @param string $value 	The value to look-up.
 * @param string $key 		The key to check the value against.
 * @return string
 */
function get_admin_section_id($value, $key = 'name') {
	return Menu::get_section_id($value, $key);
}

/**
 * Adds a page to the admin menu.
 *
 * @since 1.0
 * @param string $name 			The name of the page.
 * @param string $url 			The url of the page.
 * @param string $section_id 	The id of the section to add the page to.
 * @param integer $priority 	The order in which to display the pages.
 */
function add_admin_page($name, $url, $section_id, $priority = 20) {
	return Menu::add_page($name, $url, $section_id, $priority);
}

/**
 * Get an id for a page.
 *
 * @since 1.0
 * @param string $value 	The value to look-up.
 * @param string $key 		The key to check the value against.
 * @return string
 */
function get_admin_page_id($value, $key = 'name') {
	return Menu::get_page_id($value, $key);
}

/**
 * Add a subpage to the admin menu.
 *
 * @since 1.0
 * @param string $name 			The name of the subpage.
 * @param string $url 			The url of the subpage.
 * @param string $section 		The section to add the subpage to.
 * @param string $page 			The url of the page to add the subpage to.
 * @param integer $priority 	The order in which to display the subpages.
 */
function add_admin_subpage($name, $url, $section = 'settings', $page = '/settings', $priority = 20) {
	return Menu::add_subpage($name, $url, $section, $page, $priority);
}

/**
 * Generate the admin menu.
 *
 * @since 1.0
 * @return string
 */
function display_admin_menu() {
	Hook::run('before_admin_menu');
	Hook::run('admin_menu');
	Menu::display_menu();
	Hook::run('after_admin_menu');
}