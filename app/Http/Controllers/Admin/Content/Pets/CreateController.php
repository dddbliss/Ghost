<?php

namespace Ghost\Http\Controllers\Admin\Content\Pets;

use Ghost\Http\Controllers\Controller;
use Ghost\Http\Requests\Admin\Content\Pets\CreateRequest;

class CreateController extends Controller {

	/**
	 * Handle the 'create new pet' page request.
	 *
	 * @since 1.0
	 * @return view
	 */
	public function getCreate() {
		// Return the 'create' view
		return get_view();
	}

	/**
	 * Handle the 'create new pet' form request.
	 *
	 * @since 1.0
	 * @param CreateRequest $request 	The request data.
	 * @return redirect
	 */
	public function postCreate(CreateRequest $request) {
		// Create the new page
		$page = create_pet($request->only(fetch_input_pet()));

		// Check if the page was created successfully
		if(!$page) {
			return redirect()->route('admin.content.pets.create');
		}

		return redirect()->route('admin.content.pets.all');
	}

}