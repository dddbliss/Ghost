<?php
/**
 * Create the admin menu.
 *
 * @since 1.0
 */
namespace Ghost\Library\Admin\Classes;

class Menu {
	
	/**
	 * An array of menu items.
	 *
	 * @since 1.0
	 * @var array
	 */
	private $menu = [];

	/**
	 * Add a new section.
	 *
	 * @since 1.0
	 * @param string $name 			The name of the section to add.
	 * @param integer $priority 	The order in which to display the sections.
	 */
	public function add_section($name, $priority = 20) {
		// Generate a unique id for the section.
		$id = generate_string();

		// Add the section to the menu.
		$this->menu[$id] = [
			'name' => $name,
			'slug' => strtolower(str_replace(' ', '-', $name)),
			'priority' => $priority,
			'pages' => [],
		];

		// Reorder the menu by the section priority.
		$this->_order_sections();

		// Return the id
		return $id;
	}

	/**
	 * Get an id for a section.
	 *
	 * @since 1.0
	 * @param string $value 	The value to look-up.
	 * @param string $key 		The key to check the value against.
	 * @return string
	 */
	public function get_section_id($value, $key = 'name') {
		return $this->_find_section($key, $value);
	}

	/**
	 * Add a new page.
	 *
	 * @since 1.0
	 * @param string $name 			The name of the page.
	 * @param string $url 			The url the page requests.
	 * @param string $section_id 	The id of the section to add the page to.
	 * @param integer $priority 	The order in which to display the pages.
	 */
	public function add_page($name, $url, $section_id, $priority = 20) {
		// Generate a unique id for the page.
		$id = generate_string();

		// Add the page to the sections pages array
		$this->menu[$section_id]['pages'][$id] = [
			'name' => $name,
			'slug' => strtolower(str_replace(' ', '-', $name)),
			'url' => $url,
			'priority' => $priority,
			'subpages' => [],
		];

		// Reorder the pages by the page priority
		$this->_order_pages($section_id);

		// Return the id
		return $id;
	}

	/**
	 * Get an id for a page.
	 *
	 * @since 1.0
	 * @param string $value 	The value to look-up.
	 * @param string $key 		The key to check the value against.
	 * @return string
	 */
	public function get_page_id($value, $key = 'name') {
		return $this->_find_page($key, $value);
	}

	/**
	 * Add a new subpage.
	 *
	 * @since 1.0
	 * @param string $name 			The name of the subpage.
	 * @param string $url 			The url the subpage requests; prefixed by the page url.
	 * @param string $page_id 		The id of the page to add the subpage to.
	 * @param integer $priority 	The order in which to display the pages.
	 */
	public function add_subpage($name, $url, $page_id, $priority = 20) {
		// Find the section key
		$section_id = $this->_find_section('pages', $page_id);

		// Add the subpage to the items array
		$this->menu[$section_id]['pages'][$page_id]['subpages'][] = [
			'name' => $name,
			'url' => $url,
			'priority' => $priority,
		];
	}

	/**
	 * Display the menu items.
	 *
	 * @since 1.0
	 * @return string
	 */
	public function display_menu() {
		// Loop through menu to get the sections
		foreach($this->menu as $section) {
			echo '<div class="sidebar__section sidebar__section--'.$section['slug'].'">';
				echo '<h2 class="sidebar__title">'.$section['name'].'</h2>';
				echo '<ul class="sidebar__nav">';

				// Loop through section pages
				foreach($section['pages'] as $page) {
					echo '<li class="nav__item">';
						echo '<a href="/admin'.$page['url'].'" class="sidebar__nav__link">';
							echo $page['name'];
							if(!empty($page['subpages'])) {
								echo '<span class="sidebar__nav__link__after"><em class="fa fa-angle-up"></em></span>';
							}
						echo '</a>';

						// Loop through page subpages
						if(!empty($page['subpages'])) {
							echo '<ul class="sidebar__dropdown">';
							foreach($page['subpages'] as $subpage) {
								echo '<li class="sidebar__dropdown__item">';
								echo '<a href="/admin'.$page['url'].$subpage['url'].'" class="sidebar__dropdown__link">'.$subpage['name'].'</a>';
								echo '</li>';
							}
							echo '</ul>';
						}

					echo '</li>';
				}

				echo '</ul>';
			echo '</div>';
		}
	}

	/**
	 * Find the unique id for a section.
	 *
	 * @since 1.0
	 * @param string $key 		The key to check the value against.
	 * @param string $value 	The value to look-up.
	 * @return string
	 */
	private function _find_section($key, $value) {
		foreach($this->menu as $section_key => $section) {
			if(is_array($section[$key])) {
				foreach($section[$key] as $sub_key => $sub) {
					if($sub_key === $value) {
						return $section_key;
					}
				}
			} elseif(is_string($section[$key])) {
				if($section[$key] === $value) {
					return $section_key;
				}
			} else {
				return false;
			}
		}
	}

	/**
	 * Find the unique id for a page.
	 *
	 * @since 1.0
	 * @param string $key 		The key to check the value against.
	 * @param string $value 	The value to look-up.
	 * @return string
	 */
	private function _find_page($key, $value) {
		foreach($this->menu as $section) {
			foreach($section['pages'] as $page_id => $page) {
				if(is_array($page[$key])) {
					foreach($page[$key] as $sub_key => $sub) {
						if($sub_key === $value) {
							return $page_id;
						}
					}
				} elseif(is_string($page[$key])) {
					if($page[$key] === $value) {
						return $page_id;
					}
				} else {
					return false;
				}
			}
		}
	}

	/**
	 * Order the sections.
	 *
	 * @since 1.0
	 */
	private function _order_sections() {
		uasort($this->menu, function($a, $b) {
			return $a['priority'] - $b['priority'];
		});
	}

	/**
	 * Order the pages.
	 *
	 * @since 1.0
	 * @param string $section_id 	The id of the section to order the pages in.
	 */
	private function _order_pages($section_id) {
		uasort($this->menu[$section_id]['pages'], function($a, $b) {
			return $a['priority'] - $b['priority'];
		});
	}

}