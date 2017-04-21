<?php
/**
 * Create a table to display page data.
 *
 * @since 1.0
 */
namespace Ghost\Library\Admin\Classes;

use Ghost\Entities\Models\Page\Page as PageModel;
use Ghost\Library\Admin\Classes\Table;

class Table_Pages extends Table {

	/**
	 * The class to add to the table.
	 *
	 * @since 1.0
	 * @var string
	 */
	protected $table_class = 'pages';

	/**
	 * Fetch the list of pages and add to the data array.
	 *
	 * @since 1.0
	 */
	protected function _fetch_table_data() {
		$this->data = PageModel::orderBy('title', 'ASC')->paginate(20);
	}
	
	/**
	 * Display the header with the columns for the table.
	 *
	 * @since 1.0
	 * @return string
	 */
	protected function _display_table_data() {
		// Loop through the pages
		foreach($this->data as $page) {
			echo '<tr>';
			// Loop through the columns
			foreach($this->columns as $column) {
				if($column['data'] == 'title') {
					echo '<td><a href="'.route('admin.content.pages.edit', ['id' => $page->id]).'">'.$page->{$column['data']}.'</a></td>';
				} else {
					echo '<td>'.$page->{$column['data']}.'</td>';
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
		echo $this->data->links();
	}
	
}