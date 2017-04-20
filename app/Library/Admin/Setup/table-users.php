<?php
/**
 * Add the default columns for the users table.
 *
 * @since 1.0
 */
function ghost_admin_users_table() {
	add_column_users_table('Id', 'id', 1);
	add_column_users_table('Username', 'username', 5);
}
Hook::add('users_table', 'ghost_admin_users_table');