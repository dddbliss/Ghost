<?php

use Ghost\Library\Admin\Facades\Table_Users;

/**
 * Add a column to the users table.
 *
 * @since 1.0
 * @param string $name 			The name of the column to add.
 * @param string $data 			The data from the users table to add.
 * @param integer $priority 	The order in which to display the columns.
 */
function add_column_users_table($name, $data, $priority = 20) {
	return Table_Users::add_column($name, $data, $priority);
}

/**
 * Initialize the users table.
 *
 * @since 1.0
 */
function init_users_table() {
	Hook::run('users_table');
}

/**
 * Display the users table.
 *
 * @since 1.0
 * @return string
 */
function display_users_table() {
	init_users_table();
	Table_Users::display_table();
}