<?php
/**
 * The games menus.
 *
 * @since 1.0
 */
namespace Ghost\Library\Game\Classes;

use Ghost\Entities\Models\Menu\Menu as MenuModel;

class Menu {
	
	/**
	 * An array of item types.
	 *
	 * @since 1.0
	 * @var array
	 */
	private $item_types = [];

	/**
	 * An array of request items needed to create a menu.
	 *
	 * @since 1.0
	 * @var array
	 */
	public function create_required() {
		return [
			'name',
			'items',
			'location',
		];
	}

	/**
	 * Create a new menu in the database.
	 *
	 * @since 1.0
	 * @param array $data 	The data to be used to create a new menu.
	 * @return array
	 */
	public function create(array $data) {
		// Check if a location was set
		if($data['location'] != 'none') {
			// Check the location exists
			if(!check_menu_location_exists($data['location'])) {
				$data['location'] = 'none';
			}
		}

		// Create the menu
		$menu = MenuModel::create([
			'name' => $data['name'],
			'location' => $data['location'],
		]);

		// Add the items to the menu
		foreach($data['items']['title'] as $key => $item) {
			// Check the item type exists
			// Create the item
			$menu->items()->create([
				'title' => $item,
				'type' => $data['items']['type'][$key],
				'type_id' => $data['items']['id'][$key],
			]);
		}

		// Return
		return $menu;
	}

	/**
	 * An array of request items needed to edit a menu.
	 *
	 * @since 1.0
	 * @return array
	 */
	public function edit_required() {
		return [
			'name',
			'items',
			'location',
		];
	}

	/**
	 * Edit a menu in the database.
	 *
	 * @since 1.0
	 * @param integer $id 	The id of the menu to edit.
	 * @param array $data 	The data to be used to edit a menu.
	 * @return array
	 */
	public function edit($id, array $data) {
		// Fetch the menu from the id
		$menu = MenuModel::where('id', '=', $id)->first();

		// Edit the menu
		$menu->name = $data['name'];
		$menu->location = $data['location'];
		$menu->save();

		// Remove the items
		$menu->items()->delete();

		// Add the items to the menu
		foreach($data['items']['title'] as $key => $item) {
			// Check the item type exists
			// Create the item
			$menu->items()->create([
				'title' => $item,
				'type' => $data['items']['type'][$key],
				'type_id' => $data['items']['id'][$key],
			]);
		}

		// Return
		return $menu;

	}

	/**
	 * Fetch a menu from the database.
	 *
	 * @since 1.0
	 * @param string $location 	The location of the menu to lookup.
	 * @return array
	 */
	public function fetch($location) {
		return MenuModel::where('location', '=', $location)->first();
	}

	/**
	 * Add a menu item type.
	 *
	 * @since 1.0
	 * @param string $slug 		The slug of the item type.
	 * @param string $model 	The model of the item type.
 	 * @param string $column 	The column to check on the database table.
	 */
	public function add_item_type($slug, $model, $column = 'url') {
		// Create a unique id
		$id = generate_string();

		// Create the item type
		$this->item_types[$id] = [
			'slug' => $slug,
			'model' => $model,
			'column' => $column,
		];
	}

	/**
	 * Fetch all the menu item types.
	 *
	 * @since 1.0
	 * @return array
	 */
	public function fetch_item_types() {
		return $this->item_types;
	}

	/**
	 * Fetch a single item type using the slug.
	 *
	 * @since 1.0
	 * @param string $slug 	The slug of the item type to look up.
	 * @return array
	 */
	public function fetch_item_type($slug) {
		foreach($this->item_types as $item) {
			if($item['slug'] == $slug) {
				return $item;
			}
		}
	}

}