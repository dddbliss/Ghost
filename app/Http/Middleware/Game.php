<?php

namespace Ghost\Http\Middleware;

use Closure;
use Ghost\Library\App\Facades\Hook;
use Illuminate\Support\Facades\Auth;

class Game {

	/**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
	public function handle($request, Closure $next)
    {
        Hook::run('before_game_init');
        require_once(app_path('Library/Game/init.php'));
        Hook::run('after_game_init');
        return $next($request);
    }

}