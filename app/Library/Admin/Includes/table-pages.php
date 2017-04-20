<?php

use Ghost\Library\Admin\Facades\Table_Pages;

/**
 * Add a column to the pages table.
 *
 * @since 1.0
 * @param string $name 			The name of the column to add.
 * @param string $data 			The data from the users table to add.
 * @param integer $priority 	The order in which to display the columns.
 */
function add_column_pages_table($name, $data, $priority = 20) {
	return Table_Pages::add_column($name, $data, $priority);
}

/**
 * Initialize the pages table.
 *
 * @since 1.0
 */
function init_pages_table() {
	Hook::run('pages_table');
}

/**
 * Display the pages table.
 *
 * @since 1.0
 * @return string
 */
function display_pages_table() {
	init_pages_table();
	Table_Pages::display_table();
}