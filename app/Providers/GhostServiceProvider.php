<?php

namespace Ghost\Providers;

use Ghost\Library\App\Facades\Hook;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class GhostServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {}

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Create the hook facade.
         *
         * @since 1.0
         */
        App::bind('ghost-hook', function() { return new \Ghost\Library\App\Classes\Hook(); });

        /**
         * Initialize the application.
         *
         * @since 1.0
         */
        require_once(app_path('Library/App/init.php'));

        /**
         * Run the hook to add application facades.
         *
         * @since 1.0
         */
        Hook::run('app_facades');
    }

}