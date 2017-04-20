<?php
/**
 * Use the currently named route to fetch the correct language file.
 *
 * @since 1.0
 * @return string
 */
function static_text($resource, array $parameters = []) {
	// Get the current named route
	$route = Route::currentRouteName();
	
	// Replace the '.'s with '/'s and add '/' to end
	$route = str_replace('.', '/', $route);

	return trans($route. '.' . $resource, $parameters);
}

/**
 * Generate a view for the requested page.
 *
 * @since 1.0
 * @param array $data 		Any additional data that needs to be passed to the view.
 * @param string $content 	The view to be passed as content to the application.
 * @return view
 */
function get_view(array $data = [], $content = null) {
	// Check if content was provided
	if($content == null) {
		// Set content to current route name
		$content = Route::currentRouteName();
	}

	// Check if this is an admin route
	if(starts_with(Route::current()->uri(), 'admin')) {
		// Return the admin view
		return view('admin', compact('content', 'data'));
	}

	// Build the page metadata array
	$page_metadata = [];
	$page_metadata['template'] = $data['page']->getMetadataValue('template');

	// Return the game view
	return view('game', compact('content', 'data', 'page_metadata'));
}