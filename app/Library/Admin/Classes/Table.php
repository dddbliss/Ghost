<?php
/**
 * Create a table to display data.
 *
 * @since 1.0
 */
namespace Ghost\Library\Admin\Classes;

class Table {

	/**
	 * The collection of column names.
	 *
	 * @since 1.0
	 * @var array
	 */
	protected $columns = [];

	/**
	 * The data to be displayed in the table.
	 *
	 * @since 1.0
	 * @var array
	 */
	private $data = [];

	/**
	 * The class to add to the table.
	 *
	 * @since 1.0
	 * @var string
	 */
	protected $table_class;

	/**
	 * Add a column to the columns array.
	 *
	 * @since 1.0
	 * @param string $name 		The name of the column to add.
	 * @param string $data 		The column name or relationship to use as data.
	 * @param string $priority 	The order in which to display the columns.
	 * @return string
	 */
	public function add_column($name, $data, $priority = 20) {
		// Generate a unique id for the column.
		$id = generate_string();

		// Add the column to the columns array.
		$this->columns[$id] = [
			'name' => $name,
			'data' => $data,
			'priority' => $priority,
		];

		// Sort the columns
		$this->_order_columns();

		// Return the id
		return $id;
	}

	/**
	 * Get an id for a column.
	 *
	 * @since 1.0
	 * @param string $value 	The value of the column to look-up.
	 * @param string $key 		The key of the column to look-up.
	 * @return string
	 */
	public function get_column_id($value, $key = 'name') {
		return $this->_find_column($key, $value);
	}

	/**
	 * Display the table.
	 *
	 * @since 1.0
	 * @return string
	 */
	public function display_table() {
		// Display the table header
		$this->_display_table_header();

		// Fetch the table data.
		$this->_fetch_table_data();

		// Display the table data.
		$this->_display_table_data();

		// Display the table footer
		$this->_display_table_footer();
	}

	/**
	 * Order the columns by their set priority.
	 *
	 * @since 1.0
	 */
	private function _order_columns() {
		uasort($this->columns, function($a, $b) {
			return $a['priority'] - $b['priority'];
		});
	}

	/**
	 * Find a column by a key and value.
	 *
	 * @since 1.0
	 * @param string $key
	 * @param string $value
	 * @return id
	 */
	private function _find_column($key, $value) {
		foreach($this->columns as $column_key => $column) {
			if($column[$key] == $value) {
				return $column_key;
			}
		}
	}

	/**
	 * Display the header with the columns for the table.
	 *
	 * @since 1.0
	 * @return string
	 */
	protected function _display_table_header() {
		echo '<table class="table table--'.$this->table_class.'">';
			echo '<tr>';
				foreach($this->columns as $column) {
					echo '<th>'.$column['name'].'</th>';
				}
			echo '</tr>';
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

	/**
	 * Fetch the needed data to display in the table.
	 *
	 * @since 1.0
	 * @return void
	 */
	protected function _fetch_table_data() {
		die('_fetch_table_data needs to be overwritten by the Child class.');
	}

	/**
	 * Display the data of the table; will need to be overwritten in
	 * the child class.
	 *
	 * @since 1.0
	 * @return void
	 */
	protected function _display_table_data() {
		die('_display_table_data needs to be overwritten by the Child class.');
	}

}