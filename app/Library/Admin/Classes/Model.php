<?php

namespace Ghost\Library\Admin\Classes;

class Model {

	/**
	 * An array of attributes needed to create or edit an instance of the model.
	 *
	 * @since 1.0
	 * @var array
	 */
	protected $input = [];

	/**
	 * Create a new instance of the model.
	 *
	 * @since 1.0
	 * @param array $data 	The data used to create the model.
	 * @return Model
	 */
	public function create($data) {
		die('This method needs to be overwritten in a child class.');
	}

	/**
	 * Edit an existing instance of the model.
	 *
	 * @since 1.0
	 * @param integer $id 	The id of the model to edit.
	 * @param array $data 	The data used to edit the model.
	 * @return Model
	 */
	public function edit($id, $data) {
		die('This method needs to be overwritten in a child class.');
	}

	/**
	 * Add an input to the 'input' array.
	 *
	 * @since 1.0
	 * @param string $name 	The name of the input.
	 * @param string $save 	Where to save the input. Defaults to 'metadata'.
	 */
	public function add_input($name, $save = 'metadata') {
		// Generate an id
		$id = generate_string();

		// Add the input to the array
		$this->input[$id] = [
			'name' => $name,
			'save' => $save,
		];
	}

	/**
	 * Return the array of required inputs to edit an instance of the model.
	 *
	 * @since 1.0
	 * @return array
	 */
	public function fetch_input() {
		$input = [];
		foreach($this->input as $i) {
			$input[] = $i['name'];
		}
		return $input;
	}

	/**
	 * Fetch the inputs for a specific save point.
	 *
	 * @since 1.0
	 * @param string $save 	The save location to look up.
	 * @return array
	 */
	protected function _fetch_input_save($save) {
		$input = [];
		foreach($this->input as $i) {
			if($i['save'] == $save) {
				$input[] = $i;
			}
		}
		return $input;
	}

}