<?php

namespace Ghost\Http\Controllers\Admin\Content\Pages;

use Ghost\Entities\Models\Page\Page;
use Ghost\Http\Controllers\Controller;
use Ghost\Http\Requests\Admin\Content\Pages\EditRequest;

class EditController extends Controller {

	/**
	 * Handle the 'edit page' page request.
	 *
	 * @since 1.0
	 * @param integer $id 	The id of the page to edit.
	 * @return view
	 */
	public function getEdit($id) {
		// Fetch the page
		$page = Page::where('id', '=', $id)->first();

		// Fetch all the parent pages
		$parent_pages = Page::where('id', '!=', $id)->get();

		// Return the 'edit' view
		// with pages
		return get_view(compact('page', 'parent_pages'));
	}

	/**
	 * Handle the 'edit page' form request.
	 *
	 * @since 1.0
	 * @param integer $id 			The id of the page to edit.
	 * @param EditRequest $request 	The request data.
	 * @return redirect
	 */
	public function postEdit($id, EditRequest $request) {
		// Edit the page
		$page = edit_page($id, $request->only(fetch_input_page()));

		// Check if the page was successfully edited
		if(!$page) {
			return redirect()->route('admin.content.pages.edit', ['id' => $id]);
		}
		
		// Return
		return redirect()->route('admin.content.pages.all');
	}

}