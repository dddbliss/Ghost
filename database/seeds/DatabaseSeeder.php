<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		// All Seeders
		$seeders = [
			'PagesSeeder',
			'SettingsSeeder',
		];

		// Loop through seeders
		foreach($seeders as $s) {
			$this->call($s);
		}

		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}
}