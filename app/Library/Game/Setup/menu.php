<?php
function game_menu_item_types() {
	add_menu_item_type('page', 'Ghost\Entities\Models\Page\Page', 'slug');
}
Hook::add('menu_item_types', 'game_menu_item_types');