<?php
function ghost_admin_page() {
	add_input_page('title', 'table');
	add_input_page('slug', 'table');
	add_input_page('content', 'table');
	add_input_page('parent');
	add_input_page('template');
}
Hook::add('page_model', 'ghost_admin_page');