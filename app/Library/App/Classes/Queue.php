<?php
/**
 * Create a queue for scripts and stylesheets.
 *
 * @since 1.0
 */
namespace Ghost\Library\App\Classes;

use Illuminate\Support\Facades\Route;
use igaster\laravelTheme\Facades\Theme;

class Queue {

	/**
	 * An array of script.
	 *
	 * @since 1.0
	 * @var array
	 */
	private $scripts = [];

	/** 
	 * An array of stylesheets.
	 *
	 * @since 1.0
	 * @var array
	 */
	private $stylesheets = [];

	/**
	 * Add a new script to the scripts queue.
	 *
	 * @since 1.0
	 * @param string $url 			The url of the script to load in.
	 * @param string $page 			The page of the application to load the script on.
	 * @param integer $priority 	The order in which to load the stylesheets.
	 */
	public function add_script($url, $page, $priority = 20) {
		// Set the correct url
		$url = $this->_get_request_url($url, 'script');

		// Generate a unique id for the script
		$id = generate_string();

		// Check if for all pages of application, game or admin
		if($page == 'global-app' || $page == 'global-game' || $page == 'global-admin') {
			$page_url = $page;
			
		} else {
			if(!str_contains($page, 'http')) {
				if(!starts_with($page, '/')) {
					$page_url = url('/').'/'.$page;
				} else {
					$page_url = url('/').$page;
				}
			} else {
				$page_url = $page;
			}
		}

		// Add the script to the scripts array.
		$this->scripts[$page_url][$id] = [
			'script' => $url,
			'priority' => $priority,
		];

		// Order the scripts by priority
		$this->_order_scripts();
	}

	/**
	 * Add a new stylesheet to the stylesheets queue.
	 *
	 * @since 1.0
	 * @param string $url 			The url of the stylesheet to load in.
	 * @param string $page 			The page of the application to load the stylesheet on.
	 * @param integer $priority 	The order in which to load the stylesheets.
	 */
	public function add_stylesheet($url, $page, $priority = 20) {
		// Set the correct url
		$url = $this->_get_request_url($url, 'stylesheet');

		// Generate a unique id for the stylesheet
		$id = generate_string();

		// Check if for all pages of application, game or admin
		if($page == 'global-app' || $page == 'global-game' || $page == 'global-admin') {
			$page_url = $page;
			
		} else {
			if(!str_contains($page, 'http')) {
				if(!starts_with($page, '/')) {
					$page_url = url('/').'/'.$page;
				} else {
					$page_url = url('/').$page;
				}
			} else {
				$page_url = $page;
			}
		}

		// Add the stylesheet to the stylesheets array.
		$this->stylesheets[$page_url][$id] = [
			'stylesheet' => $url,
			'priority' => $priority,
		];

		// Order the stylesheets by priority
		$this->_order_stylesheets();
	}

	/**
	 * Load the specific scripts for a page.
	 *
	 * @since 1.0
	 * @param string $page
	 * @return
	 */
	public function load_scripts($page) {
		// Check if the page variable contains a full url
		
		if(!str_contains($page, 'http')) {
			if(!starts_with($page, '/')) {
				$page_url = url('/').'/'.$page;
			} else {
				$page_url = url('/').$page;
			}
		}

		// Load all global application scripts
		if($this->_has_scripts('global-app')) {
			foreach($this->scripts['global-app'] as $script) {
				echo Theme::js($script['script']);
			}
		}

		// Check if the route is an admin route
		if(starts_with($page_url, url('/').'/admin')) {
			if($this->_has_scripts('global-admin')) {
				foreach($this->scripts['global-admin'] as $script) {
					echo Theme::js($script['script']);
				}
			}
		}

		// Check if the page has any scripts to load
		if($this->_has_scripts($page_url)) {
			foreach($this->scripts[$page_url] as $script) {
				echo Theme::js($script['script']);
			}
		}
	}

	/**
	 * Load the specific stylesheets for a page.
	 *
	 * @since 1.0
	 * @param string $page
	 * @return
	 */
	public function load_stylesheets($page) {
		// Check if the page variable contains a full url
		if(!str_contains($page, 'http')) {
			if(!starts_with($page, '/')) {
				$page_url = url('/').'/'.$page;
			} else {
				$page_url = url('/').$page;
			}
		}

		// Load all global application stylesheets
		if($this->_has_stylesheets('global-app')) {
			foreach($this->stylesheets['global-app'] as $stylesheet) {
				echo Theme::css($stylesheet['stylesheet']);
			}
		}

		// Check if the route is an admin route
		if(starts_with($page_url, url('/').'/admin')) {
			if($this->_has_stylesheets('global-admin')) {
				foreach($this->stylesheets['global-admin'] as $stylesheet) {
					echo Theme::css($stylesheet['stylesheet']);
				}
			}

		// Check if the route is a game route
		} else {
			if($this->_has_stylesheets('global-game')) {
				foreach($this->stylesheets['global-game'] as $stylesheet) {
					echo Theme::css($stylesheet['stylesheet']);
				}
			}
		}

		// Check if the page has any scripts to load
		if($this->_has_stylesheets($page_url)) {
			foreach($this->stylesheets[$page_url] as $stylesheet) {
				echo Theme::css($stylesheet['stylesheet']);
			}
		}
	}

	/**
	 * Set the correct url for the stylesheet/script.
	 *
	 * @since 1.0
	 * @param string $url 	The url to change.
	 * @param string $type 	The type of url, either script or stylesheet.
	 * @return string
	 */
	private function _get_request_url($url, $type) {
		// NOTE: $type no longer needed with Theme.
		return Theme::url($url);
	}

	/**
	 * Order scripts by priority.
	 * 
	 * @since 1.0
	 */
	private function _order_scripts() {
		foreach($this->scripts as $key => $page) {
			uasort($page, function($a, $b) {
				return $a['priority'] - $b['priority'];
			});
			$this->scripts[$key] = $page;
		}
	}

	/**
	 * Order stylesheets by priority.
	 * 
	 * @since 1.0
	 */
	private function _order_stylesheets() {
		foreach($this->stylesheets as $key => $page) {
			uasort($page, function($a, $b) {
				return $a['priority'] - $b['priority'];
			});
			$this->stylesheets[$key] = $page;
		}
	}

	/**
	 * Check if the requested page has any scripts to load.
	 *
	 * @since 1.0
	 * @param string $page 	The page url to check.
	 * @return boolean
	 */
	private function _has_scripts($page) {
		if(array_has($this->scripts, $page)) {
			return true;
		}
		return false;
	}

	/**
	 * Check if the requested page has any stylesheets to load.
	 *
	 * @since 1.0
	 * @param string $page 	The page url to check.
	 * @return boolean
	 */
	private function _has_stylesheets($page) {
		if(array_has($this->stylesheets, $page)) {
			return true;
		}
		return false;
	}

}