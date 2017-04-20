<?php

namespace Ghost\Library\Admin\Classes;

use Ghost\Entities\Models\Page\Page as PageModel;
use Ghost\Library\Admin\Classes\Model;

class Page extends Model {

	/**
	 * Create a new instance of the model.
	 *
	 * @since 1.0
	 * @param array $data 	The data used to create the model.
	 * @return Model
	 */
	public function create($data) {
		// Check the slug is correct
		if(!$this->_check_slug($data['slug'])) {
			return false;
		} else {
			$slug = $this->_check_slug($data['slug']);
		}

		// Create the page
		$page = PageModel::create([
			'title' => $data['title'],
			'slug' => $slug,
			'content' => $data['content'],
		]);

		// Create the page metadata
		$page->setMetadata('parent_id', $data['parent']);
		$page->setMetadata('template', $data['template']);

		// Return the page
		return $page;
	}

	/**
	 * Edit an existing instance of the model.
	 *
	 * @since 1.0
	 * @param integer $id 	The id of the model to edit.
	 * @param array $data 	The data used to edit the model.
	 * @return Model
	 */
	public function edit($id, $data) {
		// Check the slug is correct
		if(!$this->_check_slug($data['slug'])) {
			return false;
		} else {
			$slug = $this->_check_slug($data['slug']);
		}

		// Fetch the model
		$page = PageModel::where('id', '=', $id)->first();

		// Edit the model
		$page->title = $data['title'];
		$page->slug = $slug;
		$page->content = $data['content'];
		$page->save();

		// Update the metadata
		$page->setMetadata('parent_id', $data['parent']);
		$page->setMetadata('template', $data['template']);

		// Return the page
		return $page;
	}

	/**
	 * Check the slug for the page is correct.
	 *
	 * @since 1.0
	 * @param string $slug 	The slug to check.
	 * @return false | string
	 */
	private function _check_slug($slug) {
		// Check if the slug starts with a forward slash
		if(!starts_with($slug, '/')) {
			// It doesn't, so add a forward slash
			$slug = '/'.$slug;
		}

		// Check if the slug is for an admin route
		if(starts_with($slug, '/admin')) {
			return false;
		}

		// Return the slug
		return $slug;
	}

}