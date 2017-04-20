<?php

use Ghost\Entities\Models\Core\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Settings
        $settings = [
        	[
        		'name' => 'site_title',
        		'value' => 'New Pet Site',
        	],
        	[
        		'name' => 'site_subtitle',
        		'value' => 'New Pet Site',
        	],
        	[
        		'name' => 'game_theme',
        		'value' => 'i17_game',
        	],
            [
                'name' => 'admin_theme',
                'value' => 'i17_ghost',
            ],
        ];

        // Truncate
        Setting::truncate();

        // Loop
        foreach($settings as $s) {
        	Setting::create([
        		'name' => $s['name'],
        		'value' => $s['value'],
        	]);
        }
    }
}