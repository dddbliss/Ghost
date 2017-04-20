<?php

namespace Ghost\Http\Controllers\Game\Pages;

use Ghost\Entities\Models\Page\Page;
use Ghost\Http\Controllers\Controller;

class PageController extends Controller {

	/**
	 * Handle the page request.
	 *
	 * @since 1.0
	 * @param string $slug 	The slug of the page. Defaults to '/'.
	 * @return view
	 */
	public function getPage($slug = '/') {
		// Check if the slug starts with '/'
		if(!starts_with($slug, '/')) {
			$slug = '/'.$slug;
		}

		// Fetch the page
		$page = Page::where('slug', '=', $slug)->first();

		// Return the 'page' view
		// with page
		return get_view(compact('page'));
	}

}