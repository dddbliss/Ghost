<?php
/**
 * The base application intitialization.
 *
 * @since 1.0
 */

// Define
define('GHOST_GAME', dirname(__FILE__));
define('GHOST_GAME_INCUDES', GHOST_GAME.'/Includes');
define('GHOST_GAME_SETUP', GHOST_GAME.'/Setup');

// Require the necessary functions
require_once(GHOST_GAME_INCUDES.'/menu-locations.php');
require_once(GHOST_GAME_INCUDES.'/menu.php');

// Setup the Game
require_once(GHOST_GAME_SETUP.'/menu.php');

/**
 * Require the game theme init file.
 *
 * @since 1.0
 */
$game_init_file = app_path('Themes/'.game_theme().'/init.php');
if(File::exists($game_init_file)) {
	require_once($game_init_file);
}

// Init
init_menu_item_types();