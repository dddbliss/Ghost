<?php
/**
 * Add the base application facades.
 *
 * @since 1.0
 */
function ghost_app_facades() {
    App::bind('ghost-queue', function() { return new \Ghost\Library\App\Classes\Queue(); });
}
Hook::add('app_facades', 'ghost_app_facades');