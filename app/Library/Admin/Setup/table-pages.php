<?php
/**
 * Add the default columns for the pages table.
 *
 * @since 1.0
 */
function ghost_admin_pages_table() {
	add_column_pages_table('Id', 'id', 1);
	add_column_pages_table('Title', 'title', 5);
	add_column_pages_table('Template', 'template');
}
Hook::add('pages_table', 'ghost_admin_pages_table');