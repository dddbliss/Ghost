<?php

namespace Ghost\Library\Admin\Facades;

use Illuminate\Support\Facades\Facade;

class Pet extends Facade {

	/**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor() {
    	return 'ghost-admin-pet';
    }

}