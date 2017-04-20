<?php
/**
 * Fetch the currently active admin theme slug.
 *
 * @since 1.0
 * @return string
 */
function admin_theme() {
	return DB::table('settings')->where('name', '=', 'admin_theme')->first()->value;
}

/**
 * Fetch the currently active game theme slug.
 *
 * @since 1.0
 * @return string
 */
function game_theme() {
	return DB::table('settings')->where('name', '=', 'game_theme')->first()->value;
}

/**
 * Fetch the site title.
 *
 * @since 1.0
 * @return string
 */
function site_title() {
	return DB::table('settings')->where('name', '=', 'site_title')->first()->value;
}

/**
 * Fetch the site subtitle.
 *
 * @since 1.0
 * @return strng
 */
function site_subtitle() {
	return DB::table('settings')->where('name', '=', 'site_subtitle')->first()->value;
}