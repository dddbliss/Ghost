<?php

namespace Ghost\Http\Controllers\Admin\Content\Pets;

use Ghost\Entities\Models\Pet\Pet;
use Ghost\Http\Controllers\Controller;

class EditController extends Controller {

	/**
	 * Handle the 'edit pet' page request.
	 *
	 * @since 1.0
	 * @param integer $id 	The id of the pet to look up.
	 * @return view
	 */
	public function getEdit($id) {
		// Fetch the pet
		$pet = Pet::where('id', '=', $id)->first();

		// Return the 'edit' view
		// with pet
		return get_view(compact('pet'));
	}

}