<?php
/**
 * Add the admin area facades.
 *
 * @since 1.0
 */
function ghost_admin_facades() {
    App::bind('ghost-admin-menu', function() { return new \Ghost\Library\Admin\Classes\Menu(); });
    App::bind('ghost-admin-model', function() { return new \Ghost\Library\Admin\Classes\Model(); });
    App::bind('ghost-admin-page', function() { return new \Ghost\Library\Admin\Classes\Page(); });
    App::bind('ghost-admin-pet', function() { return new \Ghost\Library\Admin\Classes\Pet(); });
    App::bind('ghost-admin-table', function() { return new \Ghost\Library\Admin\Classes\Table(); });
    App::bind('ghost-admin-table-pages', function() { return new \Ghost\Library\Admin\Classes\Table_Pages(); });
    App::bind('ghost-admin-table-pets', function() { return new \Ghost\Library\Admin\Classes\Table_Pets(); });
    App::bind('ghost-admin-table-users', function() { return new \Ghost\Library\Admin\Classes\Table_Users(); });
}
Hook::add('app_facades', 'ghost_admin_facades');