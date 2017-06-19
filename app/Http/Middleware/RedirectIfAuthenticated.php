<?php

namespace App\Http\Middleware;

use Caffeinated\Menus\Facades\Menu;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $menu = Menu::get('admin');
        $menu->add('Settings', '/')->icon('cogs');
        $prefixes = DB::table('settings')->select('prefix')->distinct()->get();
        foreach($prefixes as $prefix){
            $menu->settings->add($prefix->prefix, route('settings.prefix',$prefix->prefix))->icon('cog');
        }
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }

        return $next($request);
    }
}
