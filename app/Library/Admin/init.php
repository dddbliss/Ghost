<?php
/**
 * Definte the directory.
 *
 * @since 1.0
 */
define('GHOST_ADMIN', dirname(__FILE__));
define('GHOST_ADMIN_INCLUDES', GHOST_ADMIN.'/Includes');
define('GHOST_ADMIN_SETUP', GHOST_ADMIN.'/Setup');

/**
 * Require the admin includes.
 *
 * @since 1.0
 */
require_once(GHOST_ADMIN_INCLUDES.'/menu.php');
require_once(GHOST_ADMIN_INCLUDES.'/page.php');
require_once(GHOST_ADMIN_INCLUDES.'/pet.php');
require_once(GHOST_ADMIN_INCLUDES.'/table-pages.php');
require_once(GHOST_ADMIN_INCLUDES.'/table-pets.php');
require_once(GHOST_ADMIN_INCLUDES.'/table-users.php');

/**
 * Setup the admin area.
 *
 * @since 1.0
 */
require_once(GHOST_ADMIN_SETUP.'/menu.php');
require_once(GHOST_ADMIN_SETUP.'/page.php');
require_once(GHOST_ADMIN_SETUP.'/pet.php');
require_once(GHOST_ADMIN_SETUP.'/table-pages.php');
require_once(GHOST_ADMIN_SETUP.'/table-pets.php');
require_once(GHOST_ADMIN_SETUP.'/table-users.php');

/**
 * Require the admin theme init file.
 *
 * @since 1.0
 */
$admin_init_file = app_path('Themes/'.admin_theme().'/init.php');
if(File::exists($admin_init_file)) {
	require_once($admin_init_file);
}

/**
 * Require the game theme init file.
 *
 * @since 1.0
 */
$game_init_file = app_path('Themes/'.game_theme().'/init.php');
if(File::exists($game_init_file)) {
	require_once($game_init_file);
}

/**
 * Initialize necessary files.
 *
 * @since 1.0
 */
init_page();
init_pet();