<?php

namespace Ghost\Http\Controllers\Admin\Overview\Appearance;

use Ghost\Entities\Models\Menu\Menu;
use Ghost\Entities\Models\Page\Page;
use Ghost\Http\Controllers\Controller;
use Ghost\Http\Requests\Admin\Overview\Appearance\CreateRequest;
use Ghost\Http\Requests\Admin\Overview\Appearance\EditRequest;
use Illuminate\Http\Request;

class MenuController extends Controller {

	/**
	 * Handle the menus page get request.
	 *
	 * @return view
	 */
	public function getMenus() {
		// Fetch all the created menus
		$menus = Menu::all();

		// Fetch all the menus locations
		$menus_locations = get_menu_locations();

		$pages = Page::all();
		return get_view(compact('menus', 'menus_locations', 'pages'));
	}

	/**
	 * Fetch a single menu by the id.
	 *
	 * @param integer $id 	The id of the menu to look up.
	 * @param Request $request
	 * @return JSON
	 */
	public function getMenu($id, Request $request) {
		if($request->ajax()) {
			return Menu::where('id', '=', $id)->first();
		}
	}

	/**
	 * Handle the create a menu post request.
	 *
	 * @param CreateRequest $request 	The request to handle the data.
	 * @return redirect
	 */
	public function postCreate(CreateRequest $request) {
		// Create the menu
		$menu = create_menu($request->only(create_menu_required()));

		// Check if we created the menu
		if(!$menu) {
			dd('failed');
		}

		// We have successfully created the menu
		return redirect()->route('admin.overview.appearance.menus');
	}

	/**
	 * Handle the edit a menu post request.
	 *
	 * @param integer $id 			The id of the menu to edit.
	 * @param EditRequest $reuest 	The request to handle the data.
	 * @return redirect
	 */
	public function postEdit($id, EditRequest $request) {
		// Edit the menu
		$menu = edit_menu($id, $request->only(edit_menu_required()));

		// Check if we edited the menu
		if(!$menu) {
			dd('failed');
		}

		// The menu has been successfully edited
		return redirect()->route('admin.overview.appearance.menus');
	}

}