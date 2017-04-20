<?php

use Ghost\Library\Admin\Facades\Pet;

/**
 * Initialize the pet model.
 *
 * @since 1.0
 */
function init_pet() {
	Hook::run('pet_model');
}

/**
 * Add an input to the pet model.
 *
 * @since 1.0
 * @param string $name 	The name of the input to add.
 */
function add_input_pet($name, $save = 'metadata') {
	Pet::add_input($name, $save);
}

/**
 * Fetch an array of inputs needed to create the pet.
 *
 * @since 1.0
 * @return array
 */
function fetch_input_pet() {
	return Pet::fetch_input();
}

/**
 * Create a new instance of the pet model.
 *
 * @since 1.0
 * @param array $data 	The data used to create the model.
 * @return Model
 */
function create_pet($data = []) {
	return Pet::create($data);
}

/**
 * Edit an existing instance of the pet model.
 *
 * @since 1.0
 * @param integer $id 	The id of the model to edit.
 * @param array $data 	The data used to edit the model.
 * @return Model
 */
function edit_pet($id, $data = []) {
	return Pet::edit($id, $data);
}