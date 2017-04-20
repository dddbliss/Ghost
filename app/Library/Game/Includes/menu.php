<?php

use Ghost\Library\Game\Facades\Menu;

/**
 * Add a new menu item type.
 *
 * @since 1.0
 * @param string $slug 		The slug of the item type.
 * @param string $model 	The model of the item type.
 * @param string $column 	The column to check on the database table.
 */
function add_menu_item_type($slug, $model, $column = 'url') {
	return Menu::add_item_type($slug, $model, $column);
}

/**
 * Fetch all the menu item types.
 *
 * @since 1.0
 * @return array
 */
function fetch_menu_item_types() {
	return Menu::fetch_item_types();
}

/**
 * Fetch a single menu item type.
 * 
 * @since 1.0
 * @param string $slug 	The slug of the menu item type to look up.
 * @return array
 */
function fetch_menu_item_type($slug) {
	return Menu::fetch_item_type($slug);
}

/**
 * Initialize the menu item types.
 *
 * @since 1.0
 */
function init_menu_item_types() {
	Hook::run('menu_item_types');
}

/**
 * Desc
 *
 * @since 1.0
 * @param array $data 	The data to be passed to try and create a menu.
 * @return array
 */
function create_menu(array $data) {
	return Menu::create($data);
}

/**
 * Fetch an array of request data that is required to create
 * a menu.
 *
 * @since 1.0
 * @return array
 */
function create_menu_required() {
	return Menu::create_required();
}

/**
 * Edit a menu.
 *
 * @since 1.0
 * @param integer $id 	The id of the menu to edit.
 * @param array $data 	The data to be passed to edit the menu.
 * @return array
 */
function edit_menu($id, array $data) {
	return Menu::edit($id, $data);
}

/**
 * Fetch an array of request data that is required to edit
 * a menu.
 * 
 * @since 1.0
 * @return array
 */
function edit_menu_required() {
	return Menu::edit_required();
}

/**
 * Description
 *
 * @since 1.0
 * @param string $location 	The location of the menu to lookup.
 * @return array
 */
function fetch_menu($location) {
	return Menu::fetch($location);
}