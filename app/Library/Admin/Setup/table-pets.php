<?php
/**
 * Add the default columns for the pets table.
 *
 * @since 1.0
 */
function ghost_admin_pets_table() {
	add_column_pets_table('Id', 'id', 1);
	add_column_pets_table('Name', 'name');
}
Hook::add('pets_table', 'ghost_admin_pets_table');