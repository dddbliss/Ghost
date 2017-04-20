<?php
/**
 * Queue all scripts.
 *
 * @since 1.0
 */
function i17_ghost_queue_global_scripts() {
	add_queue_script('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js', 'global-admin', 1);
	add_queue_script('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', 'global-admin', 2);
	add_queue_script('https://cloud.tinymce.com/stable/tinymce.min.js', 'global-admin', 3);
	add_queue_script('js/elementary.js', 'global-admin', 4);
	add_queue_script('js/app.js', 'global-admin', 5);
	add_queue_script('js/tinymce.js', 'global-admin', 6);
	add_queue_script('/js/overview/appearance/menus.js', route('admin.overview.appearance.menus'));
}
Hook::add('queue_scripts', 'i17_ghost_queue_global_scripts');

/**
 * Queue all stylesheets.
 *
 * @since 1.0
 */
function i17_ghost_queue_global_stylesheets() {
	add_queue_stylesheet('css/fonts.css', 'global-admin', 5);
	add_queue_stylesheet('css/elementary.css', 'global-admin', 6);
	add_queue_stylesheet('css/app.css', 'global-admin', 7);
	add_queue_stylesheet('css/tinymce.css', 'global-admin');
	add_queue_stylesheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', 'global-admin');
}
Hook::add('queue_stylesheets', 'i17_ghost_queue_global_stylesheets');