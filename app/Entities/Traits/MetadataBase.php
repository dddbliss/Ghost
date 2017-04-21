<?php

namespace Ghost\Entities\Traits;

trait MetadataBase {

	/**
	 * Fetch a single metadata object.
	 *
	 * @param $key string
	 * @return object
	 */
	private function getMetadata($key) {
		return $this->metadata()->where('key', '=', $key)->first();
	}

	/**
	 * Check if a metadata object exists.
	 *
	 * @param $key string
	 * @return boolean
	 */
	public function hasMetadata($key) {
		return $this->getMetadata($key) != null;
	}

	/**
	 * Get a metadata by the key.
	 *
	 * @param $key string
	 * @return string
	 */
	public function getMetadataValue($key) {
		// Do we have the metadata?
		if($this->hasMetadata($key)) {
			// We do
			return $this->getMetadata($key)->value;
		}
		return null;
	}

	/**
	 * Remove a single metadata object.
	 *
	 * @param $key string
	 * @return boolean
	 */
	public function removeMetadata() {
		$this->metadata()->delete();
		return true;
	}

	/**
	 * Change a metadata value.
	 *
	 * @param $key string
	 * @param $value string
	 * @return boolean
	 */
	public function setMetadata($key, $value) {
		if(!$this->hasMetadata($key)) {
			$this->addMetadata($key, $value);
		} else {
			$this->editMetadata($key, $value);
		}
		return true;
	}

	/**
	 * Add a metadata key and value.
	 *
	 * @param $key string
	 * @param $value string
	 * @return boolean
	 */
	public function addMetadata($key, $value) {
		$this->metadata()->create([
			'key' => $key,
			'value' => $value,
		]);
		return true;
	}

	/**
	 * Edit a metadata key and value.
	 *
	 * @param $key string
	 * @param $value string
	 * @return boolean
	 */
	 public function editMetadata($key, $value) {
		$metadata = $this->getMetadata($key);
		$metadata->value = $value;
		$metadata->save();
		return true;
	 }

}