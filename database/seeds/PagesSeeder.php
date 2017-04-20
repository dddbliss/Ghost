<?php

use Ghost\Entities\Models\Page\Page;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Settings
        $pages = [
        	[
        		'title' => 'Home',
        		'slug' => '/',
                'content' => 'This is the content.',
        		'deletable' => 'no',
                'metadata' => [
                    'parent_id' => 'none',
                    'template' => 'index',
                ],
        	],
        ];

        // Truncate
        Page::truncate();

        // Loop
        foreach($pages as $p) {
        	$page = Page::create([
        		'title' => $p['title'],
        		'slug' => $p['slug'],
                'content' => $p['content'],
        		'deletable' => $p['deletable'],
        	]);
            $page->metadata()->delete();
            foreach($p['metadata'] as $key => $value) {
                $page->metadata()->create([
                    'key' => $key,
                    'value' => $value,
                ]);
            }
        }
    }
}