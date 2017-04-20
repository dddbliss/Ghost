<?php

namespace Ghost\Http\Controllers\Admin\Overview\Appearance;

use Ghost\Http\Controllers\Controller;

class ThemeController extends Controller {

	/**
	 * Handle the 'themes' page request.
	 *
	 * @since 1.0
	 * @return view
	 */
	public function getThemes() {
		// Return the 'themes' view
		return get_view();
	}
	
}