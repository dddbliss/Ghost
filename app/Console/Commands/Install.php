<?php

namespace Ghost\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class Install extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ghost:install {database} {username} {--password=} {--prefix=gst_} {--host=localhost}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the base Ghost installation.';

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
         * Check if an env file already exists.
         *
         * @since 1.0
         */
        if(!$this->envFileExists()) {
            $this->createEnvFile();
            $this->info('Environment file successfully created.');
        }

        /**
         * Cache the new configuration settings.
         *
         * @since 1.0
         */
        Artisan::call('config:cache');

        /**
         * Generate a new application key.
         *
         * @since 1.0
         */
        Artisan::call('key:generate');
        $this->info('Application key successfully generated.');

        /**
         * Run the application migrations.
         *
         * @since 1.0
         */
        Artisan::call('ghost:migrate');
        $this->info('Application migrations ran successfully.');

        /**
         * Run the application seeders.
         *
         * @since 1.0
         */
        Artisan::call('ghost:seed');
        $this->info('Application seeders ran successfully.');

        /**
         * Clear the configuration.
         *
         * @since 1.0
         */
        Artisan::call('config:clear');
    }

    /**
     * Check if we have an env file.
     *
     * @since 1.0
     * @return boolean
     */
    private function envFileExists() {
        if(!File::exists(base_path().'/.env')) {
            return false;
        }
        return true;
    }

    /**
     * Create the environment file.
     *
     * @since 1.0
     * @return
     */
    private function createEnvFile() {

        // Create the document contents
        $document = 'APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST='.$this->option('host').'
DB_PORT=3306
DB_DATABASE='.$this->argument('database').'
DB_USERNAME='.$this->argument('username').'
DB_PASSWORD='.$this->option('password').'
DB_PREFIX='.$this->option('prefix').'

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_FROM_ADDRESS=no_reply@example.com
MAIL_FROM_NAME=NoReply
MAIL_ENCRYPTION=null
MAIL_USERNAME=null
MAIL_PASSWORD=null

PUSHER_APP_ID=
PUSHER_KEY=
PUSHER_SECRET=';
        
        // Create the env file
        $envFile = File::put(base_path().'/.env', $document);
    }

}