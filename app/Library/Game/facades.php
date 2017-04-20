<?php
/**
 * Add the admin area facades.
 *
 * @since 1.0
 */
function ghost_game_facades() {
    App::bind('game-menu', function() { return new \Ghost\Library\Game\Classes\Menu(); });
    App::bind('game-menu-location', function() { return new \Ghost\Library\Game\Classes\MenuLocation(); });
}
Hook::add('app_facades', 'ghost_game_facades');