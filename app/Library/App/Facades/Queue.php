<?php

namespace Ghost\Library\App\Facades;

use Illuminate\Support\Facades\Facade;

class Queue extends Facade {

	/**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor() {
    	return 'ghost-queue';
    }

}