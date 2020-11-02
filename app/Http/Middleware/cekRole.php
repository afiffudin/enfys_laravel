<?php

namespace App\Http\Middleware;

use Closure;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //Ini middleware cek role siapa aja yg login
    public function handle($request, Closure $next)
    {
        $roles = $this->CekRoute($request->route());

        if ($request->user()->hasRole($roles) || !$roles) {
            return $next($request);
        }
        return abort(503, 'Anda tidak memiliki hak akses');
    }
    //Ini midleware cek route buat cek roles nya siapa aja
    private function CekRoute($route)
    {
        $actions = $route->getAction();
        return isset($actions['roles']) ? $actions['roles'] : null;
    }
}
