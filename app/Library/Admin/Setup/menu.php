<?php
/**
 * Create the 'Overview' section.
 *
 * @since 1.0
 */
function ghost_admin_menu_overview() {
	// Add the section and get the id
	$section_id = add_admin_section('Overview', 1);

	// Dashboard
	$dashboard_page_id = add_admin_page('Dashboard', '',  $section_id, 2);
	add_admin_subpage('Home', '', $dashboard_page_id, 2);
	add_admin_subpage('Statistics', '/statistics', $dashboard_page_id, 4);

	// Settings
	$settings_page_id = add_admin_page('Settings', '/settings',  $section_id, 4);
	add_admin_subpage('General Settings', '', $settings_page_id, 2);

	// Appearance
	$appearance_page_id = add_admin_page('Appearance', '/appearance',  $section_id, 6);
	add_admin_subpage('Theme', '', $appearance_page_id, 2);
	add_admin_subpage('Menus', '/menus', $appearance_page_id, 4);
}
Hook::add('admin_menu', 'ghost_admin_menu_overview', 1);

/**
 * Create the 'Content' section.
 *
 * @since 1.0
 */
function ghost_admin_menu_content() {
	// Add the section and get the id
	$section_id = add_admin_section('Content', 5);
	
	// Pages
	$pages_page_id = add_admin_page('Pages', '/pages', $section_id, 2);
	add_admin_subpage(trans('admin/content/pages/all.title'), '', $pages_page_id, 2);
	add_admin_subpage(trans('admin/content/pages/create.title'), '/create', $pages_page_id, 4);
	
	// Users
	$users_page_id = add_admin_page('Users', '/users', $section_id, 4);
	add_admin_subpage('View All Users', '', $users_page_id, 2);
	add_admin_subpage('Create New User', '/create', $users_page_id, 4);
	
	// Pets
	$pets_page_id = add_admin_page('Pets', '/pets', $section_id, 6);
	add_admin_subpage(trans('admin/content/pets/all.title'), '', $pets_page_id, 2);
	add_admin_subpage(trans('admin/content/pets/create.title'), '/create', $pets_page_id, 4);
}
Hook::add('admin_menu', 'ghost_admin_menu_content', 2);