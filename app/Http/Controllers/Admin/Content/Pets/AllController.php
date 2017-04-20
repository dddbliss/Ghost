<?php

namespace Ghost\Http\Controllers\Admin\Content\Pets;

use Ghost\Http\Controllers\Controller;

class AllController extends Controller {

	/**
	 * Handle the 'view all pets' page request.
	 *
	 * @since 1.0
	 * @return view
	 */
	public function getAll() {
		// Return the 'all' view
		return get_view();
	}

}