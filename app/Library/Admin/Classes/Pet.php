<?php

namespace Ghost\Library\Admin\Classes;

use Ghost\Entities\Models\Pet\Pet as PetModel;
use Ghost\Library\Admin\Classes\Model;

class Pet extends Model {

	/**
	 * Create a new instance of the model.
	 *
	 * @since 1.0
	 * @param array $data 	The data used to create the model.
	 * @return Model
	 */
	public function create($data) {
		// The inputs for each save location
		$table_input = $this->_fetch_input_save('table');
		$metadata_input = $this->_fetch_input_save('metadata');

		// Create the pet
		$pet = new PetModel();
		foreach($table_input as $ti) {
			$pet->$ti['name'] = $data[$ti['name']];
		}
		$pet->save();

		// Create the pet metadata
		foreach($metadata_input as $mi) {
			$pet->setMetadata($mi['name'],$data[$mi['name']]);
		}

		// Return the pet
		return $pet;
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
	}
	
}