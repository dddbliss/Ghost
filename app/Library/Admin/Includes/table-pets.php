<?php

use Ghost\Library\Admin\Facades\Table_Pets;

/**
 * Add a column to the pets table.
 *
 * @since 1.0
 * @param string $name 			The name of the column to add.
 * @param string $data 			The data from the users table to add.
 * @param integer $priority 	The order in which to display the columns.
 */
function add_column_pets_table($name, $data, $priority = 20) {
	return Table_Pets::add_column($name, $data, $priority);
}

/**
 * Initialize the pets table.
 *
 * @since 1.0
 */
function init_pets_table() {
	Hook::run('pets_table');
}

/**
 * Display the pets table.
 *
 * @since 1.0
 * @return string
 */
function display_pets_table() {
	init_pets_table();
	Table_Pets::display_table();
}