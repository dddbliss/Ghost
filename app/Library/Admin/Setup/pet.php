<?php
function ghost_admin_pet() {
	add_input_pet('name', 'table');
	add_input_pet('description');
}
Hook::add('pet_model', 'ghost_admin_pet');