<?php

namespace Ghost\Http\Controllers;

use Ghost\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AssetController extends Controller {

	/**
	 * Handle the asset file.
	 *
	 * @since 1.0
	 * @param string $params 	The parameters for the asset.
	 * @return response
	 */
	public function getFile($params)
	{
		// Start building the path
		$path = app_path();
		$asset_file = '';

		// Check if the asset is for a plugin
		if(starts_with($params, 'plugins')) {
			// Build the path
			$asset_file = substr($params, strpos($params, 'plugins') + strlen('plugins'));
			$path .= '/Plugins'.$asset_file;
		// Check if the asset is for a theme
		} elseif(starts_with($params, 'themes')) {
			// Build the path
			$asset_file = substr($params, strpos($params, 'themes') + strlen('themes'));
			$path .= '/Themes'.$asset_file;
		}

		// Fetch the file
		$file = File::get($path);
		$file_extension = File::extension($path);
		$file_type = 'text/plain';

		// Set file type
		if($file_extension == 'css') {
			$file_type = 'text/css';
		} elseif($file_extension == 'js') {
			$file_type = 'application/javascript';
		}

		// Build the response
		return response($file, 200)->header('Content-Type', $file_type);
	}

}