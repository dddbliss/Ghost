<?php

use Ghost\Library\Admin\Facades\Page;

/**
 * Initialize the page model.
 *
 * @since 1.0
 */
function init_page() {
	Hook::run('page_model');
}

/**
 * Add an input to the page model.
 *
 * @since 1.0
 * @param string $name 	The name of the input to add.
 */
function add_input_page($name, $save = 'metadata') {
	Page::add_input($name, $save);
}

/**
 * Fetch an array of inputs needed to create the page.
 *
 * @since 1.0
 * @return array
 */
function fetch_input_page() {
	return Page::fetch_input();
}

/**
 * Create a new instance of the page model.
 *
 * @since 1.0
 * @param array $data 	The data used to create the model.
 * @return Model
 */
function create_page($data = []) {
	return Page::create($data);
}

/**
 * Edit an existing instance of the page model.
 *
 * @since 1.0
 * @param integer $id 	The id of the model to edit.
 * @param array $data 	The data used to edit the model.
 * @return Model
 */
function edit_page($id, $data = []) {
	return Page::edit($id, $data);
}