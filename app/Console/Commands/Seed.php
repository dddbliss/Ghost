<?php

namespace Ghost\Console\Commands;

use Ghost\Library\Facades\Hook;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Seed extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ghost:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the application seeders';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {

        /**
         * Seed the base application.
         *
         * @since 1.0
         */
        Artisan::call('db:seed');
        $this->info('Base application seeders successfully ran.');

        /**
         * Run any migrations for plugins.
         *
         * @since 1.0
         */
        // Artisan::call('db:seed', ['--class' => '/Plugins/I17_News/database/seeds']);
        $this->info('Plugin seeders successfully ran.');

    }

}