<?php

use Illuminate\Support\Facades\File;

/**
 * Definte the directory.
 *
 * @since 1.0
 */
define('GHOST_APP', dirname(__FILE__));
define('GHOST_APP_INCLUDES', GHOST_APP.'/Includes');

/**
 * Load the application, admin and game facades.
 *
 * @since 1.0
 */
require_once(app_path('Library/App/facades.php'));
require_once(app_path('Library/Admin/facades.php'));
require_once(app_path('Library/Game/facades.php'));

/**
 * Load the active plugin facades.
 *
 * @since 1.0
 */

/**
 * Require the application includes.
 *
 * @since 1.0
 */
require_once(GHOST_APP_INCLUDES.'/queue.php');
require_once(GHOST_APP_INCLUDES.'/settings.php');
require_once(GHOST_APP_INCLUDES.'/string.php');
require_once(GHOST_APP_INCLUDES.'/theme.php');
require_once(GHOST_APP_INCLUDES.'/view.php');