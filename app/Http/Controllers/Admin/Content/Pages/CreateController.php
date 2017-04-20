<?php

namespace Ghost\Http\Controllers\Admin\Content\Pages;

use Ghost\Entities\Models\Page\Page;
use Ghost\Http\Controllers\Controller;
use Ghost\Http\Requests\Admin\Content\Pages\CreateRequest;

class CreateController extends Controller {

	/**
	 * Handle the 'create new page' page request.
	 *
	 * @since 1.0
	 * @return view
	 */
	public function getCreate() {
		// Fetch all the parent pages
		$parent_pages = Page::all();

		// Return the 'create' view
		// with pages
		return get_view(compact('parent_pages'));
	}

	/**
	 * Handle the 'create new page' form request.
	 *
	 * @since 1.0
	 * @param CreateRequest $request 	The request data.
	 * @return redirect
	 */
	public function postCreate(CreateRequest $request) {
		// Create the new page
		$page = create_page($request->only(fetch_input_page()));

		// Check if the page was created successfully
		if(!$page) {
			dd('failed');
		}

		dd('success');
	}
	
}