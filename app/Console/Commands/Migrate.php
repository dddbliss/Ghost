<?php

namespace Ghost\Console\Commands;

use Ghost\Library\Facades\Hook;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Migrate extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ghost:migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the application migrations.';

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
         * Migrate the base application.
         *
         * @since 1.0
         */
        Artisan::call('migrate');
        $this->info('Base application migrations successfully ran.');

        /**
         * Run any migrations for plugins.
         *
         * @since 1.0
         */
        // Artisan::call('migrate', ['--path' => '/app/Plugins/I17_News/database/migrations']);
        $this->info('Plugin migrations successfully ran.');

    }

}