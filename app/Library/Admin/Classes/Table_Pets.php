<?php
/**
 * Create a table to display pet data.
 *
 * @since 1.0
 */
namespace Ghost\Library\Admin\Classes;

use Ghost\Entities\Models\Pet\Pet as PetModel;
use Ghost\Library\Admin\Classes\Table;

class Table_Pets extends Table {

	/**
	 * The class to add to the table.
	 *
	 * @since 1.0
	 * @var string
	 */
	protected $table_class = 'pets';

	/**
	 * Fetch the list of pages and add to the data array.
	 *
	 * @since 1.0
	 */
	protected function _fetch_table_data() {
		$this->data = PetModel::all();
	}
	
	/**
	 * Display the header with the columns for the table.
	 *
	 * @since 1.0
	 * @return string
	 */
	protected function _display_table_data() {
		// Loop through the pets
		foreach($this->data as $pet) {
			echo '<tr>';
			// Loop through the columns
			foreach($this->columns as $column) {
				if($column['data'] == 'name') {
					echo '<td><a href="'.route('admin.content.pets.edit', ['id' => $pet->id]).'">'.$pet->$column['data'].'</a></td>';
				} else {
					echo '<td>'.$pet->$column['data'].'</td>';
				}
			}
			echo '</tr>';
		}
	}

	/**
	 * Display the footer of the table.
	 *
	 * @since 1.0
	 * @return string
	 */
	protected function _display_table_footer() {
		echo '</table>';
	}
	
}