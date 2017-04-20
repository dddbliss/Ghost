<?php

namespace Ghost\Http\Controllers\Admin\Content\Users;

use Ghost\Http\Controllers\Controller;

class AllController extends Controller {

	/**
	 * Handle the 'view all users' page request.
	 *
	 * @since 1.0
	 * @return view
	 */
	public function getAll() {
		// Return the 'all' view
		return get_view();
	}
	
}