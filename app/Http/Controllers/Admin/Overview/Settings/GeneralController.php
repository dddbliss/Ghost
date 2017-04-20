<?php

namespace Ghost\Http\Controllers\Admin\Overview\Settings;

use Ghost\Entities\Models\Core\Setting;
use Ghost\Http\Controllers\Controller;
use Ghost\Http\Requests\Admin\Overview\Settings\GeneralRequest;

class GeneralController extends Controller {

	/**
	 * Handle the 'general settings' page request.
	 *
	 * @since 1.0
	 * @return view
	 */
	public function getGeneral() {
		// Return the 'general' view
		return get_view();
	}

	/**
	 * Handle the 'general settings' form request.
	 *
	 * @since 1.0
	 * @param GeneralRequest $request 	The request data.
	 * @return redirect
	 */
	public function postGeneral(GeneralRequest $request) {
		// Loop through the request data
		foreach($request->except('_token') as $name => $value) {
			// Save the request data
			$setting = Setting::where('name', '=', $name)->first();
			$setting->value = $value;
			$setting->save();
		}
		// Return
		return redirect()->back();
	}

}