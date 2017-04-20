<?php

namespace Ghost\Http\Controllers\Admin\Overview\Dashboard;

use Ghost\Http\Controllers\Controller;

class HomeController extends Controller {

	/**
	 * Handle the 'home' page request.
	 *
	 * @since 1.0
	 * @return view
	 */
	public function getHome() {
		// Return the 'home' view
		return get_view();
	}

}