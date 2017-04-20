<?php
/**
 * Fetch the filename without an extension.
 *
 * @since 0.1
 * @param string $filename 	The name of the file to retrieve.
 * @param string $section 	The section of the app to load the file from.
 * @return
 */
function get_theme_part($filename, $section = 'game') {
	if($section == 'admin') {
		return admin_theme().'.'.$filename;
	}
	return game_theme().'.'.$filename;
}

/**
 * The header used to run Ghost.
 *
 * @since 1.0
 */
function ghost_header() {
	ghost_include_stylesheets(Route::current()->uri);
}

/**
 * The footer used to run Ghost.
 *
 * @since 1.0
 */
function ghost_footer() {
	ghost_include_scripts(Route::current()->uri);
}