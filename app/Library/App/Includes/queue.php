<?php

use Ghost\Library\App\Facades\Queue;

/**
 * Queue scripts to load on a specific page.
 *
 * @since 1.0
 * @param string $url 	The url of the script to load in.
 * @param string $page 	The page of the application to load the script on.
 */
function add_queue_script($url, $page = '/', $priority = 20) {
	Queue::add_script($url, $page, $priority);
}

/**
 * Queue stylesheets to load on a specific page.
 *
 * @since 1.0
 * @param string $url 			The url of the stylesheet to load in.
 * @param string $page 			The page of the application to load the stylesheet on.
 * @param integer $priority 	The order in which to load the stylesheets.
 */
function add_queue_stylesheet($url, $page = '/', $priority = 20) {
	Queue::add_stylesheet($url, $page, $priority);
}

/**
 * Load in the queued scripts for a specific page.
 *
 * @since 1.0
 * @param string $page 	The page of the application to load scripts for.
 * @return
 */
function ghost_include_scripts($page) {
	Hook::run('queue_scripts');
	Queue::load_scripts($page);
}

/**
 * Load in the queued stylesheets for a specific page.
 *
 * @since 1.0
 * @param string $page 	The page of the application to load scripts for.
 * @return
 */
function ghost_include_stylesheets($page) {
	Hook::run('queue_stylesheets');
	Queue::load_stylesheets($page);
}