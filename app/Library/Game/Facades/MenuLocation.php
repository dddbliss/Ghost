<?php

namespace Ghost\Library\Game\Facades;

use Illuminate\Support\Facades\Facade;

class MenuLocation extends Facade {

	/**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor() {
    	return 'game-menu-location';
    }

}