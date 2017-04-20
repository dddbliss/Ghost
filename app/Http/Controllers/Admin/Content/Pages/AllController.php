<?php

namespace Ghost\Http\Controllers\Admin\Content\Pages;

use Ghost\Http\Controllers\Controller;

class AllController extends Controller {

	/**
	 * Handle the 'view all pages' page request.
	 *
	 * @since 1.0
	 * @return view
	 */
	public function getAll() {
		// Return the 'all' view
		return get_view();
	}
	
}