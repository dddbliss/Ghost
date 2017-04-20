<?php

namespace Ghost\Library\App\Classes;

class Hook {

	/**
	 * @var array $hooks
	 */
	public $hooks = array();

	/**
	 * Initialize the applications hooks.
	 *
	 * @since 0.1
	 * @return
	 */
	public function init() {
		// Check if the hooks array is empty.
		if(empty($this->hooks)) {
			return true;
		}

		// Loop through all the default hook locations and add
		// them into the hooks array.
		foreach(config('hooks.locations') as $l) {
			$this->hooks[$l] = array();
		}
		return true;
	}

	/**
	 * Add a hook to the hooks array.
	 *
	 * @since 0.1
	 * @param string $location 		The location of the hook in the application.
	 * @param string $function 		The name of the function to execute.
	 * @param integer $priority 10 	The order in which the functions are to be executed.
	 * @return
	 */
	public function add($location, $function, $priority = 20) {
		// Add the hook to the hooks array by the location.
		$this->hooks[$location][] = [
			'function' => $function,
			'priority' => $priority,
		];

		// After adding a new hook ensure the hooks are correctly
		// ordered by their priority.
		uasort($this->hooks[$location], function($a, $b) {
			return $a['priority'] - $b['priority'];
		});
	}

	/**
	 * Remove a hook from the hooks array.
	 * 
	 * @since 0.1
	 * @param string $location 	The location of the hook in the application.
	 * @param string $function 	The name of the function to remove.
	 * @return boolean
	 */
	public function remove($location, $function) {
		/**
		 * Check if the function exists in the hooks array
		 * at the specified location.
		 */
		if(!$this->has_function($location, $function)) {
			return false;
		}

		/**
		 * Loop through the hooks at the specified location
		 * and remove the one with the specified function.
		 */
		foreach($this->get($location) as $key => $hook) {
			if($hook['function'] == $function) {
				unset($this->hooks[$location][$key]);
			}
		}
		return true;
	}

	/**
	 * Execute all the hooks at a specific location.
	 *
	 * @since 0.1
	 * @param string $location 	The location of the hooks in the application.
	 * @return
	 */
	public function run($location) {
		/**
		 * Check the specified location exists within the
		 * application.
		 */
		if(!$this->has_location($location)) {
			return;
		}

		/**
		 * Loop through the hooks at the specified location
		 * and call the associated function.
		 */
		foreach($this->get($location) as $h) {
			call_user_func($h['function']);
		}
	}

	/**
	 * Fetch all the hooks at a specific hook location.
	 *
	 * @since 0.1
	 * @param string $location 	The location of the hooks in the application.
	 * @param string $function 	The name of the function to look for.
	 * @return array
	 */
	public function get($location, $function = null) {
		/**
		 * Check the specified location exists within the
		 * application.
		 */
		if(!$this->has_location($location)) {
			return false;
		}
		
		/**
		 * Check if a function is specified.
		 */
		if($function != null) {
			foreach($this->get($location) as $hook) {
				if($hook['function'] == $function) {
					return $hook;
				}
			}
		}

		/**
		 * No function was specified so show all hooks at this location.
		 */
		return $this->hooks[$location];
	}

	/**
	 * Check if a hook location exists in the hooks array.
	 *
	 * @since 0.1
	 * @param string $location 	The location of the hooks in the application.
	 * @return boolean
	 */
	public function has_location($location) {
		if(!array_key_exists($location, $this->hooks)) {
			return false;
		}
		return true;
	}

	/**
	 * Check if a function exists at a hook location.
	 *
	 * @since 0.1
	 * @param string $location 	The location of the hooks in the application.
	 * @param string $function 	The name of the function to check.
	 * @return boolean
	 */
	public function has_function($location, $function) {
		/**
		 * Check if the hook location exists.
		 */
		if(!$this->has_location($location)) {
			return false;
		}

		/**
		 * Loop through the hooks to check if the function
		 * exists.
		 */
		foreach($this->get($location) as $hook) {
			if($hook['function'] == $function) {
				return true;
			}
			return false;
		}
	}

	/**
	 * Fetch all of the hooks in the application.
	 *
	 * @since 0.1
	 * @return array
	 */
	public function all() {
		return $this->hooks;
	}

}