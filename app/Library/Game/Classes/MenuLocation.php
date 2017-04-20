<?php
/**
 * Menu locations available for the active theme.
 *
 * @since 1.0
 */
namespace Ghost\Library\Game\Classes;

class MenuLocation {

	/**
	 * The collection of menu locations for the app theme.
	 *
	 * @since 1.0
	 * @var array
	 */
	private $menu_locations = [];

	/**
	 * Add a location to the menu locations array.
	 *
	 * @since 1.0
	 * @param array $args 	An array of arguments for the location.
	 */
	public function add_location($args) {
		// Generate a unique id for the menu location
		$id = generate_string();

		// Set the arguments
		$name = isset($args['name']) ? $args['name'] : 'Primary';
		$slug = isset($args['slug']) ? $args['slug'] : 'primary';

		// Add the menu location to the array
		$this->menu_locations[$id] = [
			'name' => $args['name'],
			'slug' => $args['slug'],
		];
	}

	/**
	 * Display a menu for a specific location.
	 *
	 * @since 1.0
	 * @param string $location 	The slug of the menu location to display.
	 * @param array $args 		Additional arguments to display the menu.
	 * @return string
	 */
	public function display_location($location, array $args = []) {
		// Check the location exists
		if(!$this->check_exists($location)) {
			return;
		}

		// Fetch the menu for the location
		$menu = fetch_menu($location);

		// Check if we found a menu
		if(!$menu) {
			return;
		}

		// Sort the arguments
		$ul_class = isset($args['ul_class']) ? $args['ul_class'] : 'nav';
		$li_class = isset($args['li_class']) ? $args['li_class'] : 'nav__item';
		$a_class = isset($args['a_class']) ? $args['a_class'] : 'nav__link';

		// Display the menu
		echo '<ul class="'.$ul_class.'">';
		foreach($menu->items as $item) {
			$item_type = fetch_menu_item_type($item->type);
			$model = $item_type['model']::where('id', '=', $item['type_id'])->first();
			echo '<li class="'.$li_class.'">';
			echo '<a href="'.$model->$item_type['column'].'" class="'.$a_class.'">'.$item->title.'</a>';
			echo '</li>';
		}
		echo '</ul>';
	}

	/**
	 * Display all of the available menu locations.
	 *
	 * @since 1.0
	 * @return array
	 */
	public function display_locations() {
		return $this->menu_locations;
	}

	/**
	 * Check if a menu location key and value exists.
	 *
	 * @since 1.0
	 * @param string $value The value to check against the key.
	 * @param string $key 	The key to check.
	 * @return boolean
	 */
	public function check_exists($value, $key = 'slug') {
		foreach($this->menu_locations as $location) {
			return $location[$key] == $value;
		}
	}
	
}