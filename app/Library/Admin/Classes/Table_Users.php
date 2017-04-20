<?php
/**
 * Create a table to display user data.
 *
 * @since 1.0
 */
namespace Ghost\Library\Admin\Classes;

use Ghost\Entities\Models\User\User;
use Ghost\Library\Admin\Classes\Table;

class Table_Users extends Table {

	/**
	 * The class to add to the table.
	 *
	 * @since 1.0
	 * @var string
	 */
	protected $table_class = 'users';

	/**
	 * Fetch the list of users and add to the data array.
	 *
	 * @since 1.0
	 */
	protected function _fetch_table_data() {
		$this->data = User::orderBy('id', 'ASC')->paginate(20);
	}
	
	/**
	 * Display the header with the columns for the table.
	 *
	 * @since 1.0
	 * @return string
	 */
	protected function _display_table_data() {
		// Loop through the pets
		foreach($this->data as $user) {
			echo '<tr>';
			// Loop through the columns
			foreach($this->columns as $column) {
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
		echo $this->data->links();
	}
	
}